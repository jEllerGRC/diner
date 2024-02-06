<?php
    /*  Jared Eller
     *  January 30, 2024
     *  https://github.com/jEllerGRC/diner
     *  This is my CONTROLLER. MVC: Model, View, Controller.
     */

    //Turn on error reporting
    ini_set ("display_errors", 1);
    error_reporting (E_ALL);

    //Require the autoload file
    require_once ("vendor/autoload.php");
    require_once ("model/data-layer.php");

    //Instantiate Fat-Free framework (F3)
    $f3 = Base::instance(); //static method call
    //Java translation: Base f3 = new Base();

    //Define a default route
    $f3 -> route ("GET /", function()
    { //anonymous function call as an argument for route
//        echo "My Diner";

        //Display a view page
        $view = new Template();
        echo $view -> render ("views/home.html");
    });

    //Define a breakfast route
    $f3 -> route ("GET /breakfast", function()
    { //anonymous function call as an argument for route
//            echo "breakfast";

        //Display a view page
        $view = new Template();
        echo $view -> render ("views/breakfast-menu.html");
    });

    //Define the order form 1 route
    $f3 -> route ("GET|POST /order1", function($f3)
    { //anonymous function call as an argument for route
//        echo "Order Form Part I";

        //if the form has been posted
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //validate the data
            $food = $_POST["food"];
            $meal = $_POST["meal"];

            //put the data in the session array
            $f3 -> set ("SESSION.food", $food);
            $f3 -> set ("SESSION.meal", $meal);

            //redirect to order2 route
            $f3 -> reroute ("order2");
        }

        //Add data to the f3 "hive"
        $f3 -> set("meals", getMeals()); //make a method call to something stored in the data-layer file

        $view = new Template();
        echo $view->render('views/order-form-1.html');
    });

    //Define the order form 2 route
    $f3 -> route ("GET|POST /order2", function($f3) { //anonymous function call as an argument for route
//        echo "Order Form Part II";

        //if the form has been posted
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //validate the data
            $food = $_POST["food"];
            $meal = $_POST["meal"];

            //put the data in the session array
            $f3->set("SESSION.food", $food);
            $f3->set("SESSION.meal", $meal);

            //redirect to summary route
            $f3->reroute("summary");

        }

        //Add the data to the f3 hive
        $f3 -> set ("condiments", getCondiments()); //make a method call to something stored in the data-layer file

        //Display a view page
        $view = new Template();
        echo $view -> render ("views/order-form-2.html");
    });

    //Define a breakfast route
    $f3 -> route ("GET /summary", function()
    { //anonymous function call as an argument for route
    //            echo "breakfast";

        //Display a view page
        $view = new Template();
        echo $view -> render ("views/order-summary.html");
    });

    //Run F3
    $f3 -> run(); //instance method call

?>