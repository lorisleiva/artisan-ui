<?php


namespace Lorisleiva\ArtisanUI\Tests;


use Lorisleiva\ArtisanUI\ArtisanUI;
use Lorisleiva\ArtisanUI\Command;

it('Accordion Closed when there are no arguments needed', function () {
    $artisanCommand = (new ArtisanUI())->find('config:cache');
    $this->assertFalse($artisanCommand->shouldOpenArgumentsAccordionOnLoad());
});

it('Accordion closed when no arguments are required', function () {
    $artisanCommand = (new ArtisanUI())->find('cache:clear');
    $this->assertFalse($artisanCommand->shouldOpenArgumentsAccordionOnLoad());
});


it('Accordion open when arguments are required', function () {
    $artisanCommand = (new ArtisanUI())->find('make:model');
    $this->assertTrue($artisanCommand->shouldOpenArgumentsAccordionOnLoad());
});
