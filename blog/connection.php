<?php
session_start();
class Model
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'blog';
    private $conn;
    private $tbname = 'user_reg';


    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            echo 'Connection Failed';
        } else {
           return $this->conn;
        }
    }

    public function insert_record(){
        global $conn;
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);
        $token = rand(11111,99999);

        //Email exists or not
        $check_email = "SELECT user_email FROM user_reg WHERE user_email='$email' LIMIT 1";
        $result = $this->conn->query($check_email);
        if($result->num_rows > 0)
        {
            
            header("Location:register.php?err=" . urlencode("Email is already in use. Please use another one"));
            return false;
        }
        
        else{   
        $sql = "INSERT INTO ".$this->tbname."(user_name, user_email, user_phone, user_password, otp) VALUES ('$name','$email','$phone','$password','$token')";
        $result = $this->conn->query($sql);
        if($result){
            $subject = "OTP Verification";
            $body = "Your verification OTP is".$token;
            $headers = "From: himanshu.kashyap@anviam.com"; 
            if(mail($email,$subject,$body,$headers)){
                echo "check your mail";
                // header('Location: email_verification.php');
            }
            else{
                echo "email failed";
            }
        }
        return $result;
        mysqli_close($conn);
        }
    }
      
    public function email_verify(){
        // $email = $_SESSION["email"];
        $otp = $_POST['otp'];
        $sql = "UPDATE user_reg set email_verified_at = NOW() where otp= '" . $otp . "' ";
        // $sql = "SELECT * FROM user_reg WHERE otp= '" . $otp . "'";
        $result = $this->conn->query($sql);
        // $row  = mysqli_affected_rows($result);
        if(mysqli_affected_rows($this->conn)==0){
           die ("Verification code failed.");
          
        }
        else{
        echo "<h4>You can login now</h4>";
        header('Location: login.php');
        }
        exit(); 
    }

    public function login_verify(){
        if ( !isset($_POST['email'], $_POST['password']) ) {
            // Could not get the data that should have been sent.
            exit('Please fill both the email and password fields!');
        }
      
        if ($stmt = $this->conn->prepare('SELECT id, user_password FROM user_reg WHERE user_email = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
        
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $password);
                $stmt->fetch();
                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.
                if ($_POST['password'] === $password) {
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    header('Location: index.php');
                } else {
                    // Incorrect password
                    echo 'Incorrect email or password!';
                }
            } else {
                // Incorrect email
                echo 'Incorrect email or password!';
            }
            $stmt->close();
        }
    }
   
}


    

?>



