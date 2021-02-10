<?php

namespace App\Controller;

use App\Entity\Program;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ProgramController extends AbstractController
{
    /**
     * 
     * montre toutes les lignes de program's entity
     * 
     * 
     * @Route("/programs", name="program_")
     * @return Response A response instance
     * 
     */
    public function index(): Response
    {

        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        return $this->render('program/index.html.twig', [
            'programs' => $programs]
        );
    }

    /** 
     * @Route("/program/list/{id}/", methods={"GET"}, requirements={"id"="\d+"}, name="program_list")
     */
    public function show(int $id = 1): Response
    {
        return $this->render('program/list.html.twig', ['id' => $id]);
    }


}
