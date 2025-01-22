<?php

namespace App\Console\Commands;

use App\Mail\Test\TestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Support\Traits\EmailAddressCollector;

class Test extends Command
{
    use EmailAddressCollector;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

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

        $data = array('title'=> 'Привет');

        Mail::to($this->emails())->send(new TestMail($data));
        info('Command run every minute. ' . date('H:i:s'));
      //  dd('Command run every minute.');

    }




}
