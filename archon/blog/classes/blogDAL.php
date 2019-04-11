<?php 
class blogDAL
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
            $query="INSERT INTO blog( "; 
            $query.=" title "; 
            $query.=", "; 
            $query.=" content "; 
            $query.=", "; 
            $query.=" image "; 
            $query.=", "; 
            $query.=" tags "; 
            $query.=", "; 
            $query.=" dateofcreation "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->title}'"; 
            $query.=", "; 
            $query.="'{$obj->content}'"; 
            $query.=", "; 
            $query.="'{$obj->image}'"; 
            $query.=", "; 
            $query.="'{$obj->tags}'"; 
            $query.=", "; 
            $query.="'{$obj->dateofcreation}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){           


    		$db=$GLOBALS['pdo'];
            $query="UPDATE blog SET "; 
            $query.="title='{$obj->title}'"; 
            $query.=", "; 
            $query.="content='{$obj->content}'"; 
            $query.=", "; 
            $query.="image='{$obj->image}'"; 
            $query.=", "; 
            $query.="tags='{$obj->tags}'"; 
            $query.=", "; 
            $query.="dateofcreation='{$obj->dateofcreation}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM blog"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM blog"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM blog;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM blog WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(title IS NULL OR title LIKE '%{$obj->title}%') ";
            $query.= " OR ";
            $query.= "(content IS NULL OR content LIKE '%{$obj->content}%') ";
            $query.= " OR ";
            $query.= "(image IS NULL OR image LIKE '%{$obj->image}%') ";
            $query.= " OR ";
            $query.= "(tags IS NULL OR tags LIKE '%{$obj->tags}%') ";
            $query.= " OR ";
            $query.= "(dateofcreation IS NULL OR dateofcreation LIKE '%{$obj->dateofcreation}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
