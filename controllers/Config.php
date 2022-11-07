<?php
class Config
{
    // Database Details
    private const DBHOST = '10.1.1.7';
    private const DBUSER = 'root';
    private const DBPASS = 'abogoboga';
    private const DBNAME = 'tolonto';
    // Data Source Network
    private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';
    // conn variable
    public $conn;

    // Constructor Function
    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // include_once './api/functions.php';
        } catch (PDOException $e) {
            die('Connectionn Failed : ' . $e->getMessage());
        }
        return $this->conn;
    }


    // Sanitize Inputs
    public function test_input($data)
    {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }

    // JSON Format Converter Function
    public function message($content, $status)
    {
        return json_encode(['message' => $content, 'error' => $status]);
    }

    public function insert($table, $fields = [])
    {
        $columns = implode(',', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        if ($stmt = $this->conn->prepare($sql)) {
            foreach ($fields as $key => $data) {
                $stmt->bindValue(':' . $key, $data);
            }
            $stmt->execute();
            return true;
        }
        return false;
    }


    public function user($table, $row = '', $value = '')
    {
        if (!is_int($value)) {
            $value = "'" . $value . "'";

            if ($row != '') {
                $query = "SELECT * FROM $table WHERE $row = $value";
                $result = $this->conn->query($query);

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    return $row;
                }
            } else {
                $query = "SELECT * FROM $table";
                $result = $this->conn->query($query);

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                }
            }
            if (isset($results)) {
                return $results;
            } else {
                return false;
            }
            // return $results;
        }
    }

    // public function insert()

    // public function update($table, $column, $email, $row, $kukis)
    // {
    //     $sql = "UPDATE $table SET $row = ':$kukis' WHERE $column = ':$email'";
    //     $result = $this->conn->query($sql);
    //     $result->execute(array($column => $email, $row => $kukis));
    //     return $result;
    // }

    // public function update($table, $column, $email, $row, $kukis)
    // {
    //     $sql = "UPDATE $table SET $row = '$kukis' WHERE $column = '$email'";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['email' => $email, 'kukis' => $kukis]);
    //     return $stmt;
    // }

    // update cookie
    // public function update($table, $column, $email, $row, $kukis)
    // {
    //     $sql = "UPDATE $table SET $row = '$kukis' WHERE $column = '$email'";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(
    //         [
    //             'email' => $email,
    //             'kukis' => $kukis
    //         ]
    //     );


    //     return $stmt;
    // }
}
