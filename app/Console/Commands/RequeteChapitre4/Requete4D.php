<?php

namespace App\Console\Commands\RequeteChapitre4;

use Illuminate\Console\Command;

class Requete4D extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete4D';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste tous les types de productions avec en plus la liste des noms de productions enfants, concaténés dans une seule cellule ';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $productions = app('db')->select("
            SELECT p1.`name` AS 'Type de Production', GROUP_CONCAT(p2.`name` SEPARATOR ', ') AS 'Productions Enfants'
            FROM production_genres p1
            LEFT JOIN production_genres p2 ON p1.id = p2.parent_id
            WHERE p1.parent_id IS NULL
            GROUP BY p1.`name`;
        ");

        foreach ($productions as $production) {
            $productionProperties = get_object_vars($production);
            foreach ($productionProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
