<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // register
        if ($pathinfo === '/register.html') {
            return array (  '_controller' => 'Mistra\\TutoBundle\\Controller\\DefaultController::registerAction',  '_route' => 'register',);
        }

        // admin_edit_user
        if (0 === strpos($pathinfo, '/admin/edit') && preg_match('#^/admin/edit/(?P<id>[^/\\.]+)\\.html$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Mistra\\TutoBundle\\Controller\\DefaultController::editUserAction',)), array('_route' => 'admin_edit_user'));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
