<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Pala de Pádel Pro',
            'description' => 'Una pala de pádel de alta gama para profesionales.',
            'price' => 199.99,
            'stock' => 10,
            'image' => 'pala_pro.jpg',
        ]);

        Product::create([
            'name' => 'Pelotas de Pádel',
            'description' => 'Set de 3 pelotas de pádel de competición.',
            'price' => 9.99,
            'stock' => 50,
            'image' => 'pelotas.jpg',
        ]);
    }
}
