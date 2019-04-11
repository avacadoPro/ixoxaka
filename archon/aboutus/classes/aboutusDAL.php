<?php 
class aboutusDAL
{
    public $pdo=null;
    function __construct()
    {		
	    try 
	    {
		    $GLOBALS['pdo'] = new PDO('mysql:host=127.0.0.1;dbname=coordina_coordinator', 'root', '');
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
            $query="INSERT INTO aboutus( "; 
            $query.=" title "; 
            $query.=", "; 
            $query.=" content "; 
            $query.=", "; 
            $query.=" image "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->title}'"; 
            $query.=", "; 
            $query.="'{$obj->content}'"; 
            $query.=", "; 
            $query.="'{$obj->image}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE aboutus SET "; 
            $query.="title='{$obj->title}'"; 
            $query.=", "; 
            $query.="content='{$obj->content}'"; 
            $query.=", "; 
            $query.="image='{$obj->image}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM aboutus"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM aboutus"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM aboutus;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM aboutus WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(title IS NULL OR title LIKE '%{$obj->title}%') ";
            $query.= " OR ";
            $query.= "(content IS NULL OR content LIKE '%{$obj->content}%') ";
            $query.= " OR ";
            $query.= "(image IS NULL OR image LIKE '%{$obj->image}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
