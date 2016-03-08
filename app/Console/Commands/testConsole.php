<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testCommand:use';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command Description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // ask the user
        $name = $this->ask('What is your name?');
        // show info to user
        $this->info("Your name is $name");
    }
}
