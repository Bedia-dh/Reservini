<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once(__DIR__. '/../../Config/database.php');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Get user by ID
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                echo json_encode($user);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "User not found"]);
            }
        } else {
            // Get all users
            $query = "SELECT * FROM users ORDER BY id DESC";
            $result = $conn->query($query);
            
            if ($result === false) {
                http_response_code(500);
                echo json_encode(['error' => 'Database error' . $conn->error]);
                exit();
            }
            $users = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($users);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['user_name']) || !isset($data['email']) || !isset($data['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
            exit();
        }
        $user_name = trim($data['user_name']);
        $email = trim($data['email']);
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt =$conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user_name, $email, $password);
        if ($stmt->execute()) {
            http_response_code(201);
            echo json_encode([
                "message" => "User created successfully",
                "id" => $conn->insert_id
            ]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to create user: " . $conn->error]);
        }
        break;
    case 'PUT':
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(["error" => "User ID is required"]);
            exit();
        }
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $updatedFields = [];
        $types=""; 
        $values=[]; 
        
        if (isset($data['user_name'])) {
            $updatedFields[] = "user_name = ?";
            $types .= "s";
            $values[] = $data['user_name'];
        }
        if (isset($data['email'])) {
            $updatedFields[] = "email =?";
            $types.= "s";
            $values[] = $data['email'];
        }
        if (empty($updatedFields)) {
            http_response_code(400);
            echo json_encode(["error" => "No fields to update"]);
            exit();
        }
        $query="UPDATE users SET ".implode(", ", $updatedFields)."
        WHERE id =?"; 
        $types .= "i";
        $values[] = $id;
        
        // Prepare and execute the statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param($types, ...$values);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(["message" => "User updated successfully"]);
            } else {
                echo json_encode(["message" => "No changes made or user not found"]);
            }
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to update user: " . $conn->error]);
        }
        break;
        case 'DELETE':
            if (!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["error" => "User ID is required"]);
                exit();
            }
            $id = $_GET['id'];
            $stmt = $conn->prepare("DELETE FROM users WHERE id =?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo json_encode(["message" => "User deleted successfully"]);
                } else {
                    echo json_encode(["message" => "User not found"]);
                }
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Failed to delete user: " . $conn->error]);
            }
            break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
        break;
}
$conn->close();
?>