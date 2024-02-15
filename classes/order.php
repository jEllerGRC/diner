<?php

class order
{
    private $_meal;
    private $_food;
    private $_condiments;

    function __construct($meal = "unknown", $food = "unknown", $condiments = "unknown")
    {
        $this -> _meal = $meal;
        $this -> _food = $food;
        $this -> _condiments = $condiments;
    }

    /**
     * This function returns the currently-set meal.
     * @return string the meal of the current order object.
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * This function updates the currently-set meal.
     * @param string $meal the new meal value to be updated.
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    /**
     * This function returns the currently-set food.
     * @return string the food of the current order object.
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * This function updates the currently-set food.
     * @param string $food the new food value to be updated.
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }

    /**
     * This function returns the currently-set condiments.
     * @return string the condiments of the current order object.
     */
    public function getConds()
    {
        return $this->_condiments;
    }

    /**
     * This function updates the currently-set condiments.
     * @param string $condiments the new condiment value to be updated.
     */
    public function setConds($condiments)
    {
        $this->_condiments = $condiments;
    }

}