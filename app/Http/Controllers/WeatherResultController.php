<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeatherResultRequest;
use App\Models\WeatherResult;
use App\Jobs\ProcessWeatherData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

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
            if($request->city) {
                $weatherResult->city = $request->city;
            }
            if($request->region) {
                $weatherResult->region = $request->region;
            }
            if($request->country) {
                $weatherResult->country = $request->country;
            }
            if($request->localtime) {
                $weatherResult->localtime = $request->localtime;
            }
            if($request->condition_text) {
                $weatherResult->condition_text = $request->condition_text;
            }
            if($request->condition_icon) {
                $weatherResult->condition_icon = $request->condition_icon;
            }
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
    
    public function saveCurrentWeather(Request $request)
    {
        $city = $request->city;
        $lang = $request->lang;
        $cacheKey = "weather_{$city}_{$lang}";

        if (Cache::has($cacheKey)) {
            $data = Cache::get($cacheKey);
            return response()->json(['data' => $data, 'source' => 'cache'], 200);
        }

        $url = env('WEATHER_API_URL') . 'current.json?key=' . env('WEATHER_API_KEY') . '&q=' . $city . '&lang=' . $lang;
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

            ProcessWeatherData::dispatch($city, $region, $country, $localtime, $condition_text, $condition_icon);

            return response()->json(['data' => $data, 'source' => 'api'], 200);
        } else {
            return response()->json(['message' => __('Failed to fetch weather data')], $response->status());
        }
    }
}
