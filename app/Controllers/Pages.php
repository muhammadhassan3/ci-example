<?php

namespace App\Controllers;

use App\Controllers\BasePage;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view(string $page = 'pages')
    {
        // if (!is_file(APPPATH . 'Views/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new PageNotFoundException($page);
        // }



        $data['title'] = $page;

        return view("pages", $data, ['cache' => 40]);
    }
}
