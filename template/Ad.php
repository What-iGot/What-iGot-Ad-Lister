<?php
require_once 'model.php';
class Ad extends Model {

    protected static $table = SQL_TABLE;

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
        $query = "INSERT INTO items (name, description, price, image_url, postdate) 
            VALUES (:item, :description, :price, :image_url, :postdate)";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':item', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);
        $stmt->bindValue(':image_url', $this->image_url, PDO::PARAM_STR);
        $stmt->bindValue(':postdate', $this->postdate, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update ()
    {
        self::dbConnect();
        $query = 'UPDATE contacts 
                    SET name = :item, 
                    description = :description,
                    price = :price,
                    image_url = :image_url,
                    postdate = :postdate
                    WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':item', $this->attributes['name'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_INT);
        $stmt->bindValue(':image_url', $this->attributes['image_url'], PDO::PARAM_STR);
        $stmt->bindValue(':postdate', $this->attributes['postdate'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function find($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM ' . SQL_TABLE . ' WHERE id = :id';
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
        $stmt = self::$dbc->query('SELECT * FROM ' . SQL_TABLE);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }
}
?>