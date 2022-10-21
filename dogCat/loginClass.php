<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        else
            $this->dologinWithPostData();
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "vetDataBase";

        // check login form contents
        if (empty($_POST['email'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['pName'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['email']) && !empty($_POST['pName'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {
                // escape the POST stuff
                $email = $this->db_connection->real_escape_string($_POST['email']);
                $bindEmail = $this->db_connection->real_escape_string($_POST['email']);
                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                ///create template
                $sql = "SELECT Email FROM users WHERE Email = ?;";
                $stmt = mysqli_stmt_init($this->db_connection);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed";
                }
                else {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    var_dump(mysqli_stmt_execute($stmt));
                    mysqli_stmt_bind_result($stmt, $bindedEmail);
                }
                
                while (mysqli_stmt_fetch($stmt)) {
                    printf ("%s\n", $bindedEmail);
                }

                if($email == $bindedEmail) {
                        $_SESSION['email'] = $bindedEmail;
                        $_SESSION['user_login_status'] = 1;
                }
            }
        }    
    }
/*
                if($result_of_login_check) {
                    // Put your ifelse with num_rows here
                    if ($result_of_login_check->num_rows > 0) {

                        // get result row (as an object)
                        $result_row = $result_of_login_check->fetch_object();
                        echo "hello";
    
                            // write user data into PHP SESSION (a file on your server)
                            $_SESSION['email'] = $result_row->user_email;
                            $_SESSION['user_login_status'] = 1;
                    } 
                    else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                }
                else {
                   $this->errors[] = $this->db_connection->error;
                }
                // if this user exists
            } 
            else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}