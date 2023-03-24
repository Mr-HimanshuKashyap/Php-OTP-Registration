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
        $cpassword = trim($_POST['cpassword']);
        $token = rand(11111,99999);


        //Email exists or not
        $check_email = "SELECT user_email FROM user_reg WHERE user_email='$email' LIMIT 1";
        $result = $this->conn->query($check_email);
        if($result->num_rows > 0)
        {
           echo "<script>alert('Email already Exist')</script>";
           echo("<script>window.location = 'register.php';</script>");
        }
        elseif($password != $cpassword)
        {
            echo "<script>alert('Password incorrect')</script>";
            echo("<script>window.location = 'register.php';</script>");
        }

        
        else{   
        $sql = "INSERT INTO ".$this->tbname."(user_name, user_email, user_phone, user_password, confirm_pass, otp) VALUES ('$name','$email','$phone','$password','$cpassword','$token')";
        $result = $this->conn->query($sql);
        if($result){
            $subject = "OTP Verification";
            $body = "Your verification OTP is ".$token;
            $headers = "From: himanshu.kashyap@anviam.com"; 
            if(mail($email,$subject,$body,$headers)){
                $_SESSION['msg'] = "Check your mail for an OTP";
                header('Location: email_verification.php');
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
            echo "<script>alert('Verification code failed')</script>";
            echo("<script>window.location = 'email_verification.php';</script>");
          
        }
        else{
        echo "<h4>You can login now</h4>";
        header('Location: login.php');
        }
        exit(); 
    }

    public function login_verify(){
        if ( empty($_POST['email']) && ($_POST['password']) ) {

            // Could not get the data that should have been sent.
            echo 'Please fill both the email and password fields!';
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
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    header('Location: blog.php');
                } else {
                    // Incorrect password
                    echo "<script>alert('Incorrect username or password')</script>";
                    echo("<script>window.location = 'login.php';</script>");
                }
            } else {
                // Incorrect email
                echo "<script>alert('Incorrect username or password')</script>";
                echo("<script>window.location = 'login.php';</script>");
            }
            $stmt->close();
        }
    }

    public function blog_post(){
        global $conn;
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);  
        $sql = "INSERT INTO user_blog (title, content) VALUES ('$title','$content')";
        $result = $this->conn->query($sql);
        if($result){
            header('Location: index.php');
        }
    }

    public function fetch_products(){
        global $conn;
        $sql = "SELECT * FROM user_blog";
        $result = $this->conn->query($sql);
        return $result;
        
    }

    public function display_detail($id){
        global $conn;
        $sql = "SELECT * FROM user_blog where id=$id";
        $result = $this->conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            
        }
        return $row;
    }

    public function insert_comment(){
        $userid = $_SESSION['id'];
        $username = $_SESSION['name'];      
        $postid = $_POST['id'];      
        $comment = $_POST['comment'];
        if($comment != ""){
            $sql = "INSERT INTO user_comments(user_id, post_id, username, comment) VALUES ('$userid','$postid','$username','$comment')";
            $result = $this->conn->query($sql);
            if($result){
                header("Location:view.php?id=" .$postid);
            }
            
            
        }   
    }

    public function display_comment($id){ 
        $sql = "SELECT comment, username FROM user_comments WHERE  post_id ='$id'ORDER BY id desc ";
        $result = $this->conn->query($sql);
        if($result!=false && $result->num_rows>0){
            $arr = array();
            while($row = $result->fetch_assoc()){
                $arr[] = $row;
            }
            return $arr;
        }
        else{
            return 0;
        }
        
    }
   
}


    

?>



