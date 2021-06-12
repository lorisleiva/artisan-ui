<?php

use Lorisleiva\ArtisanUI\ArtisanUI;

it('resolves from the container', function () {
    $skeleton = app(ArtisanUI::class);

    expect($skeleton instanceof ArtisanUI)->toBeTrue();
});

it('resolves as a singleton', function () {
    $skeletonA = app(ArtisanUI::class);
    $skeletonB = app(ArtisanUI::class);

    expect($skeletonA)->toBe($skeletonB);
});
