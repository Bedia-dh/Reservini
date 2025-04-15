<?php
require_once "../Config/database.php"; 
echo "AuthController is working!<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Received POST request.<br>";
    //handle signup
    if (isset($_POST['signup'])) {
        $user_name = trim($_POST['user_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $role = isset($_POST['role']) ? trim($_POST['role']) : 'client'; // Default to client if not set

        //validate inputs
        if(empty($user_name) || empty($email) || empty($password)){
            echo("All fields are required!");
            exit();
        }
        //check si email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            header("Location:../View/signup.php?error=emailalreadyexists");
            exit();
        }
        //hash password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        //insert new user
        $stmt=$conn->prepare("INSERT INTO users (name,email,password,role) VALUES(?,?,?,?)"); 
        $stmt->bind_param("ssss", $user_name, $email, $hashedPassword,$role);
        if ($stmt->execute()) {
            header("Location: ../View/signup.php?signup=success");
            exit();
        }
        else{
            echo "Error: Could not register user." . $conn->error;
            exit();
        }
    }
    //handle login
    if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password =$_POST['password'];
        if (empty($email) || empty($password)) {
            echo "All fields are required!";
            exit();
        }
        $stmt = $conn->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            
            if(password_verify($password, $user['password'])){
               $_SESSION['user_id'] = $user['id'];
               $_SESSION['user_name'] = $user['name'];
               $_SESSION['user_email'] = $user['email'];
               $_SESSION['user_role'] = $user['role']; 
            } 
            //REDIRECTION SELON LE ROLE
            if($user['role'] == 'admin'){
                header("Location:../View/users_list.php");
                exit();
            }
            else{
                header("Location:../View/landingPage.php");
            }
            exit();
        }else{
            echo "Error: Invalid email or password ."; 
        }
    } else{
        echo "Error: Invalid email or password.";
    }    
}
?>
