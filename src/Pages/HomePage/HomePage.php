<?php

namespace App\Pages\HomePage;

use App\Pages\Pages;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

class HomePage extends AbstractController
{
  #[Route(path: '/', name: Pages::HOME_PAGE, methods: [Request::METHOD_GET])]
  public function execute(): Response
  {
    return $this->render('@Pages/HomePage/HomePage.twig');
  }

  #[Route(path: '/resultForAddress', methods: [Request::METHOD_GET])]
  public function handleAddressFormSubmit(
    #[MapQueryParameter] string $address
  ): RedirectResponse
  {
    return $this->redirectToRoute(Pages::RESULT_PAGE, [
      'address' => $address,
    ], Response::HTTP_SEE_OTHER);
  }

  #[Route(path: '/address', methods: [Request::METHOD_GET])]
  public function handleInputResult(
    #[MapQueryParameter] string $q
  ): Response
  {
    $result = [];

    if (!empty($q)) {
      $addresses = [
        "Steindamm",
        "An der Alster",
        "Boltenhagener Straße",
        "Kühlungsborner Straße"
      ];
      
      foreach ($addresses as $address) {
        if (\str_starts_with(\strtolower($address), \strtolower($q))) {
          $result[] = $address;
        }
      }
    }

    return $this->render('@Components/AutocompleteOption.twig', [
      'options' => $result
    ]);
  }
}