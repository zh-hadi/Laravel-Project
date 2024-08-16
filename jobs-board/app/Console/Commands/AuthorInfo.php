<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AuthorInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:author-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Author information';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("My name is Hadiuzzaman\nI'm a student.\nI study CSE in Sonargona University");
    }
}
