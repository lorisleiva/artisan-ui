<?php

it('successfully executes an artisan command', function () {
    $this->postJson(route('artisan-ui.execution', 'cache:clear'))
        ->assertOk()
        ->assertExactJson([
            'success' => true,
            'output' => "Application cache cleared!\n",
        ]);
});

it('executes artisan command with arguments and options', function () {
    $this->postJson(route('artisan-ui.execution', 'make:model'), [
        'arguments' => ['name' => 'Subscription'],
        'options' => ['force' => true],
    ])
        ->assertOk()
        ->assertExactJson([
            'success' => true,
            'output' => "Model created successfully.\n",
        ]);
});

it('provides the output when something went wrong', function () {
    $this->postJson(route('artisan-ui.execution', 'make:model'))
        ->assertOk()
        ->assertExactJson([
            'success' => false,
            'output' => 'Not enough arguments (missing: "name").',
        ]);
});
