<?php
namespace App\Controller;

class Page extends \Swoole\Controller
{
    function index()
    {
        $this->display();
    }

    function chatroom()
    {
        $this->display();
    }
}