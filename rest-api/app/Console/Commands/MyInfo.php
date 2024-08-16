<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:my-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("My name is Hadiuzzaman Hadi.\nI am 23 year old");
    }
}
