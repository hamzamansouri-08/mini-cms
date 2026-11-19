<?php

test('the post list renders each article with its detail link', function () {
    $this->get(route('posts.index'))
        ->assertSee('Bienvenue sur Mini-CMS')
        ->assertSee('Comprendre le routage Laravel')
        ->assertSee('Les composants Blade')
        ->assertSee(route('posts.show', 'bienvenue-sur-mini-cms'));
});

test('an existing post renders its title and body', function () {
    $this->get(route('posts.show', 'comprendre-le-routage'))
        ->assertSee('Comprendre le routage Laravel')
        ->assertSee("Une route associe une URL à une action.");
});

test('the archive filters posts by year', function () {
    $this->get(route('posts.archive', 2026))
        ->assertSee('Articles de 2026')
        ->assertSee('Bienvenue sur Mini-CMS');
});

test('an empty archive renders its heading without posts', function () {
    $this->get(route('posts.archive', 2030))
        ->assertSee('Articles de 2030')
        ->assertSee('Aucun article')
        ->assertDontSee('Bienvenue sur Mini-CMS');
});

test('invalid post routes return not found', function (string $uri) {
    $this->get($uri)->assertNotFound();
})->with([
    '/posts/archive/abc',
    '/posts/Article',
    '/posts/article-inconnu',
]);
