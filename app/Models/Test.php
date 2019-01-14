<?php

namespace App\Models;

use Core\Components\Mvc\Model;

class Test extends Model
{
    public static function tableName(): string
    {
        return 'your_table_name';
    }
}
