<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Prefix;
use Symfony\Component\HttpFoundation\Response;

#[Prefix('api/books')]
class ListBooksGetController extends Controller
{
    #[Get('/')]
    public function __invoke(Request $request)
    {
        $books = BookResource::collection(Book::paginate())->response()->getData(true);

        return new JsonResponse(
            $books,
            Response::HTTP_OK,
        );
    }
}
