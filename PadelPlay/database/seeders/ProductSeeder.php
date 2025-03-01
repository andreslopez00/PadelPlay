<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Pala de Pádel Pro',
                'description' => 'Pala de pádel profesional con materiales de alta calidad.',
                'price' => 199.99,
                'stock' => 10
            ],
            [
                'name' => 'Pelotas de Pádel (Pack 3)',
                'description' => 'Pack de 3 pelotas de pádel de competición.',
                'price' => 9.99,
                'stock' => 50
            ],
            [
                'name' => 'Zapatillas Pádel',
                'description' => 'Zapatillas de pádel con suela antideslizante.',
                'price' => 79.99,
                'stock' => 15
            ],
        ]);
    }
}