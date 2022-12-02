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
        //     $columns = implode(',', array_keys($fields));

        //     $valuesArray = array_values($fields);
        //     $i = 0;
        //     foreach ($fields as $key => $values) {
        //         $fields[$key] = $values;
        //         if (is_int($values)) {
        //             $valuesArray[$key] =  (int) $values;
        //         } else {
        //             $valuesArray[$key] = "'" . $values . "'";
        //         }

        //         $i++;
        //     }
        //     $values = implode(',', $valuesArray);

        //     $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        //     $stmt = $this->conn->prepare($sql);
        //     if ($stmt->execute()) {
        //         return true;
        //     }
        //     return false;
        // }




        // if ($this->conn) {
        //     $columns = implode(',', array_keys($fields));
        //     $values = ':' . implode(', :', array_keys($fields));
        //     $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        //     if ($stmt = $this->conn->prepare($sql)) {
        //         foreach ($fields as $key => $data) {
        //             $stmt->bindValue(':' . $key, $data);
        //         }
        //         $stmt->execute();
        //         return $stmt;
        //     }
        // }

        // $columns = implode(',', array_keys($fields));

        // $values = ':' . implode(', :', array_keys($fields));
        // $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        // //hilangkan tanda petik satu pada kolom fields create_at
        // $sql = str_replace("'create_at'", "create_at", $sql);

        // if ($stmt = $this->conn->prepare($sql)) {
        //     foreach ($fields as $key => $data) {
        //         $stmt->bindValue(':' . $key, $data);
        //     }
        //     $stmt->execute();
        //     return $this->conn->lastInsertId();
        // }



        // get array index fields 7

        // if ($fields == ['create_at', 'update_at']) {
        //     $values = "'" . $fields['create_at'] . "'";

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

    public function update($table, $id, $fields = [])
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
        $sql = "UPDATE {$table} SET {$columns} WHERE id = {$id}";
        if ($stmt = $this->conn->prepare($sql)) {
            foreach ($fields as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
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

    public function counttgl($id, $table, $row = '', $value )
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

    public function select_countgroup($id, $table, $row, $value )
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

    public function sum($id, $table, $row = '', $value )
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
