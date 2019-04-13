<?php 
class testimonialsDAL
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
            $query="INSERT INTO testimonials( "; 
            $query.=" text "; 
            $query.=", "; 
            $query.=" author "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->text}'"; 
            $query.=", "; 
            $query.="'{$obj->author}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE testimonials SET "; 
            $query.="text='{$obj->text}'"; 
            $query.=", "; 
            $query.="author='{$obj->author}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM testimonials"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM testimonials"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM testimonials;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM testimonials WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(text IS NULL OR text LIKE '%{$obj->text}%') ";
            $query.= " OR ";
            $query.= "(author IS NULL OR author LIKE '%{$obj->author}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
