<?php

session_start();
date_default_timezone_set('Europe/Kiev');

/**
 * Read data from file
 * return empty array if file doesn't exist
 *
 * @param $filename
 * @return array|mixed
 */
function readData($filename)
{
    if (file_exists($filename)) {
        $contents = file_get_contents($filename);
        if ($contents) {
            $data = unserialize($contents);
        } else {
            $data = [];
        }
    } else {
        $data = [];
    }

    return $data;
}

function writeData($filename, $data)
{
    file_put_contents($filename, serialize($data));
}


function hasUser()
{
    return isset($_SESSION['user']);
}


function redirectToHome()
{
    header('Location: ' . getBaseUrl());
    exit;
}

function redirect($to)
{
    header('Location: ' . getBaseUrl() . $to);
    exit;
}


function shortText($text)
{
    if (strlen($text) < 30) {
        return $text;
    }

    return substr($text, 0, 30) . '...';
}

function getUsername()
{
    return $_SESSION['user']['username'];
}

function getBaseUrl()
{
    return '/lesson_18/mvc';
}


class Connection
{
    protected $link;

    public function __construct($user, $pass, $db, $host)
    {
        $this->link = mysqli_connect($host, $user, $pass, $db);

        if (!$this->link) {
            throw new Exception("Can't connect to db");
        }
    }

    public function lastId()
    {
        return mysqli_insert_id($this->link);
    }

    public function query($sql)
    {
        return mysqli_query($this->link, $sql);
    }
}

abstract class Record
{
    public $debug = false;
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function create($data)
    {
        $insertSql = $this->getInsertSql($data);

        if ($this->debug) {
            echo "<pre>$insertSql</pre>";
        } else {
            $this->connection->query($insertSql);
            return $this->connection->lastId();
        }
    }

    protected abstract function getInsertSql($data);

    public function read()
    {

    }

    public function readAll()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

class User extends Record
{
    // Необхідно створити таблицю в базі даних
    // перед реалізацією даного метода
    protected function getInsertSql($data)
    {
        throw new Exception('Please, implement it');
    }
}

class Post extends Record
{

    protected function getInsertSql($data)
    {
        return "INSERT INTO posts (title, text) "
            . "VALUES ('{$data['title']}', '{$data['text']}')";
    }
}