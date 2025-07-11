<?php
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
        header("Location: /403");
        exit;
    }
}

/****************
 * FOR DATA INSERT UPDATE AND DELETE CHECK THIS LIKE AS REFERENCE
 * https://www.vultr.com/docs/create-a-centralized-php-data-object-class-for-mysql/
 */
class DatabaseGateway{
    public  $error    = '';

    private function dbConnect()
    {
        try {

            $db_host = "";
            $db_user = "";
            $db_password = '';
            $db_name = "";
            //$port = '3306';

            /*
            $db_name     = 'focke_survey_join';
            $db_user     = 'root';
            $db_password = 'root';
            $db_host     = 'localhost';
            */

            $pdo = new PDO("mysql:host=" . $db_host  . ";dbname=" . $db_name, $db_user, $db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;

        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**************
     * @param $sql
     * @param string $data
     * @return array|string|void select statement return.
     */
    public function query($sql, $data = '')
    {
        try {

            $pdo  = $this->dbConnect();

            if ($this->error != '') {
                return $this->error;
            }

            $stmt = $pdo->prepare($sql);

            if (!empty($data)) {
                foreach ($data as $key => &$val) {
                    $stmt->bindParam($key, $val);
                }
            }

            $stmt->execute();
            $response = [];

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $response[] = $row;
            }

            $pdo = null;

            return $response;

        } catch(PDOException $e) {

            $this->error = $e->getMessage();
        }
    }

    /*************
     * @param $sql
     * @param $data
     * @return string|void return execute of a query
     */
    public function executeTransaction($sql, $data)
    {
        try {
            $pdo = $this->dbConnect();

            if ($this->error != '') {
                return $this->error;
            }

            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);
            } catch(PDOException $e) {
                $this->error = $e->getMessage();
            }
        } catch(PDOException $e) {
            $this->error =  $e->getMessage();
        }
    }

}