<?php

namespace App\Console;

use App\Console\Commands\AppInstall;
use App\Console\Commands\RequeteChapitre10\Requete10A;
use App\Console\Commands\RequeteChapitre4\Requete4A;
use App\Console\Commands\RequeteChapitre4\Requete4B;
use App\Console\Commands\RequeteChapitre4\Requete4C;
use App\Console\Commands\RequeteChapitre4\Requete4D;
use App\Console\Commands\RequeteChapitre4\Requete4E;
use App\Console\Commands\RequeteChapitre4\Requete4F;
use App\Console\Commands\RequeteChapitre6\Requete6A;
use App\Console\Commands\RequeteChapitre6\Requete6B;
use App\Console\Commands\RequeteChapitre6\Requete6C;
use App\Console\Commands\RequeteChapitre7\Requete7A;
use App\Console\Commands\RequeteChapitre7\Requete7B;
use App\Console\Commands\RequeteChapitre8\Requete8A;
use App\Console\Commands\RequeteChapitre8\Requete8B;
use App\Console\Commands\RequeteChapitre9\Requete9A;
use App\Console\Commands\RequeteChapitre9\Requete9B;
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
        Requete4F::class,
        Requete6A::class,
        Requete6B::class,
        Requete6C::class,
        Requete7A::class,
        Requete7B::class,
        Requete8A::class,
        Requete8B::class,
        Requete9A::class,
        Requete9B::class,
        Requete10A::class,
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
