<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class monthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Delete History Records of Specific Table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Delete old Inquiries Quarterly
        DB::table('user_inquiries')->whereDate('created_at', '<=', now()->subDays(90))->delete();

        // Delete old User that is not verified After 30 days
        DB::table('users')->where('email_verified_at', NULL)->whereDate('created_at', '<=', now()->subDays(30))->delete();
    }
}
