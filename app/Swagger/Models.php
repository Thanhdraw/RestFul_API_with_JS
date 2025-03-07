<?php

namespace App\Swagger;

/**
 * @OA\Schema(
 *     schema="Product",
 *     required={"name", "price", "slug", "category_id"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         example=1,
 *         description="Product ID"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="iPhone 15",
 *         description="Product name"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         example=999.99,
 *         description="Product price"
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         example="iphone15.jpg",
 *         description="Product image URL"
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         type="integer",
 *         example=1,
 *         description="Category ID"
 *     ),
 *     @OA\Property(
 *         property="slug",
 *         type="string",
 *         example="iphone-15",
 *         description="Product slug for SEO-friendly URLs"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         example="The latest iPhone with advanced features",
 *         description="Product description"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         example="2023-01-01T00:00:00.000000Z",
 *         description="Creation timestamp"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         example="2023-01-01T00:00:00.000000Z",
 *         description="Last update timestamp"
 *     )
 * )
 *
 *
 * @OA\Schema(
 *     schema="User",
 *     required={"name", "email"},
 *     @OA\Property(property="id", type="integer", format="int64", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
 *     @OA\Property(property="avatar", type="string", example="/storage/avatars/user123.jpg"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *  @OA\Schema(
 *     schema="Category",
 *     type="object",
 *     title="Category",
 *     description="Category model",
 *     @OA\Property(property="id", type="integer", example=1, description="ID of the category"),
 *     @OA\Property(property="name", type="string", example="Electronics", description="Category name"),
 *     @OA\Property(property="slug", type="string", example="All kinds of electronic items", description="Category description"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-07T12:00:00Z", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-03-07T12:00:00Z", description="Last update timestamp")
 * )
 */

class Models
{
}