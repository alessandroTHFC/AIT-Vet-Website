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
        echo "$_SESSION[user_login_status]";

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
        } elseif (empty($_POST['pWord'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['email']) && !empty($_POST['pWord'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {
                // escape the POST stuff
                $email = $this->db_connection->real_escape_string($_POST['email']);
                $password = $this->db_connection->real_escape_string($_POST['pWord']);
                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                ///create template
                $sql = "SELECT * FROM users WHERE Email = ?;";
                $stmt = mysqli_stmt_init($this->db_connection);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed";
                }
                else {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    var_dump(mysqli_stmt_execute($stmt));
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    var_dump($row);
                    
                }
                if(!password_verify($password, $row["Password"])) {
                    echo "Password does not match";
                    var_dump($password);
                    var_dump($row["Password"]);
                } else {
                    $_SESSION['user_login_status'] = 1;

                    // TODO:*ADD other session variables that might be needed.

                    echo "success";
                }
            }
        }    
    }

    //TODO: include logout function into a button
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
        if ($_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}