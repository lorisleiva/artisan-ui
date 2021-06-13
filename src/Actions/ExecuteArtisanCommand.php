<?php

namespace Lorisleiva\ArtisanUI\Actions;

use Illuminate\Console\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\ArtisanUI\ArtisanUI;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class ExecuteArtisanCommand
{
    public function __invoke(string $name, ArtisanUI $artisanUI, Request $request): JsonResponse
    {
        $command = $artisanUI->findOrFail($name);
        $arguments = collect($request->get('arguments', []))
            ->reject(fn ($value) => is_null($value));
        $options = collect($request->get('options', []))
            ->reject(fn ($value) => is_null($value))
            ->mapWithKeys(fn ($value, $key) => ["--$key" => $value]);

        $input = new ArrayInput($arguments->merge($options)->toArray());
        $output = new BufferedOutput();
        $returnCode = $command->run($input, $output);

        return response()->json([
            'success' => $returnCode === Command::SUCCESS,
            'output' => $output->fetch(),
        ]);
    }
}
