<?php

namespace Mistra\TutoBundle\Form\Events;

use Symfony\Component\Form\FormEvents;

use Symfony\Component\Form\Event\DataEvent;

use Symfony\Component\Form\FormFactoryInterface;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserTypeSubscriber implements EventSubscriberInterface {
	
	private $factory;
	
	public function __construct(FormFactoryInterface $factory) {
		$this->factory = $factory;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\EventDispatcher\EventSubscriberInterface::getSubscribedEvents()
	 */
	public static function getSubscribedEvents() {
		return array(
			FormEvents::PRE_SET_DATA => 'preSetData'
		);
	}
	
	public function preSetData(DataEvent $dataEvent) {
		$data = $dataEvent->getData();
		if (null === $data) {
			return;
		}
		
		$form = $dataEvent->getForm();
		if ($data->getLogin() != null) {
			$form->add($this->factory->createNamed('access', 'choice', null, array(
				'choices' => array(1, 2, 3)
			)));
		}
		else {
			$form->add($this->factory->createNamed('password', 'text', null, array()));
		}
	}
}
