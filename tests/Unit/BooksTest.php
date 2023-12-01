<?php

namespace Tests\Unit;

use Tests\TestCase;

class BooksTest extends TestCase{
    /**
     * A basic unit test example.
     */
    public function test_example(): void{
        $this->assertTrue(true);
    }

    public function test_show_books_connection(){

        $response = $this->get('/api/books/');
        $response->assertStatus(200);

    }

}
