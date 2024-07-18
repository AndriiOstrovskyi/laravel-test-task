<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="API for authentication"
 * )
 */
class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     tags={"Auth"},
     *     summary="Register",
     *     description="Register a new user",
     *     operationId="register",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="name",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 type="string"
     *             )
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
     *                 example="authorization successful"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="The email has already been taken."
     *             )
     *         )
     *     )
     * )
     */
    public function register(Request $request)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"Auth"},
     *     summary="Login",
     *     description="Login a user",
     *     operationId="login",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="email",
     *                 type="string"
     *             ),
     *             @OA\Property(
     *                 property="password",
     *                 type="string"
     *             )
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
     *                 example="authorization successful"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Unauthorized"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="The email field is required."
     *             )
     *         )
     *     )
     * )
     */
    public function login(Request $request)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     tags={"Auth"},
     *     summary="Logout",
     *     description="Logout a user",
     *     operationId="logout",
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Successfully logged out"
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
    public function logout()
    {
        //
    }
}
