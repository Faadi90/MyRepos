<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class showDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:showDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display connected database.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info(DB::connection()->getDatabaseName());
    }
}
