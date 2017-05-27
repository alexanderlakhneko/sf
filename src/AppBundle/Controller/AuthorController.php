<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Feetback;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller
{
    /**
     * @Route("/authors", name="author_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $author = $this->get('doctrine')->getRepository('AppBundle:Author')->findBy([], ['lastName' => 'DESC']);
        dump($author);
        return ['authors' =>$author];
    }

}
