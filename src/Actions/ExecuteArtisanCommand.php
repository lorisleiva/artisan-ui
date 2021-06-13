<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Lorisleiva\ArtisanUI\ArtisanUI;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class ExecuteArtisanCommand
{
    public function __invoke(string $name, ArtisanUI $artisanUI): string
    {
        $command = $artisanUI->findOrFail($name);

        $input = new ArrayInput([
            'name' => 'SomeEvent',
        ]);
        $output = new BufferedOutput();
        $command->run($input, $output);

        return $output->fetch();
    }
}
