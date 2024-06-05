<?php

namespace App\Console\Commands\RequeteChapitre6;

use Illuminate\Console\Command;

class Requete6A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete6A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Récupère le nombre d\'annonces par région qui ne sont pas en statut brouillon';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $regions = app('db')->select("SELECT regions.name as region_name, 
        COUNT(*) as count_ads FROM ads 
        INNER JOIN users 
            ON ads.user_pp_id = users.id 
        INNER JOIN cities 
            ON users.zip_code_id = cities.id 
        INNER JOIN departments 
            ON cities.department_code = departments.code 
        INNER JOIN regions 
            ON departments.region_code = regions.code 
        WHERE ads.is_draft != 0 
        GROUP BY regions.name;");


        foreach ($regions as $region) {
            $regionProperties = get_object_vars($region);
            foreach ($regionProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
