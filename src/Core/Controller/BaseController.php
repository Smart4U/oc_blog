<?php

namespace App\Core\Controller;

use App\Core\View\TwigViewer;
use GuzzleHttp\Psr7\ServerRequest;

/**
 * Class BaseController
 * @package App\Core\Controller
 */
class BaseController
{

    /**
     * @var ServerRequest
     */
    protected $request;
    /**
     * @var TwigViewer
     */
    protected $twigViewer;

    /**
     * BaseController constructor.
     * @param ServerRequest $request
     * @param TwigViewer $twigViewer
     */
    public function __construct(ServerRequest $request, TwigViewer $twigViewer)
    {
        $this->request = $request;
        $this->twigViewer = $twigViewer;
    }


}