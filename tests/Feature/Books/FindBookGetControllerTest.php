<?php

namespace Tests\Feature\Books;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use Tests\TestCase;

class FindBookGetControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group Books
     */
    public function book_can_be_fetched()
    {
        $book = new BookResource(Book::factory()->create());

        $request = Request::create('api/books/'. $book->_id);

        $response = $this->get('api/books/'. $book->_id);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            "_id", "isbn", "title", "author", "published", "published_at"
        ]);

        $response->assertExactJson($book->toArray($request));

        $this->assertDatabaseCount("books", 1);

        $this->assertDatabaseHas("books", [
            "title" => $book->title,
        ]);
        
    }
}
