<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DropAnswersTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop-answers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop the answers table from the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (Schema::hasTable('answers')) {
            Schema::drop('answers');
            $this->info('Table "answers" has been dropped.');
        } else {
            $this->info('Table "answers" does not exist.');
        }

        return 0;
    }
}
