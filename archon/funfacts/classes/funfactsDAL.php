<?php 
class funfactsDAL
{
    public $pdo=null;
    function __construct()
    {		
	    try 
	    {
		    $connectionString = include './../../dbConfig.php';  $GLOBALS['pdo'] = new PDO($connectionString[0],$connectionString[1], $connectionString[2]);
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
            $query="INSERT INTO funfacts( "; 
            $query.=" creativeWork "; 
            $query.=", "; 
            $query.=" satisfiedClients "; 
            $query.=", "; 
            $query.=" cupsofcoffee "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->creativeWork}'"; 
            $query.=", "; 
            $query.="'{$obj->satisfiedClients}'"; 
            $query.=", "; 
            $query.="'{$obj->cupsofcoffee}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE funfacts SET "; 
            $query.="creativeWork='{$obj->creativeWork}'"; 
            $query.=", "; 
            $query.="satisfiedClients='{$obj->satisfiedClients}'"; 
            $query.=", "; 
            $query.="cupsofcoffee='{$obj->cupsofcoffee}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM funfacts"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM funfacts"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM funfacts;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM funfacts WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(creativeWork IS NULL OR creativeWork LIKE '%{$obj->creativeWork}%') ";
            $query.= " OR ";
            $query.= "(satisfiedClients IS NULL OR satisfiedClients LIKE '%{$obj->satisfiedClients}%') ";
            $query.= " OR ";
            $query.= "(cupsofcoffee IS NULL OR cupsofcoffee LIKE '%{$obj->cupsofcoffee}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
