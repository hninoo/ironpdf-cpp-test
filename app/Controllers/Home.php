<?php

namespace App\Controllers;

use App\Repositories\PageContentRepository;

class Home extends BaseController
{
    private PageContentRepository $pageContent;

    public function __construct()
    {
        $this->pageContent = service('pageContentRepository');
    }

    public function index(): string
    {
        return view('pages/home', ['c' => $this->pageContent->loadHomeContent()]);
    }
}
