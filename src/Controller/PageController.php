<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class PageController
{
    /**
     * @Route("/")
     * @Template()
     */
    public function index()
    {
        return [];
    }
}
