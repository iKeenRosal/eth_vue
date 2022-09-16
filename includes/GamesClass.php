<?php

require_once ('DatabaseClass.php');

class GamesClass extends DatabaseClass
{
    private $_gameDbTableName = 'games';

    public function __construct()
    {
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data)
    {
        list($tableName, $conn) = $this->database_table_handler();

        $publisher = strtolower(mysqli_real_escape_string($conn, $data['publisher']));
        $name = strtolower(mysqli_real_escape_string($conn, $data['name']));
        $nickname = strtolower(mysqli_real_escape_string($conn, $data['nickname']));
        $rating = (int)mysqli_real_escape_string($conn, $data['rating']);

        if(!$this->valid_new($data))
        {
            return false; // return error, invalid game or "already exists"
        }

        $sql = "INSERT INTO $tableName (publisher, name, nickname, rating) VALUES ($publisher, $name, $nickname, $rating)";

        if($conn->query($sql))
        {
            return true;
        }

        return false;
    }

    /**
     * @param $data
     * @return array|false
     *
     * Read and capture ALL record within the Games Table, or simply capture if keyword is provided (from Search)
     */
    public function read($data)
    {
        list($tableName, $conn) = $this->database_table_handler();

        $sql = "SELECT * FROM $tableName";

        // From Search
        if(isset($data['keyword']) && !empty($data['keyword']))
        {
            $keyword = strtolower(mysqli_real_escape_string($conn, $data['keyword']));
            $sql .= " WHERE publisher LIKE '%$keyword%' OR name LIKE '%$keyword%' ";
        }

        // From Edit a single game
        if(isset($data['publisher']) && !empty($data['publisher']) &&
            isset($data['name']) && !empty($data['name']))
        {
            $publisher = strtolower(mysqli_real_escape_string($conn, $data['publisher']));
            $name = strtolower(mysqli_real_escape_string($conn, $data['name']));
            $sql .= " WHERE publisher LIKE '$publisher' OR name LIKE '$name' ";
        }

        if($result = mysqli_query($conn, $sql))
        {
            //return $result;

            //or simply return array here.
            $fetchedArray = array();
            $counter = 0;
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                //array_push($fetchedArray, $row);
                $fetchedArray[$counter] = $row;
                $counter++;
            }

            return $fetchedArray;
        }

        return false;
    }

    /**
     * @param $data
     * @return bool
     */
    public function update($data)
    {
        list($tableName, $conn) = $this->database_table_handler();

        $publisher = strtolower(mysqli_real_escape_string($conn, $data['publisher']));
        $name = strtolower(mysqli_real_escape_string($conn, $data['name']));
        $nickname = strtolower(mysqli_real_escape_string($conn, $data['nickname']));
        $rating = (int)mysqli_real_escape_string($conn, $data['rating']);

        $sql = "UPDATE $tableName SET publisher=$publisher, name=$name, nickname=$nickname, rating=$rating";

        if($conn->query($sql))
        {
            return true;
        }

        return false;
    }

    /**
     * @return void
     * TODO:
     *  future feature..
     */
    public function delete(){}

    /**
     * @param $data
     * @return bool
     */
    public function valid_new($data)
    {
        if(!isset($data['publisher']) || (isset($data['publisher']) && empty($data['publisher'])))
        {
            return false;
        }

        if(!isset($data['name']) || (isset($data['name']) && empty($data['name'])))
        {
            return false;
        }

        //check if publisher/name combination is unique
        $result = $this->read($data);

        if($result === false) // || empty($result))
        {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function database_table_handler()
    {
        $tableName = $this->get_gameDbTableName();
        $conn = $this->get_connection(); //inherited from DatabaseClass

        return array($tableName, $conn);
    }

    /**
     * @return string
     */
    private function get_gameDbTableName()
    {
        return $this->_gameDbTableName;
    }

}