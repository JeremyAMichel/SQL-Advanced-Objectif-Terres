<?php

namespace App\Console\Commands\RequeteChapitre13;

use Illuminate\Console\Command;

class Requete13C extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete13C';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extrait tous les titres d\'annonces avec en colonne séparées l\'année de création et le mois';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

        $ads = app('db')->select("SELECT title, YEAR(created_at) as year, MONTH(created_at) as month FROM `ads`
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
