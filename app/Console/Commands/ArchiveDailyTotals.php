<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;
use App\Models\Categories;
use App\Models\User;
use App\Models\DailyTotalArchives;
use Illuminate\Support\Facades\Log;

class ArchiveDailyTotals extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:archive-daily-totals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will be capturing daily totals for products, categories, and users, archived at 2:00 AM via a scheduled task';

    /**
     * Execute the console command.
     */
    public function handle() {
        Log::info("archive-daily-totals job started");

        DailyTotalArchives::create([
            'total_products' => Products::count(),
            'total_categories' => Categories::count(),
            'total_users' => User::count()
        ]);

        Log::info("archive-daily-totals ended successfully");
    }

}
