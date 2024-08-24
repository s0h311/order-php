<?php

namespace App\Pages;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePage
{
  #[Route('/')]
  public function execute(): Response {
    return new Response('<html><body><div>MOIN</div></body></html>');
  }
}