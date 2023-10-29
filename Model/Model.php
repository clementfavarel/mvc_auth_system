<?php
require_once('Db.php');

class Model
{
    public function getConn()
    {
        return Db::getInstance()->getConnection();
    }
}
