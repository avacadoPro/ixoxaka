<?php 
class packageServicesSelectedDAL
{
    public $pdo=null;
    function __construct($connectionString)
    {		
	    try 
	    {
	        if(!isset($connectionString)){
	            $connectionString = include 'DbConfig.php';
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
            $query="INSERT INTO packageservicesselected( "; 
            $query.=" packageId "; 
            $query.=", "; 
            $query.=" packegeServiceId "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->packageId}'"; 
            $query.=", "; 
            $query.="'{$obj->packegeServiceId}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE packageservicesselected SET "; 
            $query.="packageId='{$obj->packageId}'"; 
            $query.=", "; 
            $query.="packegeServiceId='{$obj->packegeServiceId}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM packageservicesselected"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM packageservicesselected"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM packageservicesselected;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
       public function GetMaxID()
    {
        $db = $GLOBALS['pdo'];
        $query = "SELECT * FROM packageservicesselected ORDER BY id DESC LIMIT 0, 1";
        if ($db != null) {
            return $db->query($query);
        }
    }
       public function LoadBypackageId($packageId)
       {
           $db=$GLOBALS['pdo'];
           $query="SELECT * FROM packageservicesselected WHERE packageId=".$packageId.";";
           if ($db!=null) {
               return $db->query($query);
           }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM packageservicesselected WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(packageId IS NULL OR packageId LIKE '%{$obj->packageId}%') ";
            $query.= " OR ";
            $query.= "(packegeServiceId IS NULL OR packegeServiceId LIKE '%{$obj->packegeServiceId}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
