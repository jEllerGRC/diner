<?php

/**
 * The Controller class for my Diner app
 */

class Controller
{
    private $_f3; //Fat-free router

    function __construct($f3)
    {
        $this -> _f3 = $f3;
    }

    function home()
    {
        //Display a view page
        $view = new Template();
        echo $view -> render ("views/home.html");
    }

    function order1()
    {

    }
}