<?php
global $SITETEMP;
global $M;


class syscore {
	static public $_db;
	public static function db() 
	{
   	 if (!static::$_db) {
        static::$_db = new Mongo("mongodb://".SITEDBUSERNAME.":".SITEDBPASS."@".SITEDBURL.":".SITEDBPORT, array(/*"persist" => "x", */"db"=>SITEDB));
   	 }
	 $siteDB = SITEDB;
   	 return static::$_db->$siteDB;
	}
	
	
	public function settings()
	{
		$collection = static::db()->settings;
		// find everything in the collection
		//print $PASSWORD;
		
		$cursor = $collection->find();
		if ($cursor->count() > 0)
		{
			// iterate through the results
			while( $cursor->hasNext() ) {	
			foreach($cursor->getNext() as $key => $value)
				{
					$key = ucwords($key);
					define($key, $value);	
				}
			}
		}
		
		//print siteName;
		
	}
	
	public function fetchmenuitem($task){
		include("templates/main/header.tpl");
		//$collection = static::db()->menu;
		//$task = $collection->findOne(array("name"=>$task));
		//self::page_or_blog();
		if(empty($_SESSION['user'])){
			include("templates/main/login.tpl");
		}
		include("templates/main/footer.tpl");
	}
	
}
?>