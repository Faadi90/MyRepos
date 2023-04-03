<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:minuteUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will truncate the table.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

            DB::connection('mysql2')->table('employees')->delete();
            echo "The data have been deleted.";
    }
}
