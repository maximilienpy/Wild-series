<?php

namespace App\Controller;

use App\Entity\Program;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * 
     * montre toutes les lignes de program's entity
     * 
     * 
     * @Route("/", name="index")
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
     * 
     * Récupère un programme par son id
     * 
     * @Route("/list/{id<^[0-9]+$>}", name ="list")
     * @return Response
     * 
     */
    public function list(int $id): Response
    {
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['id' => $id]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
        return $this->render('program/list.html.twig', [
            'program' => $program,
        ]);
    }
}
