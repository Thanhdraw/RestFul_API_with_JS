<?php

namespace App\Swagger;
use OpenApi\Annotations as OA;

/**
 *@OA\Info(
 *     title="Laravel Ecommerce API Documentation",
 *     version="1.0.0",
 *     description="RESTful API documentation for Ecommerce project",
 *     @OA\Contact(
 *         email="dangquocthanh2812@gmail.com",
 *         name="Developer",
 *         url="https://github.com/Thanhdraw"
 *     ),
 *     @OA\License(
 *         name="MIT License",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 * 
 * @OA\Server(
 *     description="Local API Server",
 *     url="http://127.0.0.1:8000/api/"
 * )
 * 
 * @OA\Tag(
 *     name="Products",
 *     description="API Endpoints for Products"
 * )
 * 
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints for Users"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */



class OpenApiConfig
{
}