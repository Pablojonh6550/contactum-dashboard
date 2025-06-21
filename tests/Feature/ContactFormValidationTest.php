<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ContactFormValidationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function test_should_not_allow_creating_contact_with_invalid_data(): void
    {
        $response = $this->post('/contact/store', [
            'name' => '',
            'email' => 'email-invalido',
            'contact_number' => '123'
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
            'contact_number',
        ]);
    }

    /** @test */
    public function test_should_not_allow_updating_with_existing_email_or_phone(): void
    {
        $this->actingAs(\App\Models\User::factory()->create());

        $contato = \App\Models\Contact::factory()->create([
            'email' => 'ja@existe.com',
            'contact_number' => '987654321',
        ]);

        $outro = \App\Models\Contact::factory()->create();

        $response = $this->from("/contact/edit/{$outro->id}")
            ->put(route('contact.update', ['id' => $outro->id]), [
                'name' => 'Novo Nome',
                'email' => 'ja@existe.com',
                'contact_number' => '987654321',
            ]);

        $response->assertSessionHasErrors(['email', 'contact_number']);
    }
}
