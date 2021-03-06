<?php
class User
{
    // properties of user class
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $files = [];

    // constructor
    public function __construct($fname = null, $lname = null, $email = null, $pass = null)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
    }

    // registering a user
    public function register($connection)
    {
        $fname = $this->fname;
        $lname = $this->lname;
        $email = $this->email;
        $pass = $this->pass;

        // sql query for inserting user's registeration information into database
        $sql = "INSERT INTO users VALUES('$fname','$lname','$email','$pass',null)";

        $response = $connection->exec($sql);
        return $response;
    }

    // searching user
    public function findUser($connection)
    {
        $sql = "SELECT first_name, last_name, password FROM users WHERE email =?";

        $prepare = $connection->prepare($sql);
        $prepare->execute([$this->email]);
        $tempUser = $prepare->fetch();

        if ($tempUser != null) {
            $this->fname = $tempUser['first_name'];
            $this->lname = $tempUser['last_name'];
            $this->pass = $tempUser['password'];
            return true;
        }
        return false;
    }

    // saving excel file
    public function save($connection)
    {
        include('../controller/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

        $inputFileName = realpath($_POST['file']);

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' .
                $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $arr = [];

        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, "", true, false, true);
            array_push($arr, $rowData[$row]);
        }
        $json = json_encode($arr);

        $sql = "UPDATE users SET excel_file =? WHERE email =?";
        $prepare = $connection->prepare($sql);
        $response = $prepare->execute([$json, $this->email]);
        return $response;
    }


    // getter setter of the properties

    /**
     * Get the value of lname
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set the value of lname
     *
     * @return  self
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get the value of fname
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set the value of fname
     *
     * @return  self
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Set the value of files
     *
     * @return  self
     */
    public function setFiles($files)
    {
        $this->files = $files;

        return $this;
    }
}
