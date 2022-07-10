<?php

namespace Tests\Feature\Books;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ListBooksGetControllerTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void 
    {
        parent::setUp();
        Sanctum::actingAs(User::factory()->create());
    }

    /**
     * @test
     * @group Books
     * @throws \Throwable
     */
    public function books_paginated_can_be_listed() {
        $books = Book::factory(15)->create();

        $response = $this->get("api/books");

        $response->assertStatus(200);

        $response->assertJsonFragment([
            "total" => $books->count()
        ]);

        $response->assertJsonFragment([
            "title" => $books->first()->title,
        ]);

        $response->assertJsonStructure([
            'data', 'links', 'meta'
        ]);
        $data = $response->decodeResponseJson();

        $this->assertSameSize($books, $data['data']);
        $this->assertEquals($books->count(), $data['meta']['total']);
        $this->assertDatabaseCount('books', $books->count());
    }
    
}
