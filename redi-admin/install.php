<?php
/**
 * 
 */
class install extends syscore {
	
	function createCollection() {
		$templates = static::db()->createCollection("templates");	
		print_r($templates);
		$plugins = static::db()->createCollection("plugins");	
		$salts = static::db()->createCollection("salts");
		$members = static::db()->createCollection("members");
		$media = static::db()->createCollection("media");
		$posts = static::db()->createCollection("posts");
		$menu = static::db()->createCollection("menu");
		$settings = static::db()->createCollection("settings");
	}
	
	
}


include("templates/main/header.tpl");
include("templates/main/install.tpl");
include("templates/main/footer.tpl");
?>