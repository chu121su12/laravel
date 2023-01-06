<?php

namespace App\Console;

use Closure;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    public function command($signature, Closure $callback = null)
    {
        if ($callback instanceof Closure) {
            return parent::command($signature, $callback);
        }

        if (\class_exists($signature)) {
            $this->commands[] = $signature;
        }
    }

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
