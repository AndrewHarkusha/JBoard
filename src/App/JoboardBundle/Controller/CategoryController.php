<?php

namespace App\JoboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\JoboardBundle\Entity\Category;

/**
 * Category controller
 *
 */
class CategoryController extends Controller {

    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppJoboardBundle:Category')->findOneBySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('Такая категория не найдена.');
        }

        $category->setActiveJobs($em->getRepository('AppJoboardBundle:Job')->getActiveJobs($category->getId()));

        return $this->render('AppJoboardBundle:Category:show.html.twig', array(
            'category' => $category,
        ));
    }

}