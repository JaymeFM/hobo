<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styling/style.css">
</head>
<body>
    <header>
        <a href="home.php"><img src="images/HOBO_logo.png" id="logo"></a>
        <div class="nav">
          <button class="loginbutton">Login</button>
        </div>
    </header>

    <div class="slider">
        <div class="slides">
            <img class="slide" src="images\971026bb-615c-47f6-879a-86a433adf5e5.jpg" alt="Image #1">
            <img class="slide" src="images\de61nd1-18cc918c-6ea3-420c-a853-23c6b1f3afcb.jpg" alt="Image #2">
            <img class="slide" src="images\d59919fd-f99c-4c5d-8848-83fd18349bee.jpg" alt="Image #3">
        </div>
        <button class="prev" onclick="prevSlide()">&#10094</button>
        <button class="next" onclick="nextSlide()">&#10095</button>
    </div>

    <script src="script.js"></script>


  <footer class="footer1">
  <div class="footer-container">
    <div class="footer-links">
      <a href="#">Help</a>
      <a href="#">Privacy</a>
      <a href="#">Info</a>
      <a href="#">FAQ</a>
    </div>
    <div class="copyright">
      <p>&copy; 2024 Hobo. All rights reserved.</p>
    </div>
  </div>
</footer>

</body>
</html>