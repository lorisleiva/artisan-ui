<?php


namespace Lorisleiva\ArtisanUI\Tests;

use Lorisleiva\ArtisanUI\ArtisanUI;

it('closes the accordion when there are no arguments', function () {
    $artisanCommand = (new ArtisanUI())->find('config:cache');
    $this->assertFalse($artisanCommand->shouldOpenArgumentsAccordionOnLoad());
});

it('closes the accordion when no arguments are required', function () {
    $artisanCommand = (new ArtisanUI())->find('cache:clear');
    $this->assertFalse($artisanCommand->shouldOpenArgumentsAccordionOnLoad());
});


it('opens the accordion when there are required arguments', function () {
    $artisanCommand = (new ArtisanUI())->find('make:model');
    $this->assertTrue($artisanCommand->shouldOpenArgumentsAccordionOnLoad());
});
