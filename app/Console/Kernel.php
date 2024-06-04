<?php

namespace App\Console;

use App\Console\Commands\AppInstall;
use App\Console\Commands\RequeteChapitre4\Requete4A;
use App\Console\Commands\RequeteChapitre4\Requete4B;
use App\Console\Commands\RequeteChapitre4\Requete4C;
use App\Console\Commands\RequeteChapitre4\Requete4D;
use App\Console\Commands\RequeteChapitre4\Requete4E;
use App\Console\Commands\RequeteChapitre4\Requete4F;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AppInstall::class,
        Requete4A::class,
        Requete4B::class,
        Requete4C::class,
        Requete4D::class,
        Requete4E::class,
        Requete4F::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
