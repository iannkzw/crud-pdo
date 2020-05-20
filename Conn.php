<?php

Class Conn
{
    public function connect()
    {
        $conn = new PDO ('mysql:host=localhost;dbname=curso_php', 'root', '');
        return $conn;
    }

}

