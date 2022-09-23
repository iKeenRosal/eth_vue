<?php

class DatabaseClass
{
    private $_connection;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @return void
     */
    public function connectDb()
    {
        $conn = new mysqli($this->get_hostname(),$this->get_username(),$this->get_password(),$this->get_databaseName());

        // Check connection
        if ($conn->connect_errno)
        {
            die("Failed to connect to MySQL: " . $conn -> connect_error);
        }

        $this->set_connection($conn);
    }

    /**
     * @return mixed
     */
    public function get_connection()
    {
        return $this->_connection;
    }

    /**
     * @param $connection
     * @return void
     */
    private function set_connection($connection)
    {
        $this->_connection = $connection;
    }

    /**
     * @return string
     */
    private function get_hostname()
    {
        return 'sql3.freemysqlhosting.net'; // $_SERVER['env_mysql_hosting']
    }

    /**
     * @return string
     */
    private function get_username()
    {
        return 'sql3520292';
    }

    /**
     * @return string
     */
    private function get_password()
    {
        return 'vJpYSp1AW9';
    }

    /**
     * @return string
     */
    private function get_databaseName()
    {
        return 'sql3520292';
    }

    /**
     * @return string
     */
    private function get_port()
    {
        return '3306';
    }
}
