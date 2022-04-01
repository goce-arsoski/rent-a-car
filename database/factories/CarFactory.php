<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = \App\Models\Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $model = ['116i', '118i', '118d', '120i', '120d', '125i', '125d', '130i', '130d', '135i', '135d', '316i', '318i', '318d', '320i', '320d', '325i', '325d', '330i', '330d', '335i', '335d', 'M3', '520i', '520d', '525i', '525d', '530i', '530d', '535i', '535d', 'M5'];

        $color = ['Alpine White', 'Arctic Metallic', 'Black Sapphire Metallic', 'Blue Water Metallic', 'Crimson Red', 'Le Mans Blue Metallic', 'Monaco Blue Metallic', 'Space Gray Metallic', 'Titanium Silver Metallic'];

        $plate = rand(1000, 9999);

        $modelKey = array_rand($model);
        $colorKey = array_rand($color);

        return [
            'brand' => 'BMW',
            'model' => $model[$modelKey],
            'plate' => "SK-$plate-AB",
            'color' => $color[$colorKey],
            'image_path' => 'BMW_M8.jpg'
        ];
    }
}
