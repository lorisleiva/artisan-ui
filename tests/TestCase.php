<?php

namespace Lorisleiva\ArtisanUI\Tests;

use Lorisleiva\ArtisanUI\ArtisanUIServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ArtisanUIServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //
    }
}
