<?php  
$_ENV = include '../.env.php';

class Model {

    protected static $dbc;
    protected static $table;

    private $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    protected static function dbConnect()
    {
        //set constants for database connections

        if (!self::$dbc)
        {
            self::$dbc = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        // @TODO: Return the value from attributes with a matching $name, if it exists
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        // @TODO: Store name/value pair in attributes array
        $this->attributes[$name] = $value;
    }

    /*
     * Persist the object to the database
     */

// DONT FORET TO UNCOMMENT AND FINISH SAVE FUNCTION, FIND FUNCTION, AND ALL FUNCTION FOR ACTUAL USE!!!!!!!!!!!

        public function save()
    {
        if(isset($this->attributes)){
            if(isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
            }
        }
    }

    public function insert ()
    {
        self::dbConnect();
        $query = 'INSERT INTO contacts (first_name, last_name) VALUES (:first_name, :last_name)';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':first_name', $this->attributes['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->attributes['last_name'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update ()
    {
        self::dbConnect();
        $query = 'UPDATE contacts 
                    SET first_name = :first_name, 
                    last_name = :last_name
                    WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':first_name', $this->attributes['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->attributes['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->execute();

    }

    public static function find($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM contacts WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }


    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query('SELECT * FROM contacts');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    public static function getTableName()
    {
        return static:: $table;
    }

    

}
?>