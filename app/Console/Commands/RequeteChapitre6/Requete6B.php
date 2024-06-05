<?php

namespace App\Console\Commands\RequeteChapitre6;

use Illuminate\Console\Command;

class Requete6B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete6B';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Récupère le nombre d\'annonces par département qui ne sont pas en statut brouillon';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $departements = app('db')->select("SELECT departments.name as region_name, 
        COUNT(*) as count_ads FROM ads 
        INNER JOIN users 
            ON ads.user_pp_id = users.id 
        INNER JOIN cities 
            ON users.zip_code_id = cities.id 
        INNER JOIN departments 
            ON cities.department_code = departments.code 
        WHERE ads.is_draft != 0 
        
        GROUP BY departments.name;");


        foreach ($departements as $departement) {
            $departementProperties = get_object_vars($departement);
            foreach ($departementProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
