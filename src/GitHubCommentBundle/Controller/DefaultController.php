<?php

namespace GitHubCommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Milo\Github;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $api = new Github\Api;
        //$response = $api->get('/emojis');
        $response = $api->get('https://api.github.com/search/users?q=tom+repos:%3E42+followers:%3E1000');
        $emojis = $api->decode($response);
        exit();

        return $this->render('GitHubCommentBundle:Default:index.html.twig');
    }
}



