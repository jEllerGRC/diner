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

    function breakfast()
    {
        //Display a view page
        $view = new Template();
        echo $view -> render ("views/breakfast-menu.html");
    }

    function order1($f3)
    {
        //Initialize variables to ensure proper scope
        $food = "";
        $meal = "";

        //if the form has been posted
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            //validate the data
            if(validFood($_POST["food"]))
            {
                $food = $_POST["food"];
            }
            else
            {
                $f3 -> set("errors['food']", "Invalid food");
            }

            if(isset($_POST["meal"]) and validMeal($_POST["meal"]))
            {
                $meal = $_POST["meal"];
            }
            else
            {
                $f3 -> set("errors['meal']", "Invalid meal choice");
            }

            if (empty($f3 -> get("errors")))
            {
                //If there aren't any errors, instantiate an Order object.
                $order = new Order($food, $meal);

                //put the Object in the session array
                $f3 -> set ("SESSION.order", $order);

                //redirect to order2 route
                $f3 -> reroute ("order2");
            }
        }

        //Add data to the f3 "hive"
        $f3 -> set("meals", DataLayer::getMeals()); //make a method call to something stored in the data-layer file

        $view = new Template();
        echo $view->render('views/order-form-1.html');
    }
}