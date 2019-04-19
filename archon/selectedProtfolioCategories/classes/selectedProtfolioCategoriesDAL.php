<?php 
class selectedprotfoliocategoriesDAL
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
            $query="INSERT INTO selectedprotfoliocategories( "; 
            $query.=" portfolioId "; 
            $query.=", "; 
            $query.=" portfolioCategoryId "; 
            $query.=") VALUES ("; 
            $query.="'{$obj->portfolioId}'"; 
            $query.=", "; 
            $query.="'{$obj->portfolioCategoryId}'"; 
            $query.=");"; 
                $db->query($query);
       }
    	public function Update($obj){
    		$db=$GLOBALS['pdo'];
            $query="UPDATE selectedprotfoliocategories SET "; 
            $query.="portfolioId='{$obj->portfolioId}'"; 
            $query.=", "; 
            $query.="portfolioCategoryId='{$obj->portfolioCategoryId}'"; 
            $query.="WHERE id='{$obj->id}' ;"; 
             $db->query($query);
       }
    	public function Delete($i){
    		$db=$GLOBALS['pdo'];
            $query="DELETE FROM selectedprotfoliocategories"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
            $db->query($query);
       }
    	public function Find($i){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM selectedprotfoliocategories"; 
            $query.=" WHERE id='{$i}'"; 
            $query.=";"; 
               return $db->query($query);
       }
    	public function LoadAll(){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM selectedprotfoliocategories;"; 
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
    	public function Search($obj){
    		$db=$GLOBALS['pdo'];
            $query="SELECT * FROM selectedprotfoliocategories WHERE "; 
            $query.= "(id IS NULL OR id LIKE '%{$obj->id}%') ";
            $query.= " OR ";
            $query.= "(portfolioId IS NULL OR portfolioId LIKE '%{$obj->portfolioId}%') ";
            $query.= " OR ";
            $query.= "(portfolioCategoryId IS NULL OR portfolioCategoryId LIKE '%{$obj->portfolioCategoryId}%') ";
            if($db!=null) 
            {
               return $db->query($query);
            }
       }
}
