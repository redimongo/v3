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
	
	
	public function createuser($type){
	
		$data = $_POST;
		$salt = self::gen_salt();
		$collection = static::db()->salts;
		$collection->insert(array("salt"=>$salt));		
		$new_salt = $collection->findOne(array("salt"=>$salt));
		$password =  hash('sha512', $salt.$data['password'].$salt, FALSE);
		$collection = static::db()->members;
		$collection->insert(array(
			"signuptime"=>new MongoDate(),
			"password"=>$password,
			"salt"=>new MongoId($new_salt['_id']),
			"type"=>$type,
			"settings"=>array("email"=>array("confirmed"=>false),"notifications"=>array("comments"=>1,"members"=>1,"follows"=>1)),
			"mydetails" => array(
			"name" =>array("first"=>$data['firstname'],"last"=>$data['lastname']),"email"=>$data['email'])
			)
		);
	}
	
	function gen_salt()
	{
		$a = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*()_+=-", 20)), 0, 20);
		$b = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*()_+=-", 20)), 0, 20);
		$c = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*()_+=-", 20)), 0, 20);
		return $b.rand(1781,187156715671567156715761576157614652456246).$a.substr(md5(microtime()),rand(0,26),40).$c;
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