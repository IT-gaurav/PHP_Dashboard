<?php
class User
{
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $files = [];


    public function __construct($fname=null,$lname=null,$email=null,$pass=null)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function register($connection)
    {
        $fname= $this->fname;
        $lname = $this->lname; 
        $email = $this->email; 
        $pass = $this->pass; 

        $sql = "INSERT INTO users VALUES('$fname','$lname','$email','$pass')";

        $response = $connection->exec($sql);
        return $response; 
    }

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
