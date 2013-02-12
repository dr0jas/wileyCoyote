<?php

class Registry
{
	protected static $values = array(
		'database' => null,
	);

	public static function getDatabase()
	{
		if (!isset(self::$values['database'])) {
			extract(self::getDatabaseConfigs());
			self::$values['database'] = new \Database($host, $username, $password, $databaseName);
		}
		
		return self::$values['database']; 
	}
	
	protected function getDatabaseConfigs()
	{
		if ($_SERVER['HTTP_HOST'] == 'localhost') {
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$databaseName = 'test';
		} else {
			$host = 'localhost';
			$username = 'webuser14';
			$password = 'webuser14';
			$databaseName = 'webuser14';
		}
		
		return compact('host', 'username', 'password', 'databaseName');
	}
}