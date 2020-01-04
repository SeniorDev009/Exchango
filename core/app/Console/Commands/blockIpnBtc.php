<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class blockIpnBtc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blockio:btc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron job to check blockio bitcoin deposits status';

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
        app('App\Http\Controllers\PaymentController')->blockIpnBtc();
        \Log::info("Cron job: blockIpnBtc was run!");
    }
}
