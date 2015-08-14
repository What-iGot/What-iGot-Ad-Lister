<?php  
require_once 'BaseModel.php';

class User extends Model 
{
	protected static $table = 'users';

	public static function find($id)
	{
		self::dbConnect();
		$query = 'SELECT * FROM users WHERE id = :id';
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
	//get all rows from the users table
	public static function all()
	{
		self::dbConnect();
		$stmt = self::$dbc->query('SELECT * FROM users');
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
	}

	public function save()
	{
		if(isset($this->attributes)){
			if(isset($this->attributes['id'])){
				$this->update();
			} else {
				$this->insert();
			}
		}

	}
	public function update()
	{
		self::dbConnect();
        $query = 'UPDATE users 
                    SET id = :id, 
                    user_id = :user_id,
                    user_name = :user_name,
                    first_name = :first_name,
                    last_name = :last_name,
                    email = :email,
                    password = :password
                    WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $this->attributes['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':user_name', $this->attributes['user_name'], PDO::PARAM_STR);
        $stmt->bindValue(':first_name', $this->attributes['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->attributes['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
        $stmt->execute();
	}
	public function insert()
	{
		$query = 'INSERT INTO users (id, user_id, user_name, first_name, last_name, email, password) VALUES (:id, :user_id, :user_name, :first_name, :last_name :email, :password);';
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
		$stmt->bindValue(':user_id', $this->attributes['user_id'], PDO::PARAM_INT);
		$stmt->bindValue(':user_name', $this->attributes['user_name'], PDO::PARAM_STR);
		$stmt->bindValue(':first_name', $this->attributes['first_name'], PDO::PARAM_STR);
		$stmt->bindValue(':last_name', $this->attributes['last_name'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
		$stmt->execute();
	}
	public function delete()
	{
		$query = 'DELETE * FROM users WHERE id = :id';
		$stmt - self::$dbc->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute;
	}
}



?>