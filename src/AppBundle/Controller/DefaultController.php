<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Visitors;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $ip = $request->getClientIp();
        if($ip == 'unknown'){
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $em = $this->getDoctrine()->getManager();
        $visitors = new Visitors();

        $visitors->setIp($ip);
        $visitors->setDate(new \DateTime('now'));

        $em->persist($visitors);
        $em->flush();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
