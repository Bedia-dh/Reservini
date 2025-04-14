<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once(__DIR__ . '/../Config/database.php');

// Handle API requests for AJAX operations
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    header("Content-Type: application/json; charset=UTF-8");
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
            exit();
            
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
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
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
            exit();
            
        case 'PUT':
            if (!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["error" => "User ID is required"]);
                exit();
            }
            $id = $_GET['id'];
            $data = json_decode(file_get_contents('php://input'), true);
            $updatedFields = [];
            $types = ""; 
            $values = []; 
            
            if (isset($data['user_name'])) {
                $updatedFields[] = "name = ?";
                $types .= "s";
                $values[] = $data['user_name'];
            }
            if (isset($data['email'])) {
                $updatedFields[] = "email = ?";
                $types .= "s";
                $values[] = $data['email'];
            }
            if (empty($updatedFields)) {
                http_response_code(400);
                echo json_encode(["error" => "No fields to update"]);
                exit();
            }
            $query = "UPDATE users SET " . implode(", ", $updatedFields) . " WHERE id = ?"; 
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
            exit();
            
        case 'DELETE':
            if (!isset($_GET['id'])) {
                http_response_code(400);
                echo json_encode(["error" => "User ID is required"]);
                exit();
            }
            $id = $_GET['id'];
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
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
            exit();
            
        default:
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
            exit();
    }
}

// Handle direct delete from the UI
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteStmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $deleteStmt->bind_param("i", $id);
    $deleteStmt->execute();
    // Update the redirect URL to point to the new location
    header("Location: http://localhost/reservini_pfa/SignUp/View/users_list.php?deleted=1");
    exit();
}

// Get all users for display
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($query);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

$users = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Dashboard</title>
    <!-- Update the CSS path -->
    <link rel="stylesheet" href="user_list.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<section class="pb-5 header text-center">
    <div class="container py-5 text-white">
        <header class="py-5">
            <h1 class="display-4">Users Dashboard</h1>
            <p class="lead">Manage your registered users</p>
            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success" role="alert">
                    User deleted successfully!
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['updated'])): ?>
                <div class="alert alert-success" role="alert">
                    User updated successfully!
                </div>
            <?php endif; ?>
        </header>
        
        <!-- Add search bar -->
        <div class="row mb-4">
            <div class="col-lg-7 mx-auto">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search users...">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($users) > 0): ?>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <th scope="row"><?= $user['id'] ?></th>
                                                <td><?= htmlspecialchars($user['name']) ?></td>
                                                <td><?= htmlspecialchars($user['email']) ?></td>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <a href="edit_user.php?id=<?= $user['id'] ?>" 
                                                            class="btn btn-primary btn-sm rounded-0">Edit</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="users_list.php?delete=<?= $user['id'] ?>"
                                                            class="btn btn-danger btn-sm rounded-0"
                                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            
                                            <!-- Modal removed -->
                                            <div class="modal fade" id="editModal<?php echo $user['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="users_list.php" method="POST"> 
                                                        <input type="hidden" value="<?php echo $user['id']?>" name="id">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Username" value="<?php echo $user['name']; ?>">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>">
                                                            <label>Password</label>
                                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No users found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-end">
                            <!-- Update the landingPage.php path -->
                            <a href="landingPage.php" class="btn btn-secondary">Back to Home</a>
                            <!-- Update the signup.php path -->
                            <a href="signup.php" class="btn btn-success">Add New User</a>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');
    
    tableRows.forEach(row => {
        const username = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        
        if (username.includes(searchValue) || email.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
</body>
</html>