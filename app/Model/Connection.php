<?php
class Connection
{

    function openConnection()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "root";
        $db = "houseHelper";
        $conn = new mysqli($dbhost, $dbuser,
            $dbpass, $db) or die("Connect failed: %s\n" .
            $conn->error);
        return $conn;
    }

    function closeConnection($conn)
    {
        $conn->close();
    }
}




