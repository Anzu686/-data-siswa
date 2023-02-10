<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'image'=>fake()->randomNumber(8, true).'.img',
            'name'=>fake()->name(),
            'nis'=>fake()->randomNumber(5, true),
            'jurusan_id'=>fake()->numberBetween(1,4)
        ];
    }
}
