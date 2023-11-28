<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class AlunoFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      "nome" => $this->faker->name(),
      "descricao" => $this->faker->text(101),
      "contratado" => $this->faker->numberBetween(0, 1),
      "formado" => $this->faker->numberBetween(0, 1),
      "curso_id" => $this->faker->numberBetween(1, 20),
      "imagem" => $this->faker->imageUrl(640, 480),
    ];
  }
}
