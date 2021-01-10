<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ProgramController extends AbstractController
{
    /**
     * @Route("/program", name="program")
     */
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /** 
     * @Route("/program/list/{id}/", methods={"GET"}, requirements={"id"="\d+"}, name="program_list")
     */
    public function show(int $id = 1): Response
    {
        return $this->render('program/list.html.twig', ['id' => $id]);
    }


}
