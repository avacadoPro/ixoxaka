<?php 
class contactusDAL
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
            $query="INSERT INTO contactus( "; 
            $query.=" address "; 
            $query.=", "; 
            $query.=" phoneNo "; 
            $query.=", "; 
            $query.=" email "; 
            $query.=", "; 
            $query.=" workTime "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->address}'"; 
            $query.=", "; 
            $query.="'{$obj->phoneNo}'"; 
            $query.=", "; 
            $query.="'{$obj->email}'"; 
            $query.=", "; 
            $query.="'{$obj->workTime}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE contactus SET "; 
            $query.="address='{$obj->address}'"; 
            $query.=", "; 
            $query.="phoneNo='{$obj->phoneNo}'"; 
            $query.=", "; 
            $query.="email='{$obj->email}'"; 
            $query.=", "; 
            $query.="workTime='{$obj->workTime}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM contactus"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM contactus"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM contactus;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM contactus WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(address IS NULL OR address LIKE '%{$obj->address}%') ";
            $query.= " OR ";
            $query.= "(phoneNo IS NULL OR phoneNo LIKE '%{$obj->phoneNo}%') ";
            $query.= " OR ";
            $query.= "(email IS NULL OR email LIKE '%{$obj->email}%') ";
            $query.= " OR ";
            $query.= "(workTime IS NULL OR workTime LIKE '%{$obj->workTime}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
