<?php ## Data base settings

return [
	// Default DBMS. Can be "mysql", "pgsql", "sqlite"
	'dbms' => 'mysql',

	// Settings for MySQL DBMS
	'mysql' => [
		// Data base host
	    'host' => '127.0.0.1',

	    // Data base user name
	    'user' => 'root',

	    // User password
	    'password' => 'secret',

	    // Data base name
	    'name' => 'database',

	    // Data base charset
	    'charset' => 'utf8'
	],

	// Settings for PostgreSQL DBMS
	'pgsql' => [
		// Data base host
	    'host' => '127.0.0.1',

	    // Data base user name
	    'user' => 'root',

	    // User password
	    'password' => 'secret',

	    // Data base name
	    'name' => 'database',

	    // Data base charset
	    'charset' => 'utf8'
	],

	// Settings for SQLite DBMS
	'sqlite' => [
		// Path to sqlite file
		'path' => BASE_DIR . '/database/yourdb.sqlite'
	]
];
