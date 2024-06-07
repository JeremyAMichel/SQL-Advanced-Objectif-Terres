<?php

namespace App\Console\Commands\RequeteChapitre17;

use DateTime;
use Illuminate\Console\Command;

class Requete17A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete17A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Utilise le querybuilder pour Trouver tous les utilisateurs qui se sont connectés 
    les 12 derniers mois, triés de la plus récente connexion à la plus ancienne';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $oneYearAgo = (new DateTime())->modify('-4 year');

        $users = app('db')
            ->table('users')
            ->where('updated_at', '>=', $oneYearAgo->format('Y-m-d H:i:s'))
            ->orderBy('updated_at', 'desc')
            ->get();

        foreach ($users as $user) {
            $userProperties = get_object_vars($user);
            foreach ($userProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
