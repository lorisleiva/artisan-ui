<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Illuminate\Console\Command;
use Illuminate\Http\JsonResponse;
use Lorisleiva\ArtisanUI\ArtisanUI;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class ExecuteArtisanCommand
{
    public function __invoke(string $name, ArtisanUI $artisanUI): JsonResponse
    {
        $command = $artisanUI->findOrFail($name);

        $input = new ArrayInput([
            // 'name' => 'SomeEvent',
        ]);

        // $output = new StreamOutput(fopen(__DIR__ . '/output.log', 'a', false));
        $output = new BufferedOutput();
        $code = $command->run($input, $output);

        return response()->json([
            'success' => $code === Command::SUCCESS,
            'output' => $output->fetch(),
        ]);
    }
}
