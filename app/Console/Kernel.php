<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    
        {
            $schedule->command('cache:clear')->hourly(); // Her saat cache temizle
            $schedule->command('config:clear')->daily(); // Günlük olarak config temizle
            $schedule->command('queue:work --stop-when-empty')->everyMinute(); // Laravel Queue işlemleri
            $schedule->call(function () {
                Log::info('Laravel Scheduler Çalışıyor! ' . now()); // Loglama için düzeltildi!
            })->everyFiveMinutes(); // 5 dakikada bir log kaydı tut
        }
    

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
