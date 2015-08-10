<?php
class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if(isset($_REQUEST[$key])){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (isset($_REQUEST[$key])){
            return $_REQUEST[$key];
        }else{
            return $default;
        }
    }

    public static function getString($key, $min = 0, $max = 500)
    {
        $value = static::get($key);
        htmlspecialchars(strip_tags(trim($value)));
        if (is_string($value)) {
            if (strlen($value) > $max) {
                throw new LengthException("Error Processing Request: Input exceeds maximum number of characters");
            }elseif(empty($value) || strlen($value) < $min) {
                throw new LengthException("Error Processing Request: Input cannot be empty");   
            }
        return $value;
        }else{
            throw new InvalidArgumentException("Error Processing Request: Please input text only");
        }
    }

    public static function getNumber($key, $min = 0, $max = 100000000)
    {
        $value = str_replace(',', '', static::get($key));
        if (!is_numeric($value)) {
            throw new InvalidArgumentException("Error Processing Request: Input must be a number");
            
        }else{
            if ($value > 0) {
                if ($value > $max) {
                    throw new OutOfRangeException("Error Processing Request: Input exceeds maximum number for valid value");
                }elseif($value < $min) { 
                    throw new OutOfRangeException("Error Processing Request: Value can not be negative");
                }
                return $value;
            }
        }
    }

    public static function getDate($key)
    {
        $value = static::get($key);
        if ($value == "mm/dd/yyyy") {
            throw new InvalidArgumentException("Error Processing Request: Please input a`1 valid date");
        }
        $format = 'm-d-Y';
        $dateObject = new DateTime($value);
        if ($dateObject) {
            return $dateObject->format($format);
        }else{
            throw new Exception("Error Processing Request: Input must be valid date");
            
        }
    }


 

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
