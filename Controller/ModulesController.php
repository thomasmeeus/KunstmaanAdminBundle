<?php

namespace Kunstmaan\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ModulesController extends Controller
{
    /**
     * @Route("/", name="KunstmaanAdminBundle_modules")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

}
