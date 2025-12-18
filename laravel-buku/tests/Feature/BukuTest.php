<?php

namespace Tests\Feature;

use App\Models\Buku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BukuTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_store_buku(): void
    {
        $data = Buku::factory()->make()->toArray();

        $response = $this->post(route('buku.store'), $data);

        $response->assertRedirect(route('buku.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('bukus', [
            'title' => $data['title'],
            'description' => $data['description'],
            'author' => $data['author'],
            'year' => $data['year'],
        ]);
    }

    public function test_validation_errors_when_data_missing(): void
    {
        $response = $this->post(route('buku.store'), []);

        $response->assertSessionHasErrors(['title', 'description', 'author', 'year']);
        $this->assertDatabaseCount('bukus', 0);
    }
}
