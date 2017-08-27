<?php

class IndexModel extends Model
{
	public static function getTableTest()
	{
		$db = Model::connect();
		$result = $db->query("SELECT * FROM `test`");
		while ($go = $result->fetch())
		{
			echo $go['email'] . "<br>";
		}
		$db = null;
	}
}
