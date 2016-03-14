<?php
class MyUserClass
{
    public function getUserList()
    {
        $host = "localhost";
        $user = "user";
        $pass = "password";
        $query = "select name from user order by name";

        $dbconn = new DatabaseConnection($host, $user, $pass);
        if(!$dbconn) {
            die('Could not connect: ' . mysql_error());
        }

        $results = $dbconn->query($query); 
        if(!$results) {
            die('Could not get data: ' . mysql_error());
        }

        return $results;
    }
}
