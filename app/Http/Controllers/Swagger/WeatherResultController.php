<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="WeatherResult",
 *     description="API for weather results"
 * )
 */
class WeatherResultController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/weather/weatherHistory",
     *     tags={"WeatherResult"},
     *     summary="Get list of weather results",
     *     description="Get list of weather results",
     *     operationId="weatherHistory",
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="weatherResults",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/WeatherResult")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/weather/weatherHistory/{id}",
     *     tags={"WeatherResult"},
     *     summary="Get weather result",
     *     description="Get weather result",
     *     operationId="Get weather result",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of weather result",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="weatherResult",
     *                 type="object",
     *                 ref="#/components/schemas/WeatherResult"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="No query results for model [App\\Models\WeatherResult] 100"
     *             )
     *         )
     *     )
     * )
     */
    public function show()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/admin/weather/weatherHistory/{id}",
     *     tags={"WeatherResult"},
     *     summary="Create weather result",
     *     description="Create weather result",
     *     operationId="Create weather result",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of weather result",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/WeatherResultUpdate")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="weatherResult",
     *                 type="object",
     *                 ref="#/components/schemas/WeatherResult"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Permission denied.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Permission denied."
     *             )
     *         )
     *     )
     * )
     */
    public function update()
    {
        //
    }

    /**
     * @OA\Delete(
     *     path="/api/admin/weather/weatherHistory/{id}",
     *     tags={"WeatherResult"},
     *     summary="Delete weather result",
     *     description="Delete weather result",
     *     operationId="Delete weather result",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of weather result",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Weather result deleted successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Permission denied.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Permission denied."
     *             )
     *         )
     *     )
     * )
     */
    public function destroy()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/weather/saveCurrentWeather",
     *     tags={"WeatherResult"},
     *     summary="Save current weather",
     *     description="Save current weather",
     *     operationId="Save current weather",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="city",
     *                 type="string",
     *                 example="London"
     *             ),
     *             @OA\Property(
     *                 property="lang",
     *                 type="string",
     *                 example="en"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/CurrentWeather"
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthenticated."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Failed to fetch weather data"
     *             )
     *         )
     *     )
     * )
     */
    public function saveCurrentWeather()
    {
        //
    }
}
