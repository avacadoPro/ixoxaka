<?php 
class servicesDAL
{
    public $pdo=null;
    function __construct()
    {		
	    try 
	    {
		    $GLOBALS['pdo'] = new PDO('mysql:host=localhost:3306;dbname=coordina_coordinator', 'codeit', 'codeit1234!');
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
            $query="INSERT INTO services( "; 
            $query.=" name "; 
            $query.=", "; 
            $query.=" description "; 
            $query.=", "; 
            $query.=" image "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->name}'"; 
            $query.=", "; 
            $query.="'{$obj->description}'"; 
            $query.=", "; 
            $query.="'{$obj->image}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE services SET "; 
            $query.="name='{$obj->name}'"; 
            $query.=", "; 
            $query.="description='{$obj->description}'"; 
            $query.=", "; 
            $query.="image='{$obj->image}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM services"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM services"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM services;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM services WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(name IS NULL OR name LIKE '%{$obj->name}%') ";
            $query.= " OR ";
            $query.= "(description IS NULL OR description LIKE '%{$obj->description}%') ";
            $query.= " OR ";
            $query.= "(image IS NULL OR image LIKE '%{$obj->image}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
