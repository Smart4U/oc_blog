<?php


namespace App\Bundles\Blog\Controllers;


use App\Core\Controller\BaseController;

/**
 * Class BlogController
 * @package App\Bundles\Blog\Controllers
 */
class BlogController extends BaseController
{

    public function index() :string {

        return 'blog index';
    }

}