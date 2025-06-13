<?php

namespace NietThijmen\LaravelRoles\Commands;

use Illuminate\Console\Command;

class LaravelRolesCommand extends Command
{
    public $signature = 'laravel-roles';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
