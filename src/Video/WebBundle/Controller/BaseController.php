<?php

namespace Video\WebBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
	    protected function createJsonResponse($data)
	    {
	        return new JsonResponse($data);
	    }
}
