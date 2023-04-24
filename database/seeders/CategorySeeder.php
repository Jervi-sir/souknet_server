<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array1 = [
            'High-Tech', 'Informatique High-Tech Bureau', 'Jouets, Enfants et Bebes', 'Cuisine & Maison', 'Bricolage, Jardin & Animalerie',
            'Beauté, Sante, et Bien-être Boisson et Entretien ', 'Vêtement, Chaussures', 'Bijoux et Accessoires', 'Sports & Loisir', 'Automobiles et Industrie'
        ];
        foreach ($array1 as $value) {
            DB::table('sub_categories')->insert([
                'category_id' => 1,
                'name' => $value,
            ]);
        }

        $array2 = ['Services d\'entretien et de réparation', 'Service de transports', 'Service de télécommunications', 'Service informatique', 'Service connexes'];
        foreach ($array2 as $value) {
            DB::table('sub_categories')->insert([
                'category_id' => 2,
                'name' => $value,
            ]);
        }

        $array3 = ['Art & Design', 'Beauty', 'Books & References', 'Business', 'Comics'];
        foreach ($array3 as $value) {
            DB::table('sub_categories')->insert([
                'category_id' => 3,
                'name' => $value,
            ]);
        }
    }
}
