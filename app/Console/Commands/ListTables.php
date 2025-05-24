<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ListTables extends Command
{
    protected $signature = 'db:list-tables';

    protected $description = 'List all tables in the current database';

    public function handle()
    {
        $databaseName = DB::getDatabaseName();
        $this->info("Listing tables in database: $databaseName");

        $tables = DB::select('SHOW TABLES');

        if (empty($tables)) {
            $this->info('No tables found in the database.');
            return 0;
        }

        foreach ($tables as $table) {
            $tableName = array_values((array) $table)[0];
            $this->line($tableName);
        }

        return 0;
    }
}
