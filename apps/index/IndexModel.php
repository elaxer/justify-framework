<?php

namespace apps\index;

use framework\core\system\Model;
use Debug;
use PDO;
use QE;

class IndexModel extends Model
{
    public static function version()
    {
        Model::connect();

        Model::disconnect();
    }
}
