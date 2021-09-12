<?php
declare(strict_types=1);

interface DatabaseInterface
{
    public function connect();

    public function query($query);

}

class Database implements DatabaseInterface {

    private string $host = 'localhost';

    private string $username ='root';

    private string $password = 'root';

    private string $dbName = 'gallery_db';

    private int $port = 8889 ;

    private mysqli $mysqli;

    public function connect() : bool
    {
        $mysqli = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->dbName,
            $this->port
        );

        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            die();
        }

        $this->mysqli = $mysqli;

        return true;
    }

    /**
     * @param $query
     * @return bool|mysqli_result
     */
    public function query($query)
    {
       if($this->connect()) {
            $result = $this->mysqli->query($query);

            $this->confirmQuery($result);

            return $result;
       }

       return false;
    }

    private function confirmQuery($result)
    {
        if (!$result) {
            die ('Query Failed'. $this->mysqli->error);
        }
    }

    public function escapeString(string $string): string
    {
       return  $this->mysqli->real_escape_string($string);
    }
}

$database  = new Database();
