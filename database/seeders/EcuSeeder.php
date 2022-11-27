<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ecus')->insert([
            ['code_mat' => 'CEG 3585', 'name' => 'Algorithmique', 'classe_id' => '1'],
            ['code_mat' => 'CSI 3505', 'name' => 'Langage C', 'classe_id' => '2'],
            ['code_mat' => 'CSI 3531', 'name' => 'JavaScript/JQuery', 'classe_id' => '1'],
            ['code_mat' => 'FRA 1528', 'name' => 'Java', 'classe_id' => '1'],
            ['code_mat' => 'GNG 1505', 'name' => 'Cisco IT Essentials', 'classe_id' => '3'],
            ['code_mat' => 'ITI 1500', 'name' => 'Linux – Administration système', 'classe_id' => '4'],
            ['code_mat' => 'MAT 1720', 'name' => 'Linux – Administration réseau', 'classe_id' => '3'],
            ['code_mat' => 'MAT 1722', 'name' => 'Administration Windows Server', 'classe_id' => '3'],
            ['code_mat' => 'PHY 1722', 'name' => 'Base des réseaux de télécommunication', 'classe_id' => '3'],
            ['code_mat' => 'PHY 1721', 'name' => 'Probabilité', 'classe_id' => '3'],
            ['code_mat' => 'DFD 0012', 'name' => 'Algèbre', 'classe_id' => '3'],
            ['code_mat' => 'CHM 1701', 'name' => 'Statistique', 'classe_id' => '3'],
            ['code_mat' => 'CHM 1705', 'name' => 'Architecture matérielle centrale', 'classe_id' => '3'],
            ['code_mat' => 'CHM 1755', 'name' => 'Théorie du signal', 'classe_id' => '6'],
            ['code_mat' => 'CSI 2510', 'name' => 'Anglais', 'classe_id' => '1'],
            ['code_mat' => 'AAV 3025', 'name' => 'Intégration africaine', 'classe_id' => '7'],
            ['code_mat' => 'GGA 3991', 'name' => 'Mathématiques et statistiques', 'classe_id' => '2'],
            ['code_mat' => 'WAW 1815', 'name' => 'Base de données et langage SQL', 'classe_id' => '2'],
            ['code_mat' => 'EDU 3652', 'name' => 'Perception 3D pour véhicules autonomes', 'classe_id' => '3'],
            ['code_mat' => 'TSY 2525', 'name' => 'Aspects pratiques de la chaîne de blocs', 'classe_id' => '3'],
            ['code_mat' => 'LOG 3667', 'name' => 'Programmation avancée en C++', 'classe_id' => '3'],
            ['code_mat' => 'OBJ 5852', 'name' => 'Protocoles et technologies Internet', 'classe_id' => '3']
        ]);
    }
}
