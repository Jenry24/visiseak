// Access key from Unsplash (replace with your actual key)
const accesskey = 'a3WX4yeKllB75FHiG7BExzPX5VzU8IxSj5hYGQVSBH8';

// Variables
const searchbar = document.getElementById("search_bar");
const searchtext = document.getElementById("search_text");
const imageresult = document.getElementById("image_result");
const loadmore = document.getElementById("load_more");

// Using API
let keyword = "";
let page = 1;

async function searchImages() {
    // Fetch images from Unsplash API based on user input
    keyword = searchtext.value;
    const url = `https://api.unsplash.com/search/photos?page=${page}&query=${keyword}&client_id=${accesskey}&per_page=15`;

    try {
        const response = await fetch(url);
        const data = await response.json();

        if (page === 1) {
            imageresult.innerHTML = "";
        }

        const results = data.results;

        results.forEach((result) => {
            const image = document.createElement("img");
            image.src = result.urls.small;
            image.style.cursor = "pointer";
            image.addEventListener("click", async () => {
                try {
                    const responseImg = await fetch(result.urls.full);
                    const file = await responseImg.blob();

                    // Create FormData object to send image data to PHP script
                    const formData = new FormData();
                    formData.append('image_url', result.urls.full);
                    
                    // Send HTTP POST request to gallery.php to store image in database
                    const responseDB = await fetch('gallery.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (responseDB.ok) {
                        // If image is successfully stored in the database, trigger download
                        const link = document.createElement("a");
                        link.href = URL.createObjectURL(file);
                        link.download = 'image_' + new Date().getTime(); // Add timestamp to filename
                        link.click();
                    } else {
                        // If there's an error storing the image in the database, display error message
                        alert("Failed to store image in the database.");
                    }
                } catch (error) {
                    console.error("Error:", error);
                    alert("Failed to download the image.");
                }
            });

            imageresult.appendChild(image);
        });
    } catch (error) {
        console.error("Error fetching images:", error);
        alert("Failed to load images. Please try again later.");
    }
}

loadmore.addEventListener("click", () => {
    // Load more images when the "Load More" button is clicked
    page++;
    searchImages();
});

searchbar.addEventListener("submit", (e) => {
    // Handle form submission when the user searches for images
    e.preventDefault();
    page = 1;
    searchImages();
});

window.addEventListener("load", () => {
    // Load random images when the page loads
    searchtext.value = "Random Images";
    searchImages();
});
let slideIndex = 0;
const slides = document.querySelectorAll('.slide');

// Function to display the next slide
function nextSlide() {
  showSlide(slideIndex += 1);
}

// Function to display the previous slide
function prevSlide() {
  showSlide(slideIndex -= 1);
}

// Function to display a specific slide
function currentSlide(n) {
  showSlide(slideIndex = n);
}

// Function to show a slide
function showSlide(n) {
  let i;
  if (n >= slides.length) {
    slideIndex = 0;
  }
  if (n < 0) {
    slideIndex = slides.length - 1;
  }
  // Hide all slides
  slides.forEach(slide => {
    slide.style.display = "none";
  });
  // Display the current slide
  slides[slideIndex].style.display = "block";
}

// Automatic slideshow
function autoSlide() {
  nextSlide();
  setTimeout(autoSlide, 5000); // Change slide every 5 seconds
}

document.addEventListener('DOMContentLoaded', function() {
  const toggleButton = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');

  toggleButton.addEventListener('click', function() {
      navMenu.classList.toggle('active');
  });
});
