<?php 
class portfoliocategoriesDAL
{
    public $pdo=null;
    function __construct($connectionString)
    {		
	    try 
	    {
	        if(!isset($connectionString)){
                $connectionString = include './../../dbConfig.php';
	        }
		    $GLOBALS['pdo'] = new PDO($connectionString[0],$connectionString[1], $connectionString[2]);
		    $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully"; 			
        }
	    catch(PDOException $e)
        {
		    echo "Connection failed: " . $e->getMessage();			
        }
    }
    	public function Add($obj){
    		$db=$GLOBALS['pdo'];
            $query="INSERT INTO portfoliocategories( "; 
            $query.=" title "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->title}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE portfoliocategories SET "; 
            $query.="title='{$obj->title}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM portfoliocategories"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM portfoliocategories"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM portfoliocategories;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM portfoliocategories WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(title IS NULL OR title LIKE '%{$obj->title}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
