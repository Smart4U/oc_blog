<?php


namespace App\Bundles\Blog\Controllers;


use App\Core\View\TwigViewer;
use GuzzleHttp\Psr7\ServerRequest;

use App\Core\Controller\BaseController;

/**
 * Class BlogController
 * @package App\Bundles\Blog\Controllers
 */
class BlogController extends BaseController
{

    /**
     * BlogController constructor.
     * @param ServerRequest $request
     * @param TwigViewer $twigViewer
     */
    public function __construct(ServerRequest $request, TwigViewer $twigViewer)
    {
        parent::__construct($request, $twigViewer);
        $this->twigViewer->addPath(dirname(__DIR__) . '/Views', null);
    }

    /**
     * @param ServerRequest $request
     * @return string
     */
    public function index(ServerRequest $request) :string {
        return $this->twigViewer->render('index');
    }

    /**
     * @param ServerRequest $request
     * @return string
     */
    public function show(ServerRequest $request) :string {
        return $this->twigViewer->render('show');
    }

}