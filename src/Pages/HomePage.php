<?php

namespace App\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

class HomePage extends AbstractController
{
  #[Route(path: '/', name: 'homePage', methods: [Request::METHOD_GET])]
  public function execute(): Response
  {
    return $this->render('@Pages/HomePage.twig');
  }

  #[Route(path: '/resultForAddress', methods: [Request::METHOD_GET])]
  public function handleAddressFormSubmit(
    #[MapQueryParameter] string $address
  ): RedirectResponse
  {
    return $this->redirectToRoute('homePage', [
      'testing' => $address,
    ], Response::HTTP_SEE_OTHER);
  }
}