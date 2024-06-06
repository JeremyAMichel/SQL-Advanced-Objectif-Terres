<?php

namespace App\Console\Commands\RequeteChapitre13;

use Illuminate\Console\Command;

class Requete13E extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete13E';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extrait tous les titres d\'annonces avec le nombre de jours écoulés depuis leur création';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

        $ads = app('db')->select("SELECT title, DATEDIFF(CURRENT_DATE, created_at) as days_since_creation FROM `ads`
                                ORDER BY `created_at` DESC");

        foreach ($ads as $ad) {
            $adProperties = get_object_vars($ad);
            foreach ($adProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
