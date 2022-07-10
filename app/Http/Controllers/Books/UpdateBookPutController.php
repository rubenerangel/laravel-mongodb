<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Put;
use Symfony\Component\HttpFoundation\Response;

#[Prefix('/api/books/{_id}')]
class UpdateBookPutController extends Controller
{
    #[Put('/')]
    public function __invoke(Request $request): JsonResponse
    {
        $book = Book::findOrFail($request->route('_id'));
        $book->update([
            "title" => $request->input("title", $book->title),
            "isbn" => $request->input("isbn", $book->isbn),
            "author" => $request->input("author", $book->author),
            "published" => $request->input("published", $book->published),
            "published_at" => $request->input("published_at", $book->published_at),
        ]);

        return new JsonResponse(
            new BookResource($book),
            Response::HTTP_OK,

        );
    }
}
