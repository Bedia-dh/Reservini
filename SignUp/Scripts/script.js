// Get all navigation links
console.log("Script is running!");
//select el links lkol (<a>) west class nav_bar -> ul->li
const navLinks = document.querySelectorAll(".nav_bar ul li a");

//attribute event listeners l links elly f list navLinks bch tdecti l clikc
navLinks.forEach((link) => {
  link.addEventListener("click", function () {
    // na7iw l class active ll links lkkol w nkhaliwha l link wehed
    navLinks.forEach((item) => item.classList.remove("active"));
    // Add 'active' class to the clicked link
    this.classList.add("active");
  });
});
//show more button/ search icon
document.addEventListener("DOMContentLoaded", function () {
  const showMoreBtn = document.getElementById("showMoreBtn");
  const itemsContainer = document.querySelector(".container .row");
  const itemsPerPage = 3;
  let currentlyShown = itemsPerPage;
  let isExpanded = false;

  const searchIcon = document.querySelector(".search-icon");
  const searchBar = document.querySelector(".search-bar");

  if (searchIcon && searchBar) {
    // Get all navigation items except the search item
    const navItems = document.querySelectorAll(
      ".nav_bar ul li:not(:last-child)"
    );

    searchIcon.addEventListener("click", function () {
      if (searchBar.style.display === "none" || !searchBar.style.display) {
        // Show and expand the search bar
        searchBar.style.display = "inline-block";
        setTimeout(() => {
          // Hide navigation items
          navItems.forEach((item) => {
            item.classList.add("hidden");
          });

          // Expand search bar to fill the navigation bar
          searchBar.classList.add("expanded");
          searchBar.focus();
        }, 10); // Small delay to ensure transition works
        searchIcon.classList.add("active");
      } else {
        // Collapse and hide the search bar
        searchBar.classList.remove("expanded");
        searchBar.blur();
        searchIcon.classList.remove("active");

        // Show navigation items again
        navItems.forEach((item) => {
          item.classList.remove("hidden");
        });

        // Hide completely after transition completes
        setTimeout(() => {
          searchBar.style.display = "none";
        }, 300); // Match transition duration
      }
    });

    // Hide search bar when clicking outside
    document.addEventListener("click", function (event) {
      if (
        !searchIcon.contains(event.target) &&
        !searchBar.contains(event.target) &&
        searchBar.style.display !== "none"
      ) {
        // Remove expanded class
        searchBar.classList.remove("expanded");
        searchIcon.classList.remove("active");

        // Show navigation items again
        navItems.forEach((item) => {
          item.classList.remove("hidden");
        });

        setTimeout(() => {
          searchBar.style.display = "none";
        }, 300);
      }
    });
  }

  if (showMoreBtn) {
    showMoreBtn.addEventListener("click", function () {
      console.log("Show More button clicked");
      const category =
        new URLSearchParams(window.location.search).get("category") ||
        "restaurants";
      const fetchUrl = `../Controller/api/get_more_items.php?category=${category}&offset=${currentlyShown}&limit=${itemsPerPage}`;
      console.log("Fetching more items from:", fetchUrl);

      if (!isExpanded) {
        fetch(fetchUrl)
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok");
            }
            return response.json();
          })
          .then((nextItems) => {
            nextItems.forEach((item) => {
              const newCard = createCardHTML(item);
              itemsContainer.insertAdjacentHTML("beforeend", newCard);
            });

            // Reinitialize carousels and favorite icons for dynamically added content
            initializeCarousels();
            initializeFavoriteIcons();

            currentlyShown += nextItems.length;
            if (nextItems.length < itemsPerPage) {
              showMoreBtn.style.display = "none";
            } else {
              showMoreBtn.textContent = "Show Less";
              isExpanded = true;
            }
          })
          .catch((error) => {
            console.error("Error fetching more items:", error);
          });
      } else {
        // Hide additional items
        const cards = itemsContainer.querySelectorAll(".col-md-4");
        cards.forEach((card, index) => {
          if (index >= itemsPerPage) {
            card.remove();
          }
        });
        currentlyShown = itemsPerPage;
        showMoreBtn.textContent = "Show More";
        isExpanded = false;
      }
    });
  }

  // Initialize carousels
  function initializeCarousels() {
    document.querySelectorAll(".carousel").forEach((carousel) => {
      new bootstrap.Carousel(carousel, {
        interval: false,
        ride: false, // Disable automatic sliding
      });
    });
  }

  // Initialize favorite icons
  function initializeFavoriteIcons() {
    document.querySelectorAll(".favorite-icon").forEach((icon) => {
      icon.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        this.classList.toggle("active");
      });
    });
  }

  // Initial initialization
  initializeCarousels();
  initializeFavoriteIcons();
});

// Helper function to create card HTML
function createCardHTML(item) {
  // Replace spaces and other invalid characters with underscores in the item name for the carousel ID
  const sanitizedItemName = item.name.replace(/[^a-zA-Z0-9]/g, "_");

  return `
        <div class="col-md-4">
            <div class="card h-100">
                <div id="carouselExample${sanitizedItemName}" class="carousel slide">
                    <i class="fa-solid fa-heart favorite-icon"></i>
                    <div class="carousel-inner">
                        ${item.images
                          .map(
                            (image, index) => `
                            <div class="carousel-item ${
                              index === 0 ? "active" : ""
                            }">
                                <img src="${image}" class="d-block w-100" alt="Slide ${
                              index + 1
                            }">
                            </div>
                        `
                          )
                          .join("")}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample${sanitizedItemName}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample${sanitizedItemName}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">${item.name}</h5>
                    <p class="card-text">Location: ${item.location}</p>
                    <p class="card-text">Price: ${item.price}</p>
                    <a href="${item.link}" class="btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    `;
}
