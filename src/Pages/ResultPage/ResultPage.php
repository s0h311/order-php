<?php

namespace App\Pages\ResultPage;

use App\Models\Dish;
use App\Pages\Pages;
use App\Services\ResultService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

class ResultPage extends AbstractController
{

  public function __construct(
    private readonly ResultService $resultService
  )
  {
  }

  #[Route(path: '/result', name: Pages::RESULT_PAGE, methods: [Request::METHOD_GET])]
  public function execute(
    #[MapQueryParameter] string $address
  ): Response
  {
    $dishes = $this->getDishes($address);

    return $this->render('@Pages/ResultPage/ResultPage.twig', [
      'dishes' => $dishes
    ]);
  }

  #[Route(path: '/getThing', methods: [Request::METHOD_GET])]
  public function getThing(): Response
  {
    return new Response('IT WORKS');
  }

  /**
   * @param string $address
   * @return array<Dish>
   */
  public function getDishes(string $address): array
  {
    return $this->resultService->getDishesForAddress($address);
  }
}