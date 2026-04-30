<?php

namespace CelsoNery\BrasilApi\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'brasilapi:install';

    protected $description = 'Install BrasilApi package';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'brasilapi-config']);
        $this->info('Package BrasilApi installed successfully!');
    }
}
