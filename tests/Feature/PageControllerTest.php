<?php

test('the home page renders inside the shared layout', function () {
    $this->get(route('home'))
        ->assertSee('Bienvenue sur Mini-CMS')
        ->assertSee('Articles')
        ->assertSee('Heure');
});

test('the about page displays the configured author and group', function () {
    $this->get(route('about'))
        ->assertSee('Prenom Nom')
        ->assertSee('MDW32');
});

test('the server time page renders', function () {
    $this->get(route('time'))
        ->assertSee('Heure du serveur');
});
