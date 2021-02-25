<?php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/categories", name="category_")
*/
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        //Récupérer toutes les catégories de la BDD
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();


        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /** 
     * 
     * Récupère une catégory par
     * 
     * @Route("/show/{categoryName}", name ="show")
     * @return Response
     * 
     */
    public function show(string $categoryName): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findBy(['name' => $categoryName]);

        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(
                ['category' => $category],
                ['id' => 'DESC'],
                3
            );

        

        if (!$category) {
            throw $this->createNotFoundException(
                'La catégorie : '.$categoryName.' n\'a pas été trouvé.'
            );
        }
        return $this->render('category/show.html.twig', [
            'categoryName' => $categoryName,
            'program' => $program
        ]);
    }
}
