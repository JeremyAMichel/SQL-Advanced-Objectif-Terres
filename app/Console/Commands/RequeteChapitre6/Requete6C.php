<?php

namespace App\Console\Commands\RequeteChapitre6;

use Illuminate\Console\Command;

class Requete6C extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete6C';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Récupère le nombre d\'annonces par ville qui ne sont pas en statut brouillon';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $villes = app('db')->select("SELECT cities.name as region_name, 
        COUNT(*) as count_ads FROM ads 
        INNER JOIN users 
            ON ads.user_pp_id = users.id 
        INNER JOIN cities 
            ON users.zip_code_id = cities.id 
        WHERE ads.is_draft != 0 
        
        GROUP BY cities.name;");


        foreach ($villes as $ville) {
            $villeProperties = get_object_vars($ville);
            foreach ($villeProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
