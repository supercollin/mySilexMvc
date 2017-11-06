<?php

namespace App\Ordinateur\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function listAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $ordinateurs = $app['repository.ordinateur']->getAll($parameters['id']);

        return $app['twig']->render('ordinateur.list.html.twig', array('ordinateurs' => $ordinateurs));
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $app['repository.ordinateur']->delete($parameters['id']);

        return $app->redirect($app['url_generator']->generate('ordinateur.list'));
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $ordinateur = $app['repository.ordinateur']->getById($parameters['id']);

        return $app['twig']->render('ordinateur.form.html.twig', array('ordinateur' => $ordinateur));
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
        if ($parameters['id']) {
            $ordinateur = $app['repository.ordinateur']->update($parameters);
        } else {
            $ordinateur = $app['repository.ordinateur']->insert($parameters);
        }

        return $app->redirect($app['url_generator']->generate('ordinateur.list'));
    }

    public function newAction(Request $request, Application $app)
    {
        return $app['twig']->render('ordinateur.form.html.twig');
    }
}
