<?php

namespace App\Bundles\Contact\Controllers;


use App\Core\Controller\BaseController;
use App\Core\View\TwigViewer;
use GuzzleHttp\Psr7\ServerRequest;


/**
 * Class ContactController
 * @package App\Bundles\Contact\Controllers
 */
class ContactController extends BaseController
{


    /**
     * ContactController constructor.
     * @param ServerRequest $request
     * @param TwigViewer $twigViewer
     */
    public function __construct(ServerRequest $request, TwigViewer $twigViewer)
    {
        parent::__construct($request, $twigViewer);
        $this->twigViewer->addPath(dirname(__DIR__) . '/Views', null);
    }

    /**
     * @return string
     */
    public function contact() {
        return $this->twigViewer->render('contact');
    }

}