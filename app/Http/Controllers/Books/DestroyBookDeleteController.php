<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('/api/books/{_id}')]
class DestroyBookDeleteController extends Controller
{
    #[Delete('/')]
    public function __invoke(Request $request): JsonResponse
    {
        $book = Book::findOrFail($request->route('_id'));
        $book->delete();

        return new JsonResponse(
            [],
            Response::HTTP_NO_CONTENT
        );
    }
}
