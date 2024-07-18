<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      title="Swagger API",
 *      version="1.0.0"
 * ),
 * @OA\PathItem(
 *      path="/api/"
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="User",
 *      @OA\Property(
 *          property="id",
 *          description="User ID",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="name",
 *          description="User name",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          description="User email",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="email_verified_at",
 *          description="User email verified at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="User created at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="User updated at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="role",
 *          description="User role",
 *          type="string"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="UserUpdate",
 *      @OA\Property(
 *          property="name",
 *          description="User name",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          description="User email",
 *          type="string"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="WeatherResult",
 *      @OA\Property(
 *          property="id",
 *          description="Weather result ID",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="city",
 *          description="Weather result city",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="region",
 *          description="Weather result region",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="country",
 *          description="Weather result country",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="localtime",
 *          description="Weather result localtime",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="condition_text",
 *          description="Weather result condition text",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="condition_icon",
 *          description="Weather result condition icon",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="Weather result created at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="Weather result updated at",
 *          type="string",
 *          format="date-time"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="WeatherResultUpdate",
 *      @OA\Property(
 *          property="city",
 *          description="Weather result city",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="region",
 *          description="Weather result region",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="country",
 *          description="Weather result country",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="localtime",
 *          description="Weather result localtime",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="condition_text",
 *          description="Weather result condition text",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="condition_icon",
 *          description="Weather result condition icon",
 *          type="string"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="Location",
 *      @OA\Property(
 *          property="name",
 *          description="City name",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="region",
 *          description="Region",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="country",
 *          description="Country",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="lat",
 *          description="Latitude",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="lon",
 *          description="Longitude",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="tz_id",
 *          description="Time zone ID",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="localtime_epoch",
 *          description="Local time epoch",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="localtime",
 *          description="Local time",
 *          type="string",
 *          format="date-time"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="Condition",
 *      @OA\Property(
 *          property="text",
 *          description="Condition text",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="icon",
 *          description="Condition icon URL",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="code",
 *          description="Condition code",
 *          type="integer",
 *          format="int64"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="Current",
 *      @OA\Property(
 *          property="last_updated_epoch",
 *          description="Last updated epoch",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="last_updated",
 *          description="Last updated time",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="temp_c",
 *          description="Temperature in Celsius",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="temp_f",
 *          description="Temperature in Fahrenheit",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="is_day",
 *          description="Is day",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="condition",
 *          description="Condition",
 *          ref="#/components/schemas/Condition"
 *      ),
 *      @OA\Property(
 *          property="wind_mph",
 *          description="Wind speed in MPH",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="wind_kph",
 *          description="Wind speed in KPH",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="wind_degree",
 *          description="Wind degree",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="wind_dir",
 *          description="Wind direction",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="pressure_mb",
 *          description="Pressure in MB",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="pressure_in",
 *          description="Pressure in IN",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="precip_mm",
 *          description="Precipitation in MM",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="precip_in",
 *          description="Precipitation in IN",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="humidity",
 *          description="Humidity",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="cloud",
 *          description="Cloud",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="feelslike_c",
 *          description="Feels like temperature in Celsius",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="feelslike_f",
 *          description="Feels like temperature in Fahrenheit",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="windchill_c",
 *          description="Wind chill temperature in Celsius",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="windchill_f",
 *          description="Wind chill temperature in Fahrenheit",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="heatindex_c",
 *          description="Heat index temperature in Celsius",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="heatindex_f",
 *          description="Heat index temperature in Fahrenheit",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="dewpoint_c",
 *          description="Dew point temperature in Celsius",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="dewpoint_f",
 *          description="Dew point temperature in Fahrenheit",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="vis_km",
 *          description="Visibility in KM",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="vis_miles",
 *          description="Visibility in Miles",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="uv",
 *          description="UV Index",
 *          type="integer",
 *          format="int64"
 *      ),
 *      @OA\Property(
 *          property="gust_mph",
 *          description="Wind gust in MPH",
 *          type="number",
 *          format="float"
 *      ),
 *      @OA\Property(
 *          property="gust_kph",
 *          description="Wind gust in KPH",
 *          type="number",
 *          format="float"
 *      )
 * ),
 * @OA\Schema(
 *      type="object",
 *      schema="CurrentWeather",
 *      @OA\Property(
 *          property="data",
 *          type="object",
 *          @OA\Property(
 *              property="location",
 *              ref="#/components/schemas/Location"
 *          ),
 *          @OA\Property(
 *              property="current",
 *              ref="#/components/schemas/Current"
 *          )
 *      ),
 *      @OA\Property(
 *          property="source",
 *          description="Source of the data",
 *          type="string"
 *      )
 * )
 */
class MainController extends Controller
{
    //
}
