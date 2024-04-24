<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Artisan command that shortens the command for migrate:fresh and db:seed of the application
 */
class AppSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Performs a fresh migrate and db seed for the application.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->components->info('Migrating and Seeding Application');

        Artisan::call("migrate:fresh");
        Artisan::call("db:seed");
    }
}
