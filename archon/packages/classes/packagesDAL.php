<?php
class packagesDAL
{
    public $pdo=null;
    public function __construct($connectionString)
    {
        try {
            if (!isset($connectionString)) {
                $connectionString = include './../../dbConfig.php';
            }
            $GLOBALS['pdo'] = new PDO($connectionString[0], $connectionString[1], $connectionString[2]);
            $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function Add($obj)
    {
        $db=$GLOBALS['pdo'];
        $query="INSERT INTO packages( ";
        $query.=" title ";
        $query.=", ";
        $query.=" price ";
        $query.=", ";
        $query.=" type ";
        $query.=", ";
        $query.=" duration ";
        $query.=") VALUES (";
        $query.="'{$obj->title}'";
        $query.=", ";
        $query.="'{$obj->price}'";
        $query.=", ";
        $query.="'{$obj->type}'";
        $query.=", ";
        $query.="'{$obj->duration}'";
        $query.=");";
        $db->query($query);
    }
    public function Update($obj)
    {
        $db=$GLOBALS['pdo'];
        $query="UPDATE packages SET ";
        $query.="title='{$obj->title}'";
        $query.=", ";
        $query.="price='{$obj->price}'";
        $query.=", ";
        $query.="type='{$obj->type}' ";
        $query.=", ";
        $query.="duration='{$obj->duration}' ";
        $query.="WHERE id='{$obj->id}' ;";
        $db->query($query);
    }
    public function Delete($i)
    {
        $db=$GLOBALS['pdo'];
        $query="DELETE FROM packages";
        $query.=" WHERE id='{$i}'";
        $query.=";";
        $db->query($query);
    }
    public function Find($i)
    {
        $db=$GLOBALS['pdo'];
        $query="SELECT * FROM packages";
        $query.=" WHERE id='{$i}'";
        $query.=";";
        return $db->query($query);
    }
    public function LoadAll()
    {
        $db=$GLOBALS['pdo'];
        $query="SELECT * FROM packages;";
        if ($db!=null) {
            return $db->query($query);
        }
    }
    public function GetMaxID()
    {
        $db = $GLOBALS['pdo'];
        $query = "SELECT * FROM packages ORDER BY id DESC LIMIT 0, 1";
        if ($db != null) {
            return $db->query($query);
        }
    }
    public function Search($obj)
    {
        $db=$GLOBALS['pdo'];
        $query="SELECT * FROM packages WHERE ";
        $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
        $query.= " OR ";
        $query.= "(title IS NULL OR title LIKE '%{$obj->title}%') ";
        $query.= " OR ";
        $query.= "(price IS NULL OR price LIKE '%{$obj->price}%') ";
        $query.= " OR ";
        $query.= "(type IS NULL OR type LIKE '%{$obj->type}%') ";
        if ($db!=null) {
            return $db->query($query);
        }
    }
}
