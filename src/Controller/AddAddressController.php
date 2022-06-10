<?php

namespace App\Controller;

use App\Entity\Address;
use App\Form\AddressFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAddressController extends AbstractController
{
    #[Route('/add/address', name: 'app_add_address')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $address = new Address();
        $form = $this->createForm(AddressFormType::class, $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $user = $this->getUser();
            dump($user->getUserIdentifier());


            $address->setUser($user);

            $entityManager->persist($address);
            $entityManager->flush();
        }
        return $this->render('add_address/index.html.twig', [
            'title' => 'Add new address',
            'controller_name' => 'AddAddressController',
            'addressForm' => $form->createView()
        ]);
    }

    #[Route('/delete/address', name: 'app_add_address')]
    public function deleteAddress( $address){

    }
}
