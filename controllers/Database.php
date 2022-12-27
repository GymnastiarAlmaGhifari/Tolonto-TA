<?php
class Database
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

        if (count($fields)) {


            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            foreach ($fields as $field) {
                $values .= '?';
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }

            //add value create_at and update_at current_timestamp()
            // $fields['create_at'] = date('Y-m-d H:i:s');
            // $fields['update_at'] = date('Y-m-d H:i:s');

            $sql = "INSERT INTO {$table} (`" . implode('`,`',  $keys) . "`) VALUES ({$values}) ";
            if ($stmt = $this->conn->prepare($sql)) {
                $x = 1;
                foreach ($fields as $param) {
                    $stmt->bindValue($x, $param);
                    $x++;
                }

                if ($stmt->execute()) {
                    return true;
                }
            }
        }

        // return false;

    }

    public function update($table, $id, $val, $fields = [])
    {
        $columns = '';
        $i = 1;
        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
        $sql = "UPDATE {$table} SET {$columns} WHERE $id = '$val'";
        if ($stmt = $this->conn->prepare($sql)) {
            foreach ($fields as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
                print_r($stmt);
            }
            $stmt->execute();
            return true;
        }
        return false;
    }


    public function fetch($table, $row = '', $value = '')
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

    public function fetchwhere($table, $row, $value)
    {
        if (!is_int($value)) {
            $value = "'" . $value . "'";

            $query = "SELECT * FROM $table WHERE $row = $value ;";
            $result = $this->conn->query($query);

            while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $row;
                $results[] = $row;
            }
            if (isset($results)) {
                return $results;
            } else {
                return false;
            }
        }
        // return $results;
    }

    public function fetchsemua($id, $table)
    {

        $query = "SELECT $id FROM $table;";
        $result = $this->conn->query($query);

        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {
            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function uniquery($thequery)
    {
        $query = "$thequery";
        $result = $this->conn->query($query);

        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {
            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function uniquerycount($thequery)
    {
        $query = "$thequery";
        $result = $this->conn->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {
            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function card_ps($lok = '')
    {
        $query = "SELECT ps.id_ps, ps.nama_ps, ps.status, jenis.nama_jenis, ps.img 
        FROM ps JOIN jenis on ps.jenis = jenis.id_jenis WHERE ps.lok = '$lok' ;";
        $result = $this->conn->query($query);

        while ($row = $result->fetchAll(PDO::FETCH_BOTH)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {
            return $results;
        } else {
            return false;
        }
    }

    public function is_aktif($idps = '')
    {
        $query = "SELECT rental.playtime, rental.bayar, user.username 
        FROM rental JOIN user ON rental.id_user = user.user_id WHERE id_ps = '$idps' ;";
        $result = $this->conn->query($query);

        while ($row = $result->fetchAll(PDO::FETCH_BOTH)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {
            return $results;
        } else {
            return false;
        }
    }

    public function count($id, $table, $row = '', $value = '')
    {
        if (!is_int($value)) {
            $value = "'" . $value . "'";

            if ($row != '') {
                $query = "SELECT COUNT($id) FROM $table WHERE $row = $value";
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

    public function countsemua($id, $table)
    {

        $query = "SELECT COUNT($id) FROM $table";
        $result = $this->conn->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        }
        if (isset($results)) {
            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function counttgl($id, $table, $row = '', $value)
    {
        $query = "SELECT COUNT($id) FROM $table WHERE $row LIKE '%$value%';";
        $result = $this->conn->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {

            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function select_countgroup($id, $table, $row, $value)
    {
        $query = "SELECT $id, COUNT($id) FROM $table RIGHT join jenis ON ps.jenis = jenis.id_jenis WHERE $row = $value GROUP BY $id;";
        $result = $this->conn->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {

            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function sum($id, $table, $row = '', $value)
    {
        $query = "SELECT SUM($id) FROM $table WHERE $row LIKE '%$value%';";
        $result = $this->conn->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            return $row;
            $results[] = $row;
        }
        if (isset($results)) {

            return $results;
        } else {
            return false;
        }
        // return $results;
    }

    public function delete($table, $column, $value)
    {
        $sql = "DELETE FROM $table WHERE $column = '$value'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete_and($table, $column, $value, $column2, $value2)
    {
        $sql = "DELETE FROM $table WHERE $column = '$value' AND $column2 >= '$value2'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete_all($table)
    {
        $sql = "DELETE FROM $table";
        $result = $this->conn->query($sql);
        return $result;
    }
    

    public function RandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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
