<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // 👈 IMPORTANTE

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Mouse Gamer',
            'price' => 10000,
            'image' => '/img/MouseGamer.webp',
            'description' => 'Mouse gamer ergonómico RGB.',
            'stock' => 50
        ]);

        Product::create([
            'name' => 'Teclado Mecánico',
            'price' => 20000,
            'image' => '/img/TecladoMecanico.webp',
            'description' => 'Teclado mecánico premium con retroiluminación.',
            'stock' => 30
        ]);

        Product::create([
            'name' => 'Audífonos Pro',
            'price' => 30000,
            'image' => '/img/AudifonosPro.webp',
            'description' => 'Audífonos gamer con sonido envolvente.',
            'stock' => 20
        ]);

        Product::create([
            'name' => 'Mouse Pad',
            'price' => 5000,
            'image' => '/img/MousePad.webp',
            'description' => 'Mouse pad optimizado para gaming.',
            'stock' => 100
        ]);
    }
}
