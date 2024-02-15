<?php
/* This file represents the data layer for my diner app.
 * 328/diner/model/data-layer.php
 */

class DataLayer
{
    //these don't access any instance data, meaning they're static functions.
    //the advantage of static functions is that you don't have to instantiate an instance of the DataLayer class.
    static function getMeals()
    {
        return array("breakfast", "lunch", "dinner");
    }

    static function getCondiments()
    {
        return array("ketchup", "mayo", "mustard", "sriracha");
    }
}
?>