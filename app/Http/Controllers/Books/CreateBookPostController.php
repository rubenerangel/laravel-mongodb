<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Prefix;
use Symfony\Component\HttpFoundation\Response;

#[Prefix('/api/books')]
class CreateBookPostController extends Controller
{
    #[Post('/')]
    public function __invoke(Request $request): JsonResponse
    {
        Book::create($request->only("title", "isbn", "author", "published", "published_at"));

        return new JsonResponse(
            [],
            Response::HTTP_NO_CONTENT,
        );
    }
}
