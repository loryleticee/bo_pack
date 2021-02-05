<?php

namespace App\Controller;

use App\Form\Front\RefuseMeetingType;
use App\Manager\DocumentManager;
use App\Manager\MeetingManager;
use App\Manager\UserManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Invite;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Manager\CongresManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{

    /**
    * @Route("/", name="home_redirect")
    */
    public function homeRedirect()
    {
        return $this->redirectToRoute('admin_home');
    }


}
