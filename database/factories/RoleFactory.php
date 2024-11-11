<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    protected static $names = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (empty(static::$names)) {
            static::$names = ['visualizador', 'remetente', 'coletador'];
            shuffle(static::$names);
        }

        return [
            'name' => array_pop(static::$names),
        ];
    }
}
