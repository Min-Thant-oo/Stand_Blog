<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetUpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the entire project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        Artisan::call("key:generate");
        $this->info(Artisan::output());

        Artisan::call("storage:link");
        $this->info(Artisan::output());

        // Artisan::call("db:wipe");
        // $this->info(Artisan::output());

        Artisan::call("migrate:install");
        $this->info(Artisan::output());
 
        Artisan::call("migrate");
        $this->info(Artisan::output());

        Artisan::call("db:seed");
        $this->info(Artisan::output());

        return 1;
    }
}
