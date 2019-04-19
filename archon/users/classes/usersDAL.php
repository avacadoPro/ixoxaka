<?php 
class usersDAL
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
            $query="INSERT INTO users( "; 
            $query.=" name "; 
            $query.=", "; 
            $query.=" email "; 
            $query.=", "; 
            $query.=" password "; 
            $query.=", "; 
            $query.=" role "; 
            $query.=", "; 
            $query.=" status "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->name}'"; 
            $query.=", "; 
            $query.="'{$obj->email}'"; 
            $query.=", "; 
            $query.="'{$obj->password}'"; 
            $query.=", "; 
            $query.="'{$obj->role}'"; 
            $query.=", "; 
            $query.="'{$obj->status}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE users SET "; 
            $query.="name='{$obj->name}'"; 
            $query.=", "; 
            $query.="email='{$obj->email}'"; 
            $query.=", "; 
            $query.="password='{$obj->password}'"; 
            $query.=", "; 
            $query.="role='{$obj->role}'"; 
            $query.=", "; 
            $query.="status='{$obj->status}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM users"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM users"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
       public function Auth($email,$password){
        $db=$GLOBALS['pdo'];
        $query="SELECT * FROM users"; 
        $query.=" WHERE email='{$email}'&&password='{$password}'"; 
        $query.=";"; 
           return $db->query($query);
        }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM users;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM users WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(name IS NULL OR name LIKE '%{$obj->name}%') ";
            $query.= " OR ";
            $query.= "(email IS NULL OR email LIKE '%{$obj->email}%') ";
            $query.= " OR ";
            $query.= "(password IS NULL OR password LIKE '%{$obj->password}%') ";
            $query.= " OR ";
            $query.= "(role IS NULL OR role LIKE '%{$obj->role}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
