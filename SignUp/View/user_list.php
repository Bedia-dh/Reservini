<?php
require_once(__DIR__ . '/../Config/database.php'); 

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteStmt=$conn->prepare("DELETE FROM users WHERE id = ?");
    $deleteStmt->bind_param("i", $id);
    $deleteStmt->execute();
    header("Location: http://localhost/reservini_pfa/SignUp/View/user_list.php");
    exit();
}
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
    <title>Data_list</title>
    <link rel="stylesheet" href="user_list.css">
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<section class="pb-5 header text-center">
    <div class="container py-5 text-white">
        <header class="py-5">
            <h1 class="display-4">Users Dashboard</h1>
            <p class="lead">Manage your registred users</p>
            <?php
            if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success" role="alert">
                    User deleted successfully!
                </div>
            <?php endif; ?>
            <?php
            if (isset($_GET['updated'])): ?>
                <div class="alert alert-success" role="alert">
                    User updated successfully!
                </div>
            <?php endif; ?>
        </header>
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
                                        <th scope="col">email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($users)>0): ?>
                                        <?php foreach ($users as $user): ?>
                                    <tr>
                                        <th scope="row"><?=$user['id']?></th>
                                        <td><?= htmlspecialchars($user['name'])?></td>
                                        <td><?= htmlspecialchars($user['email'])?></td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="edit_user.php?id=<?= $user['id'] ?>" 
                                                    class="btn btn-primary btn-sm rounded-0">Edit</a>
                                                </li>
                                                <li class="list-inline-item">
                                                <a href="user_list.php?delete=<?= $user['id'] ?>"
                                                class="btn btn-danger btn-sm rounded-0"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                                </li>
                                            </ul>
                                        <td>
                                    </tr>
                                <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="4" class="text-center">No users found.</td>
                                    </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 text-end">
                            <a href="landingPage.php" class="btn btn-secondary">Back to Home</a>
                            <a href="signup.php" class="btn btn-success">Add New User</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>