<?php

namespace App\Services;

use App\Models\Dish;
use App\Repositories\DishRepository;

class ResultService
{

  public function __construct(
    private readonly DishRepository $dishRepository
  )
  {
  }

  /**
   * @param string $address
   * @return array<Dish>
   */
  public function getDishesForAddress(string $address): array
  {
    return $this->dishRepository->findAll();
  }
}