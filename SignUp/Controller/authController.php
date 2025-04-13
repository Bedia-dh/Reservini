<?php
require_once "../Config/database.php"; 
echo "AuthController is working!<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "Received POST request.<br>";
    if (isset($_POST['signup'])) {
        $user_name = trim($_POST['user_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(empty($user_name) || empty($email) || empty($password)){
            die("All fields are required!");
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt=$conn->prepare("INSERT INTO users (name,email,password) VALUES(?,?,?)"); 
        $stmt->bind_param("sss", $user_name, $email, $hashedPassword);
        if ($stmt->execute()) {
            header("Location: ../View/signup.php?signup=success");
            exit();
        }
        else{
            die("Error: Could not register user.");
        }
        // echo "Signup button was clicked!<br>";
        // echo "User Name: " . $_POST['user_name'] . "<br>";
        // echo "Email: " . $_POST['email'] . "<br>";
        // echo "Password: " . $_POST['password'] . "<br>";
    }
}
?>
