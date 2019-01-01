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
	    'password' => '123456',

	    // Data base name
	    'name' => 'mvc_blog',

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
	],

    // PDO options
    'pdo_options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
];
