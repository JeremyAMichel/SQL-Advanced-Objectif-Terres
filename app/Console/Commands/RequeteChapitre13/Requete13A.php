<?php

namespace App\Console\Commands\RequeteChapitre13;

use Illuminate\Console\Command;

class Requete13A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:requete13A';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trouve tous les utilisateurs qui se sont connectés les 48 derniers mois, triés de la plus récente connexion à la plus ancienne';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $users = app('db')->select("SELECT * FROM `users`
                WHERE `updated_at` >= DATE_SUB(CURRENT_DATE, INTERVAL 4 YEAR)
                ORDER BY `updated_at` DESC");

        foreach ($users as $user) {
            $userProperties = get_object_vars($user);
            foreach ($userProperties as $key => $value) {
                echo $key . ': ' . $value . "\n";
            }
            echo "\n";
        }
    }
}
