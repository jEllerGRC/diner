<?php
/*
* 328/diner/model/validate.php
* Validate data for the diner app
*/

// Return true if food is valid
function validFood($food)
{
    if (trim($food) == "")
    {
        return false;
    }
    if (!ctype_alpha($food))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validMeal($meal)
{
    return in_array($meal, getMeals()); //returns true if breakfast, lunch or dinner; returns false if anything else.
}
?>
