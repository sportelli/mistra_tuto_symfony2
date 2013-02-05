<?php

namespace Mistra\TutoBundle\Form;

use Mistra\TutoBundle\Form\Events\UserTypeSubscriber;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType {
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->addEventSubscriber(new UserTypeSubscriber($builder->getFormFactory()));

		$builder
			->add('login')
		;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return "mistra_tutobundle_usertype";
	}
}
