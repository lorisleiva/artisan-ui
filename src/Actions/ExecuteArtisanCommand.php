<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Lorisleiva\ArtisanUI\ArtisanUI;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;

class ExecuteArtisanCommand
{
    public function __invoke(string $name, ArtisanUI $artisanUI): string
    {
        $command = $artisanUI->findOrFail($name);

        $input = new StringInput('SomeEvent');
        $output = new BufferedOutput();
        $command->run($input, $output);

        return $output->fetch();
    }
}
