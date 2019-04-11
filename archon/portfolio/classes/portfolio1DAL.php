<?php 
class portfolio1DAL
{
    public $pdo = null;
    function __construct()
    {
        try {
            $GLOBALS['pdo'] = new PDO('mysql:host=127.0.0.1;dbname=coordina_coordinator', 'root', '');
            $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    // echo "Connected successfully"; 			
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function Add($obj)
    {
        $db = $GLOBALS['pdo'];
        $query = "INSERT INTO portfolio( ";
        $query .= " title ";
        $query .= ", ";
        $query .= " type ";
        $query .= ", ";
        $query .= " image ";
        $query .= ") VALUES (";
        $query .= "'{$obj->title}'";
        $query .= ", ";
        $query .= "'{$obj->type}'";
        $query .= ", ";
        $query .= "'{$obj->image}'";
        $query .= ");";
        $db->query($query);
    }
    public function Update($obj)
    {
        $db = $GLOBALS['pdo'];
        $query = "UPDATE portfolio SET ";
        $query .= "title='{$obj->title}'";
        $query .= ", ";
        $query .= "type='{$obj->type}'";
        $query .= ", ";
        $query .= "image='{$obj->image}'";
        $query .= "WHERE id='{$obj->id}' ;";
        $db->query($query);
    }
    public function Delete($i)
    {
        $db = $GLOBALS['pdo'];
        $query = "DELETE FROM portfolio";
        $query .= " WHERE id='{$i}'";
        $query .= ";";
        $db->query($query);
    }
    public function Find($i)
    {
        $db = $GLOBALS['pdo'];
        $query = "SELECT * FROM portfolio";
        $query .= " WHERE id='{$i}'";
        $query .= ";";
        return $db->query($query);
    }
    function LoadAll()
    {
        $db = $GLOBALS['pdo'];
        $query = "SELECT * FROM portfolio;";
        if ($db != null) {
            return $db->query($query);
        }
    }
    public function Search($obj)
    {
        $db = $GLOBALS['pdo'];
        $query = "SELECT * FROM portfolio WHERE ";
        $query .= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
        $query .= " OR ";
        $query .= "(title IS NULL OR title LIKE '%{$obj->title}%') ";
        $query .= " OR ";
        $query .= "(type IS NULL OR type LIKE '%{$obj->type}%') ";
        $query .= " OR ";
        $query .= "(image IS NULL OR image LIKE '%{$obj->image}%') ";
        if ($db != null) {
            return $db->query($query);
        }
    }
}
