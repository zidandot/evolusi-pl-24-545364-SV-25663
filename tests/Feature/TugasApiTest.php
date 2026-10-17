<?php

namespace Tests\Feature;

use App\Models\Tugas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TugasApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_tugas_endpoint_returns_json_with_cors_for_the_vue_app(): void
    {
        $response = $this->withHeader('Origin', 'http://localhost:5173')
            ->getJson('/api/tugas');

        $response->assertOk()
            ->assertJson([])
            ->assertHeader('Access-Control-Allow-Origin', 'http://localhost:5173');
    }

    public function test_tugas_endpoint_returns_all_tugas(): void
    {
        Tugas::create(['judul' => 'Tugas A', 'status' => 'belum']);
        Tugas::create(['judul' => 'Tugas B', 'status' => 'selesai']);

        $response = $this->getJson('/api/tugas');

        $response->assertOk()
            ->assertJsonCount(2)
            ->assertJsonFragment(['judul' => 'Tugas A', 'status' => 'belum'])
            ->assertJsonFragment(['judul' => 'Tugas B', 'status' => 'selesai']);
    }

    public function test_tugas_can_be_stored(): void
    {
        $response = $this->postJson('/api/tugas', [
            'judul' => 'Tugas Baru',
            'status' => 'belum',
        ]);

        $response->assertCreated()
            ->assertJsonPath('judul', 'Tugas Baru')
            ->assertJsonPath('status', 'belum');

        $this->assertDatabaseHas('tugas', [
            'judul' => 'Tugas Baru',
            'status' => 'belum',
        ]);
    }

    public function test_store_requires_judul_and_status(): void
    {
        $response = $this->postJson('/api/tugas', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['judul', 'status']);

        $this->assertDatabaseCount('tugas', 0);
    }

    public function test_single_tugas_can_be_retrieved(): void
    {
        $tugas = Tugas::create(['judul' => 'Tugas.detail', 'status' => 'belum']);

        $response = $this->getJson("/api/tugas/{$tugas->id}");

        $response->assertOk()
            ->assertJsonPath('id', $tugas->id)
            ->assertJsonPath('judul', 'Tugas.detail');
    }

    public function test_unknown_tugas_returns_404(): void
    {
        $response = $this->getJson('/api/tugas/9999');

        $response->assertNotFound();
    }

    public function test_tugas_can_be_updated(): void
    {
        $tugas = Tugas::create(['judul' => 'Tugas Lama', 'status' => 'belum']);

        $response = $this->putJson("/api/tugas/{$tugas->id}", [
            'judul' => 'Tugas Baru',
            'status' => 'selesai',
        ]);

        $response->assertOk()
            ->assertJsonPath('judul', 'Tugas Baru')
            ->assertJsonPath('status', 'selesai');

        $this->assertDatabaseHas('tugas', [
            'id' => $tugas->id,
            'judul' => 'Tugas Baru',
            'status' => 'selesai',
        ]);
    }

    public function test_update_requires_judul_and_status(): void
    {
        $tugas = Tugas::create(['judul' => 'Tugas Lama', 'status' => 'belum']);

        $response = $this->putJson("/api/tugas/{$tugas->id}", ['status' => 'selesai']);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['judul']);

        $this->assertDatabaseHas('tugas', [
            'id' => $tugas->id,
            'judul' => 'Tugas Lama',
        ]);
    }

    public function test_tugas_can_be_deleted(): void
    {
        $tugas = Tugas::create(['judul' => 'Tugas Buang', 'status' => 'belum']);

        $response = $this->deleteJson("/api/tugas/{$tugas->id}");

        $response->assertNoContent();

        $this->assertDatabaseMissing('tugas', ['id' => $tugas->id]);
    }
}
