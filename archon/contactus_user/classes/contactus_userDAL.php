<?php 
class contactus_userDAL
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
            $query="INSERT INTO contactus_user( "; 
            $query.=" userName "; 
            $query.=", "; 
            $query.=" email "; 
            $query.=", "; 
            $query.=" website "; 
            $query.=", "; 
            $query.=" message "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->userName}'"; 
            $query.=", "; 
            $query.="'{$obj->email}'"; 
            $query.=", "; 
            $query.="'{$obj->website}'"; 
            $query.=", "; 
            $query.="'{$obj->message}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE contactus_user SET "; 
            $query.="userName='{$obj->userName}'"; 
            $query.=", "; 
            $query.="email='{$obj->email}'"; 
            $query.=", "; 
            $query.="website='{$obj->website}'"; 
            $query.=", "; 
            $query.="message='{$obj->message}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM contactus_user"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM contactus_user"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM contactus_user;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM contactus_user WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(userName IS NULL OR userName LIKE '%{$obj->userName}%') ";
            $query.= " OR ";
            $query.= "(email IS NULL OR email LIKE '%{$obj->email}%') ";
            $query.= " OR ";
            $query.= "(website IS NULL OR website LIKE '%{$obj->website}%') ";
            $query.= " OR ";
            $query.= "(message IS NULL OR message LIKE '%{$obj->message}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
