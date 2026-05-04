<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    // public function index(): JsonResponse
    // {
    //     return $this->json([
    //         'message' => 'Welcome to your new controller!',
    //         'path' => 'src/Controller/HomeController.php',
    //     ]);
    // } 

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'name' => 'SANTIAGO MARTINEZ KAMGA',
            'title' => 'Certified Symfony Web Developer',
            'linkedin' => 'https://www.linkedin.com/in/santiago-martinez-kamga-8070ab167/',
            'photo' => '/images/profile.jpg'
        ]);  
    }

    #[Route('/certifications', name: 'certifications_route')]
    public function ListOfCertifications(): Response   
    { 
        return $this->render('certifications/certification.html.twig');
    } 
     
}
