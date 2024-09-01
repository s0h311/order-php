<?php

namespace App\Models;

class Dish
{
  public function __construct(
    public int         $id,
    public string      $name,
    public string|null $imageUrl,
    public int         $price,
    public string|null $description
  )
  {
  }
}