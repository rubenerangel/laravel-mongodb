<?php

namespace Tests\Feature\Books;

use App\Models\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateBookPutController extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     * @group Books
     */
    public function book_can_be_updated()
    {
        $book = Book::factory()->create([
            'published' => true,
        ]);

        $response = $this->put('/api/books/'. $book->_id, [
            'published' => false,
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'published' => false
        ]);

        //La respuesta se modifica en este trozo de código
        $response->assertExactJson([
            "_id" => $book->_id,
            "title" => $book->title,
            "isbn" => $book->isbn,
            "author" => $book->author,
            "published" => false,
            "published_at" => $book->published_at->format("d-m-Y"),
        ]);
    }
}
