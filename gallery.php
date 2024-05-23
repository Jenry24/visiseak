<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery</title>
<link rel="stylesheet" href="styles.css">
<style>
   body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to top, #000080, #ffffff); /* Navy blue to white gradient background */
        margin: 0;
        padding: 20px;
        box-sizing: border-box;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .slideshow-container {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: auto;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .slide {
        display: none;
    }

    .slide img {
        width: 100%;
        height: 100%; /* Automatically adjust height */
    }

    .gallery-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        grid-gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    .gallery-item {
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        border-radius: 8px;
        cursor: pointer;
    }
</style>
</head>
<body>

<!-- Navigation Bar -->
<h1>Gallery</h1>

<!-- Slideshow Container -->
<div id="slideshow-container" class="slideshow-container">
  <!-- Slides will be dynamically added here -->
</div>

<!-- Gallery Container -->
<div class="gallery-container">
    <!-- Gallery Items will be dynamically added here -->
</div>

<script>
// Access key from Unsplash
const accessKey = 'a3WX4yeKllB75FHiG7BExzPX5VzU8IxSj5hYGQVSBH8';

// Variables
const slideshowContainer = document.getElementById("slideshow-container");

async function fetchImages() {
  try {
    const response = await fetch(`https://api.unsplash.com/photos/random?client_id=${accessKey}&count=5`);
    const data = await response.json();
    data.forEach(image => {
      const slide = document.createElement("div");
      slide.className = "slide";
      const img = document.createElement("img");
      img.src = image.urls.regular;
      slide.appendChild(img);
      slideshowContainer.appendChild(slide);
    });
    showSlides();
  } catch (error) {
    console.error("Error fetching images:", error);
    alert("Failed to load images. Please try again later.");
  }
}

let slideIndex = 0;

function showSlides() {
  const slides = document.getElementsByClassName("slide");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 5000); // Change slide every 5 seconds
}

// Fetch images from Unsplash API and create slideshow on page load
window.addEventListener("load", () => {
  fetchImages();
});
</script>

</body>
</html>
