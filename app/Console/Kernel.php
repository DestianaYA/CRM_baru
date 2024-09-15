<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('saldo:update')->daily(); // Adjust as needed

    }

    /**
     * Register the commands for the application.
     */
    // app/Console/Kernel.php
    protected $commands = [
        Commands\WhatsAppQR::class,
    ];
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
