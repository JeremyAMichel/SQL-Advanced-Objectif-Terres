<?php

namespace App\Console\Commands\RequeteChapitre4;

use Illuminate\Console\Command;

class Requete4C extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete4C';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lister tous les types de productions qui ne sont associés à aucune annonce';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $productionTypes = app('db')->select("SELECT p.`name`
        FROM production_genres p
        LEFT JOIN productionable_genres pg ON p.id = pg.production_genre_id
        WHERE pg.production_genre_id IS NULL;");

        if(empty($productionTypes)) {
            echo "Il n'y a pas de type de production qui ne sont associés à aucune annonce\n";
            return;
        }

        foreach ($productionTypes as $productionType) {
            $productionTypeProperties = get_object_vars($productionType);
            foreach ($productionTypeProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
