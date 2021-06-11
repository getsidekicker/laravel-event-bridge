<?php

namespace Sidekicker\EventBridge\Commands;

use Illuminate\Console\Command;

class EventBridgeCommand extends Command
{
    public $signature = 'laravel-event-bridge';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
