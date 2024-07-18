<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeatherResultRequest;
use App\Http\Requests\SaveCurrentWeatherRequest;
use App\Models\WeatherResult;
use App\Jobs\ProcessWeatherData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WeatherResultController extends Controller
{
    public function index()
    {
        $weatherResults = WeatherResult::all();
        return response()->json(['weatherResults' => $weatherResults], 200);
    }

    public function show(WeatherResult $weatherResult)
    {
        return response()->json(['weatherResult' => $weatherResult], 200);
    }

    public function update(WeatherResultRequest $request, WeatherResult $weatherResult)
    {
        if(Auth::user()->can('update', $weatherResult)) {
            $weatherResult->fill($request->validated());
            $weatherResult->save();
        } else {
            return response()->json(['message' => __('Permission denied')], 401);
        }

        return response()->json(['weatherResult' => $weatherResult], 200);
    }

    public function destroy(WeatherResult $weatherResult)
    {
        if(Auth::user()->can('delete', $weatherResult)) {
            $weatherResult->delete();

            return response()->json(['message' => __('Weather result deleted successfully')], 200);
        } else {
            return response()->json(['message' => __('Permission denied')], 401);
        }
    }
    
    public function saveCurrentWeather(SaveCurrentWeatherRequest $request)
    {
        $city = $request->city;
        $lang = $request->has('lang') ? $request->lang : 'en';

        $cacheKey = "weather_{$city}_{$lang}";

        if (Cache::has($cacheKey)) {
            $data = Cache::get($cacheKey);
            return response()->json(['data' => $data, 'source' => 'cache'], 200);
        }

        $url = $this->buildApiUrl($city, $lang);
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            $location = $data['location'];
            $current = $data['current'];
            $city = $location['name'];
            $region = $location['region'];
            $country = $location['country'];
            $localtime = $location['localtime'];
            $condition_text = $current['condition']['text'];
            $condition_icon = $current['condition']['icon'];

            Cache::put($cacheKey, $data, now()->addMinutes(10));
            $this->dispatchWeatherDataJob($data);

            return response()->json(['data' => $data, 'source' => 'api'], 200);
        } else {
            Log::error('Failed to fetch weather data', ['status' => $response->status(), 'body' => $response->body()]);
            return response()->json(['message' => __('Failed to fetch weather data')], $response->status());
        }
    }

    private function buildApiUrl($city, $lang)
    {
        return env('WEATHER_API_URL') . 'current.json?key=' . env('WEATHER_API_KEY') . '&q=' . $city . '&lang=' . $lang;
    }

    private function dispatchWeatherDataJob($data)
    {
        ProcessWeatherData::dispatch(
            $data['location']['name'],
            $data['location']['region'],
            $data['location']['country'],
            $data['location']['localtime'],
            $data['current']['condition']['text'],
            $data['current']['condition']['icon']
        );
    }
}
