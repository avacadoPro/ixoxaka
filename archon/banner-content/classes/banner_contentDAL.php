<?php 
class banner_contentDAL
{
    public $pdo=null;
    public function __construct($connectionString)
    {
        try {
            if (!isset($connectionString)) {
                $connectionString = include './../../dbConfig.php';
            }
            $GLOBALS['pdo'] = new PDO($connectionString[0], $connectionString[1], $connectionString[2]);
            $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    // echo "Connected successfully"; 			
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    	public function Add($obj){
    		$db=$GLOBALS['pdo'];
            $query="INSERT INTO banner_content( "; 
            $query.=" contentURL "; 
            $query.=", "; 
            $query.=" contentType "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->contentURL}'"; 
            $query.=", "; 
            $query.="'{$obj->contentType}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE banner_content SET "; 
            $query.="contentURL='{$obj->contentURL}'"; 
            $query.=", "; 
            $query.="contentType='{$obj->contentType}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM banner_content"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM banner_content"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM banner_content;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function LoadMaxObj(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM banner_content ORDER BY id DESC LIMIT 0, 1;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM banner_content WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(contentURL IS NULL OR contentURL LIKE '%{$obj->contentURL}%') ";
            $query.= " OR ";
            $query.= "(contentType IS NULL OR contentType LIKE '%{$obj->contentType}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
