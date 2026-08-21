<?php

test('public pages return successful responses', function (string $routeName) {
    $this->get(route($routeName))->assertSuccessful();
})->with([
    'home',
    'services',
    'work.index',
    'work.407-haul-away',
    'about',
    'contact',
    'privacy',
]);
