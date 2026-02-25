<?php

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

test('that fetch all stories works', function () {
    $response = get('/api/stories');

    $response->assertStatus(200);
});

test('that create new story works', function () {
    $fields = [
        'title' => 'Test story for pest testing',
        'synopsis' => 'Test synopsis for pest testing'
    ];

    $response = post('/api/stories', $fields);

    $response->assertStatus(201);
});

test('that update story works', function () {
    $story = createStory();
    $fields = [
        'synopsis' => 'Updated synopsis for pest testing'
    ];

    $response = patch(route('stories.update', ['story' => $story]), $fields);

    $response->assertStatus(200);
});

test('that delete story works', function () {
    $story = createStory();
    $response = delete(route('stories.destroy', ['story' => $story]));

    $response->assertStatus(200);
});
