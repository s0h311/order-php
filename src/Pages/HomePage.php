<?php

namespace App\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePage extends AbstractController
{
  #[Route('/')]
  public function execute(): Response {
    return $this->render('@Pages/HomePage.twig');
  }
}