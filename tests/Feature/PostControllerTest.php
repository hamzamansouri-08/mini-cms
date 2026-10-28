<?php

test('the post list renders each article with its detail link', function () {
    $this->get(route('posts.index'))
        ->assertSee('Découvrir Laravel 13')
        ->assertSee('Routes et contrôleurs')
        ->assertSee('Premiers pas avec Blade')
        ->assertSee(route('posts.show', 'decouvrir-laravel-13'));
});

test('an existing post renders its title and body', function () {
    $this->get(route('posts.show', 'routes-et-controleurs'))
        ->assertSee('Routes et contrôleurs')
        ->assertSee('Une route associe une URL à une méthode de contrôleur.');
});

test('the archive filters posts by year', function () {
    $this->get(route('posts.archive', 2025))
        ->assertSee('Articles de 2025')
        ->assertSee('Premiers pas avec Blade')
        ->assertDontSee('Découvrir Laravel 13');
});

test('an empty archive renders its heading without posts', function () {
    $this->get(route('posts.archive', 2030))
        ->assertSee('Articles de 2030')
        ->assertDontSee('Découvrir Laravel 13')
        ->assertDontSee('Routes et contrôleurs')
        ->assertDontSee('Premiers pas avec Blade');
});

test('invalid post routes return not found', function (string $uri) {
    $this->get($uri)->assertNotFound();
})->with([
    '/posts/archive/abc',
    '/posts/Article',
    '/posts/article-inconnu',
]);
