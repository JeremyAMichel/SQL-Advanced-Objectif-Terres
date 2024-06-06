<?php

namespace App\Console\Commands\RequeteChapitre13;

use Illuminate\Console\Command;

class Requete13B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete13B';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trouve toutes les annonces créées entre la date du 05/09/2019 et aujourd\'hui';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $ads = app('db')->select("SELECT * FROM `ads`
        WHERE `created_at` BETWEEN '2019-09-05' AND CURRENT_DATE
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
