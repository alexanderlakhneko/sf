<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Feetback;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
//        $em = $this->get('doctrine')->getManager();
//
//        $feetback = (new Feetback())
//            ->setEmail('al@al.al')
//            ->setIpAddress('127.0.0.1')
//            ->setMassage('hello')
//            ->setName('Al');
//
//        $em->persist($feetback);
//        $em->flush();
//
//        dump($feetback);

        return [];
    }

    /**
     * @Route("/contact-us", name="contact")
     * @Template()
     * @param Request $request
     */
    public function contactAction(Request $request)
    {

    }
}
