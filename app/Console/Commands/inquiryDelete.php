<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class inquiryDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inquiry:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Inquiry After 30 Days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('user_inquiries')->whereDate('created_at', '<=', now()->subDays(90))->delete();
        echo "Inquiry Deleted Successfully";
    }
}
