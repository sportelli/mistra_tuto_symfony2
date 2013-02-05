<?php

namespace Mistra\TutoBundle\Controller;

use Mistra\TutoBundle\Entity\User;

use Mistra\TutoBundle\Form\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {
	
	/**
	 * @Template("MistraTutoBundle:Default:base.html.twig")
	 */
    public function registerAction() {
    	$user = new User();
    	$form = $this->createForm(new UserType(), $user);
        return array(
        	'form' => $form->createView()
        );
    }
    
    /**
     * @Template("MistraTutoBundle:Default:base.html.twig")
     */
    public function editUserAction() {
    	$user = new User();
    	$user->setLogin("test");
    	$form = $this->createForm(new UserType(), $user);
    	return array(
    		'form' => $form->createView()
    	);
    }
}
