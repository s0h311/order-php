<?php

namespace App\Repositories;

use App\Models\Dish;

class DishRepository
{
  /**
   * @return array<Dish>
   */
  public function findAll(): array
  {
    return [
      new Dish(
        id: 1, name: 'Döner', imageUrl: null, price: 950, description: null
      ),
      new Dish(
        id: 2, name: 'Pizza', imageUrl: null, price: 1390, description: null
      ),
    ];
  }
}