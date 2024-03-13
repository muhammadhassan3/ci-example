<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function withParam($paramPertama, $paramKedua, $paramKetiga)
    {
        $data = [
            'Parameter Pertama' => $paramPertama,
            'Parameter Kedua' => $paramKedua,
            'Parameter Ketiga' => $paramKetiga
        ];

        $response = response();
        $response->setHeader('Content-Type', 'application/json');
        $response->setBody(json_encode($data));
        $response->noCache();

        return $response;
    }

    public function withQuery()
    {
        echo $this->request->getGet('title');
    }

    public function negotiation()
    {
        $supported = [
            'application/json',
            'text/html',
            'application/xml',
        ];

        echo $this->request->getHeader("Accept-Language") . '<br/>';
        echo $this->request->negotiate('media', $supported, true);
    }

    public function putView()
    {
        return view('pages/put_example');
    }

    public function put()
    {
        echo $this->request->getMethod(true) . ' Berhasil dipanggil';
    }

    public function redirect()
    {
        return $this->redirect()->to;
    }

    public function header()
    {
        echo $this->request->getIPAddress() . '<br/>';
        echo $this->request->getMethod(true) . '<br/>';

        $uri = $this->request->getUri();

        echo $uri->getScheme() . '<br/>';
        echo $uri->getAuthority() . '<br/>';
        echo $uri->getUserInfo() . '<br/>';
        echo $uri->getHost() . '<br/>';
        echo $uri->getPort() . '<br/>';
        echo $uri->getPath() . '<br/>';
        echo $uri->getQuery() . '<br/>';
        echo $uri->getSegment(1) . '<br/>';
        echo $uri->getTotalSegments() . '<br/>';
    }

    public function files()
    {
        $files = $this->request->getFile('foto');

        return $files;
    }

    public function render()
    {
        return view('pages/render_example', ['title' => 'Render example']);
    }
}
