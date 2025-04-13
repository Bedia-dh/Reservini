<?php
require_once(__DIR__ . '/../Config/URLconf.php');
require_once(__DIR__ . '/../model/CategoriesData.php');

$categories = CategoriesData::getAllCategories();
$category = isset($_GET['category']) ? $_GET['category'] : 'restaurants';
?>

<!DOCTYPE html>
<html lang="en"> <!-- Set a default language -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleLanding.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Reservini</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="<?= BASE_URL?>/SignUp/Scripts/script.js" defer></script>
        <!-- Google Translate Script -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en', 
                    includedLanguages: 'en,fr', // Allows only English and French
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
<body>
    <div class="header">
        <h1>
            <a href="landingPage.php" class="home-link">Reservini</a>
        </h1>
        <ul>
            <!-- Google Translate Dropdown -->
            <li>
                <div id="google_translate_element"></div> <!-- This is where the translation widget appears -->
            </li>
    
            <!-- Profile and About Us Links -->
            <li class='profile'><a href="profile.php">
                <img src="profile.png" alt="profile">
            </a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </div>


    <!-- Next Destination Section -->
    <div class="next_dest">
        <H1>Hello, what will be your next spot?</H1>
        <H2>Secure your perfect spot with us.</H2>
    </div>

    
    <!-- Navigation Bar -->
    <div class="nav_bar">
        <ul>
            <li><a href="?category=restaurants" class="<?=($category ==='restaurants')?'active' : '' ?>">Restaurants</a></li>
            <li><a href="?category=hotels" class="<?=($category ==='hotels')?'active' : '' ?>">Hotels</a></li>
            <li><a href="?category=meeting-rooms" class="<?=($category ==='meeting-rooms')?'active' : '' ?>">Meeting Rooms</a></li>
            <li><button class="filter">Filter</button></li>
            <li>
                <img src="zoom.png" alt="Search" class="search-icon" >
                <input type="text" class="search-bar" 
                placeholder="Search..."
                style="display: none; ">
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="row g-4">
            <?php
                $initialItems = array_slice($categories[$category], 0, 3);
                foreach ($initialItems as $item)  {
                echo '
                <div class="col-md-4">
                    <div class="card h-100">
                    <div id="carouselExample' . preg_replace('/[^a-zA-Z0-9]/', '_', $item['name']) . '" class="carousel slide" data-bs-ride="carousel">
                            <i class="fa-solid fa-heart favorite-icon"></i>
                            <div class="carousel-inner">';
                            foreach ($item['images'] as $index => $image) {
                                $activeClass = ($index === 0) ? 'active' : '';
                                echo '
                                <div class="carousel-item '. $activeClass. '">
                                    <img src="' . $image . '" class="d-block w-100" alt="Slide '. ($index + 1) . '">
                                </div>';
                            }
                            echo '
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample' . preg_replace('/[^a-zA-Z0-9]/', '_', $item['name']) . '" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample' . preg_replace('/[^a-zA-Z0-9]/', '_', $item['name']) . '" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . $item['name'] . '</h5>
                            <p class="card-text">Location: ' . $item['location'] . '</p>
                            <p class="card-text">Price: ' . $item['price'] . '</p>
                            <a href="' . $item['link'] . '" class="btn-primary">Book Now</a>
                        </div>
                        </div>
                        </div>';
                    }
            ?>
        </div>
        <?php if (count($categories[$category]) > 3): ?>
        <div class="text-center mt-4 mb-5">
            <button id="showMoreBtn" class="btn btn-primary">Show More</button>
        </div>
        <?php endif; ?>
    </div>
    <!-- Best Deals Section -->
    <div class="best_deals">
        <h2>Best Deals for <?= ucfirst($category) ?></h2>
        <div id="bestDealsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $bestDeals = CategoriesData::getBestDeals($category);
                    $chunks = array_chunk($bestDeals, 4); // Split deals into chunks of 5
                    foreach ($chunks as $index => $chunk) {
                        $activeClass = ($index === 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $activeClass . '">';
                        echo '<div class="d-flex justify-content-center">';
                        foreach ($chunk as $deal) {
                            echo '
                            <div class="deal_card mx-2">
                            <i class="fa-solid fa-heart favorite-icon"></i>
                            <img src="' . $deal['image'] . '" alt="' . $deal['name'] . '" class="deal_image">
                            <div class="deal_info">
                            <h3>' . $deal['name'] . '</h3>
                            <p>' . $deal['location'] . '</p>
                            <p>Price: ' . $deal['price'] . '</p>
                            <a href="' . $deal['link'] . '" class="btn-primary">View Deal</a>
                            </div>
                            </div>';
                        }
                        echo '</div></div>';
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bestDealsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bestDealsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
            
    <!-- Get Inspiration Section -->
    <div class="inspiration-section">
        <div class="section-header d-flex justify-content-between align-items-center">
            <h2>Get inspiration for your next trip</h2>
            <a href="#" class="more-link">More</a>
        </div>
        <div class="inspiration-grid">
            <?php
            $inspirationItems = CategoriesData::getInspirationData();
            foreach ($inspirationItems as $item) {
                echo '
                <a href="' . $item['link'] . '" class="inspiration-card">
                    <div class="card-image">
                        <img src="' . $item['image'] . '" alt="' . $item['title'] . '">
                    </div>
                    <div class="card-content">
                        <h3>' . $item['title'] . '</h3>
                        <p>' . $item['description'] . '</p>
                    </div>
                </a>';
            }
            ?>
        </div>
    </div>
    