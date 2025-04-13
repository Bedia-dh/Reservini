<?php
// Load Configurations
require_once(__DIR__ . '/../Config/URLconf.php');

// Mock user data (in a real application, this would come from a database)
$user = [
    'name' => 'Bedia Dhawedi',
    'member_since' => 'MAY 2012',
    'email' => 'badiidh125@gmail.com',
    'phone' => '+216 55164511',
    'home_airport' => 'Cartahge Airport Tunisia',
    'street_address' => 'Grombalia//ibn khaldoun streen ',
    'city' => 'Grombalia ',
    'state' => 'Nabeul',
    'postal_code' => '8030',
    'country' => 'Tunisia',
    'stats' => [
        'miles' => '5000',
        'cities' => '30',
        'world' => '10',
        'countries' => '6'
    ]
];

// Mock booking history (in a real application, this would come from a database)
$bookings = [
    [
        'type' => 'Hotel',
        'name' => 'Grand Plaza Hotel',
        'date' => '2023-12-15',
        'status' => 'Completed',
        'price' => '$250'
    ],
    [
        'type' => 'Restaurant',
        'name' => 'Le Bistro',
        'date' => '2024-01-20',
        'status' => 'Completed',
        'price' => '$120'
    ],
    [
        'type' => 'Meeting Room',
        'name' => 'Executive Suite',
        'date' => '2024-03-10',
        'status' => 'Upcoming',
        'price' => '$300'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleProfile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>User Profile - Reservini</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL?>/SignUp/Scripts/script.js" defer></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>
            <a href="landingPage.php" class="home-link">Reservini</a>
        </h1>
        <ul>
            <li class='profile'><a href="profile.php">
                <img src="bedia.png" alt="profile">
            </a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- User Profile Card -->
            <div class="col-md-4">
                <div class="card profile-card mb-4">
                    <div class="card-body text-center">
                        <img src="bedia.png" alt="User Profile" class="rounded-circle profile-img mb-3">
                        <h3 class="card-title"><?= $user['name'] ?></h3>
                        <p class="text-muted">MEMBER SINCE <?= $user['member_since'] ?></p>
                        
                        <!-- User Stats -->
                        <div class="row stats-container mt-4">
                            <div class="col-3">
                                <div class="stat-circle">
                                    <i class="fas fa-plane"></i>
                                </div>
                                <h2><?= $user['stats']['miles'] ?></h2>
                                <p>MILES</p>
                            </div>
                            <div class="col-3">
                                <div class="stat-circle">
                                    <i class="fas fa-building"></i>
                                </div>
                                <h2><?= $user['stats']['cities'] ?></h2>
                                <p>CITIES</p>
                            </div>
                            <div class="col-3">
                                <div class="stat-circle">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <h2><?= $user['stats']['world'] ?></h2>
                                <p>WORLD</p>
                            </div>
                            <div class="col-3">
                                <div class="stat-circle">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <h2><?= $user['stats']['countries'] ?></h2>
                                <p>COUNTRIES</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <div class="card profile-menu mb-4">
                    <div class="list-group list-group-flush">
                        <a href="#personal-info" class="list-group-item list-group-item-action active">
                            <i class="fas fa-user me-2"></i> Personal Info
                        </a>
                        <a href="#booking-history" class="list-group-item list-group-item-action">
                            <i class="fas fa-history me-2"></i> Booking History
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-credit-card me-2"></i> Credit Cards
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-heart me-2"></i> Wishlist
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- User Information Section -->
            <div class="col-md-8">
                <!-- Personal Information -->
                <div id="personal-info" class="card mb-4">
                    <div class="card-header">
                        <h4>Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">NAME:</div>
                            <div class="col-md-8"><?= $user['name'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">E-MAIL:</div>
                            <div class="col-md-8"><?= $user['email'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">PHONE NUMBER:</div>
                            <div class="col-md-8"><?= $user['phone'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">HOME AIRPORT:</div>
                            <div class="col-md-8"><?= $user['home_airport'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">STREET ADDRESS:</div>
                            <div class="col-md-8"><?= $user['street_address'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">CITY:</div>
                            <div class="col-md-8"><?= $user['city'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">STATE/PROVINCE/REGION:</div>
                            <div class="col-md-8"><?= $user['state'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">POSTAL CODE:</div>
                            <div class="col-md-8"><?= $user['postal_code'] ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 field-label">COUNTRY:</div>
                            <div class="col-md-8"><?= $user['country'] ?></div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary">Edit Profile</button>
                        </div>
                    </div>
                </div>
                
                <!-- Booking History -->
                <div id="booking-history" class="card mb-4">
                    <div class="card-header">
                        <h4>Booking History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bookings as $booking): ?>
                                    <tr>
                                        <td><?= $booking['type'] ?></td>
                                        <td><?= $booking['name'] ?></td>
                                        <td><?= $booking['date'] ?></td>
                                        <td>
                                            <span class="badge <?= $booking['status'] === 'Completed' ? 'bg-success' : 'bg-primary' ?>">
                                                <?= $booking['status'] ?>
                                            </span>
                                        </td>
                                        <td><?= $booking['price'] ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>