<?php

namespace App\Console;

use App\Console\Commands\AppInstall;
use App\Console\Commands\RequeteChapitre10\Requete10A;
use App\Console\Commands\RequeteChapitre12\Requete12A;
use App\Console\Commands\RequeteChapitre13\Requete13A;
use App\Console\Commands\RequeteChapitre13\Requete13B;
use App\Console\Commands\RequeteChapitre13\Requete13C;
use App\Console\Commands\RequeteChapitre13\Requete13D;
use App\Console\Commands\RequeteChapitre13\Requete13E;
use App\Console\Commands\RequeteChapitre14\Requete14A;
use App\Console\Commands\RequeteChapitre15\Requete15A;
use App\Console\Commands\RequeteChapitre16\Requete16A;
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
        // Chapitre 4

        Requete4A::class,
        Requete4B::class,
        Requete4C::class,
        Requete4D::class,
        Requete4E::class,
        Requete4F::class,

        // Chapitre 6
        Requete6A::class,
        Requete6B::class,
        Requete6C::class,

        // Chapitre 7
        Requete7A::class,
        Requete7B::class,

        // Chapitre 8
        Requete8A::class,
        Requete8B::class,

        // Chapitre 9
        Requete9A::class,
        Requete9B::class,

        // Chapitre 10
        Requete10A::class,

        // Chapitre 12
        Requete12A::class,

        // Chapitre 13
        Requete13A::class,
        Requete13B::class,
        Requete13C::class,
        Requete13D::class,
        Requete13E::class,

        // Chapitre 14
        Requete14A::class,

        // Chapitre 15
        Requete15A::class,

        // Chapitre 16
        Requete16A::class,
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
