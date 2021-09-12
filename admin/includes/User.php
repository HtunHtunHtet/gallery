<?php


class User
{
    /**
     * @return bool|mysqli_result
     */
    public static function findAllUsers()
    {
        global $database;
        return $database->query("SELECT * FROM Users")->fetch_all(MYSQLI_ASSOC);
    }
}
