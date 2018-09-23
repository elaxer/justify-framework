<?php

namespace App\Models;

use Core\System\DB;

class Test extends DB
{
    public static function tableName(): string
    {
        return 'your_table_name';
    }
}
