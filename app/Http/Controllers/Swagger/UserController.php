<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="User",
 *     description="API for users"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/admin/users",
     *     tags={"User"},
     *     summary="Get list of users",
     *     description="Get list of users",
     *     operationId="users",
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="users",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/User")
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
    public function index()
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/admin/users/{id}",
     *     tags={"User"},
     *     summary="Get user",
     *     description="Get user",
     *     operationId="Get user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of user",
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
     *                 property="user",
     *                 type="object",
     *                 ref="#/components/schemas/User"
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
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="User not found.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="No query results for model [App\\Models\\User] 200"
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
     *     path="/api/admin/users/{id}",
     *     tags={"User"},
     *     summary="Update user",
     *     description="Update user",
     *     operationId="Update user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of user",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserUpdate")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="user",
     *                 type="object",
     *                 ref="#/components/schemas/User"
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
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="User not found.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="No query results for model [App\\Models\\User] 200"
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
     *     path="/api/admin/users/{id}",
     *     tags={"User"},
     *     summary="Delete user",
     *     description="Delete user",
     *     operationId="Delete user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of user",
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
     *                 example="User deleted"
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
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="User not found.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="No query results for model [App\\Models\\User] 200"
     *             )
     *         )
     *     )
     * )
     */
    public function destroy()
    {
        //
    }
}
