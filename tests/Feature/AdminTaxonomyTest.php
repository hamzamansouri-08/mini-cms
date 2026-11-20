<?php

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

beforeEach(function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->admin()->create());
});

it('shows French category validation errors', function () {
    $this->post(route('admin.categories.store'), [
        'name' => '',
        'slug' => '',
    ])
        ->assertSessionHasErrors(['name', 'slug'])
        ->assertSessionHasErrors([
            'name' => 'Le champ nom est obligatoire.',
        ]);
});

it('stores and updates a category', function () {
    $this->post(route('admin.categories.store'), [
        'name' => 'Laravel 13',
        'slug' => 'laravel-13',
    ])->assertRedirect(route('admin.categories.index'));

    $category = Category::where('slug', 'laravel-13')->firstOrFail();

    $this->put(route('admin.categories.update', $category), [
        'name' => 'Laravel moderne',
        'slug' => 'laravel-13',
    ])->assertRedirect(route('admin.categories.index'));

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Laravel moderne',
    ]);
});

it('refuses a duplicate category slug with a custom message', function () {
    Category::factory()->create(['slug' => 'laravel']);

    $this->post(route('admin.categories.store'), [
        'name' => 'PHP',
        'slug' => 'laravel',
    ])
        ->assertSessionHasErrors([
            'slug' => 'Ce slug est déjà utilisé par une autre catégorie.',
        ]);
});

it('stores and removes a tag', function () {
    $this->post(route('admin.tags.store'), [
        'name' => 'Nouveau',
        'slug' => 'nouveau',
    ])->assertRedirect(route('admin.tags.index'));

    $tag = Tag::where('slug', 'nouveau')->firstOrFail();
    $this->delete(route('admin.tags.destroy', $tag))
        ->assertRedirect(route('admin.tags.index'));

    $this->assertDatabaseMissing('tags', ['id' => $tag->id]);
});

it('returns 503 in read-only mode', function () {
    config(['site.read_only' => true]);

    $this->post(route('admin.categories.store'), [
        'name' => 'Bloquée',
        'slug' => 'bloquee',
    ])
        ->assertServiceUnavailable();
});

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
