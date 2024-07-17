<?php

namespace App\Jobs;

use App\Models\WeatherResult;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessWeatherData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $city;
    protected $region;
    protected $country;
    protected $localtime;
    protected $condition_text;
    protected $condition_icon;

    /**
     * Create a new job instance.
     */
    public function __construct($city, $region, $country, $localtime, $condition_text, $condition_icon)
    {
        $this->city = $city;
        $this->region = $region;
        $this->country = $country;
        $this->localtime = $localtime;
        $this->condition_text = $condition_text;
        $this->condition_icon = $condition_icon;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        WeatherResult::create([
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
            'localtime' => $this->localtime,
            'condition_text' => $this->condition_text,
            'condition_icon' => $this->condition_icon,
        ]);
    }
}
