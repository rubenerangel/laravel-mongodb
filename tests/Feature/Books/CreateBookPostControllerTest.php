<?php

namespace Tests\Feature\Books;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateBookPostControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** 
     * @test 
     * @group Books
     */
    public function book_can_be_created() 
    {
        $publishedAt = now()->subYear()->subDays(20);
        $title = 'Ajedrez con nariz de payaso';
        $author = 'M.F. Luis Fernández Siles';

        $response = $this->post('/api/books', [
            'author' => $author,
            'title' => $title,
            'isbn' => '0123456789',
            'published' => true,
            'published_at' => $publishedAt,
        ]);

        $response->assertStatus(204);

        $this->assertDatabaseCount('books',1);
    }
}
