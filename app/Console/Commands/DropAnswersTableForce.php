<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DropAnswersTableForce extends Command
{
    protected $signature = 'db:drop-answers-force';

    protected $description = 'Force drop the answers table from the database using raw SQL';

    public function handle()
    {
        try {
            $database = Config::get('database.connections.mysql.database');
            DB::statement("DROP TABLE IF EXISTS {$database}.answers");
            $this->info('Table "answers" has been forcefully dropped.');
        } catch (\Exception $e) {
            $this->error('Failed to drop table "answers": ' . $e->getMessage());
        }

        return 0;
    }
}
