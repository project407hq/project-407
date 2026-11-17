<?php

test('public pages return successful responses', function (string $routeName) {
    $this->get(route($routeName))->assertSuccessful();
})->with([
    'home',
    'services',
    'approach',
    'services.custom-software',
    'services.ai-app-help',
    'services.fractional-cto',
    'services.automation-integrations',
    'about',
    'contact',
    'privacy',
]);
