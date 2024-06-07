<?php

namespace App\Console\Commands\RequeteChapitre17;

use Illuminate\Console\Command;

class Requete17demoQB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete17demoQB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Utilise le querybuilder pour selctionner un user';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $exoA = app('db')
            ->table("users")
            ->select('*')
          	->limit(1)
            ->get();

        var_dump($exoA);
    }
}
