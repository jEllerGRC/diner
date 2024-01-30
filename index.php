<?php
    /*  Jared Eller
     *  January 30, 2024
     *  https://github.com/jEllerGRC/diner
     *  This is my CONTROLLER. MVC: Model, View, Controller.
     */

    //Turn on error reporting
    ini_set("display_errors", 1);
    error_reporting(E_ALL);

    //Require the autoload file
    require_once("vendor/autoload.php");

    //Instantiate Fat-Free framework (F3)
    $f3 = Base::instance(); //static method call
    //Java translation: Base f3 = new Base();

    //Define a default route
    $f3 -> route ("GET / ", function()
    { //anonymous function call as an argument for route
//        echo "My Diner";

        //Display a view page
        $view = new Template();
        echo $view -> render ("views/home.html");
    });

    //Run F3
    $f3 -> run(); //instance method call

?>