<?php

namespace Tests\Feature\Books;

use App\Models\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DestroyBookDeleteController extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     * @group Books
     */
    public function can_be_delete()
    {
        $book = Book::factory()->create();
        $response = $this->delete('/api/books/'. $book->_id);
        $response->assertStatus(204);

        $this->assertDatabaseCount('books', 0);
    }
}
