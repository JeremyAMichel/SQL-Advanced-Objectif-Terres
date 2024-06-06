<?php

namespace App\Console\Commands\RequeteChapitre13;

use Illuminate\Console\Command;

class Requete13D extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete13D';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extrait tous les titres d\'annonces avec la date de création dans un format français (jj/mm/aaaa)';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {

        $ads = app('db')->select("SELECT title, DATE_FORMAT(created_at, '%d/%m/%Y') as date FROM `ads`
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
