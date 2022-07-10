<?php
declare(strict_types=1);

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Prefix;
use Symfony\Component\HttpFoundation\Response;

#[Prefix('/api/books/{_id}')]
class FindBookGetController extends Controller
{
    #[Get('/')]
    public function __invoke(Request $request): JsonResponse
    {
        $book = new BookResource(Book::findOrFail($request->route('_id')));

        return new JsonResponse(
            $book,
            Response::HTTP_OK,
        );
    }
}
