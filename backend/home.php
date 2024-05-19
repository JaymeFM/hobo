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
            <a href="zoek.php"><img src="images/imageedit_7_4079119959.png" id="zoek"></a>
            <a href="profiel.php"><img src="images/imageedit_4_9934679820.png" id="inlog"></a>
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

    <div class="container">
    <h1 id="title">Trending</h1>
      <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">
        <</button>
        <ul class="image-list">
          <a a href="videotemplate.php"><img class="image-item" src="posters/00001.jpg" alt="img-1" /></a>
          <img class="image-item" src="posters/00002.jpg" alt="img-2" />
          <img class="image-item" src="posters/00003.jpg" alt="img-3" />
          <img class="image-item" src="posters/00004.jpg" alt="img-4" />
          <img class="image-item" src="posters/00005.jpg" alt="img-5" />
          <img class="image-item" src="posters/00006.jpg" alt="img-6" />
          <img class="image-item" src="posters/00011.jpg" alt="img-7" />
          <img class="image-item" src="posters/00032.jpg" alt="img-8" />
          <img class="image-item" src="posters/00033.jpg" alt="img-9" />
          <img class="image-item" src="posters/00034.jpg" alt="img-10" />
          <img class="image-item" src="posters/00035.jpg" alt="img-11" />
          <img class="image-item" src="posters/00036.jpg" alt="img-12" />
          <img class="image-item" src="posters/00044.jpg" alt="img-13" />
          <img class="image-item" src="posters/00046.jpg" alt="img-14" />
          <img class="image-item" src="posters/00048.jpg" alt="img-15" />
          <img class="image-item" src="posters/00064.jpg" alt="img-16" />
          <img class="image-item" src="posters/00065.jpg" alt="img-17" />
          <img class="image-item" src="posters/00066.jpg" alt="img-18" />
          <img class="image-item" src="posters/00069.jpg" alt="img-19" />
          <img class="image-item" src="posters/00072.jpg" alt="img-20" />
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">
        ></button>
      </div>
      <div class="slider-scrollbar">
        <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div>
      </div>
    </div>

    <div class="container1">
  <h1 id="title">New</h1>
  <div class="slider-wrapper1">
    <button id="prev-slide1" class="slide-button1 material-symbols-rounded1">
      &lt;
    </button>
    <ul class="image-list1">
          <img class="image-item1" src="posters/00074.jpg" alt="img-1" />
          <img class="image-item1" src="posters/00076.jpg" alt="img-2" />
          <img class="image-item1" src="posters/00077.jpg" alt="img-3" />
          <img class="image-item1" src="posters/00127.jpg" alt="img-4" />
          <img class="image-item1" src="posters/00156.jpg" alt="img-5" />
          <img class="image-item1" src="posters/00161.jpg" alt="img-6" />
          <img class="image-item1" src="posters/00162.jpg" alt="img-7" />
          <img class="image-item1" src="posters/00210.jpg" alt="img-8" />
          <img class="image-item1" src="posters/00211.jpg" alt="img-9" />
          <img class="image-item1" src="posters/00212.jpg" alt="img-10" />
          <img class="image-item1" src="posters/00213.jpg" alt="img-11" />
          <img class="image-item1" src="posters/00214.jpg" alt="img-12" />
          <img class="image-item1" src="posters/00215.jpg" alt="img-13" />
          <img class="image-item1" src="posters/00216.jpg" alt="img-14" />
          <img class="image-item1" src="posters/00217.jpg" alt="img-15" />
          <img class="image-item1" src="posters/00218.jpg" alt="img-16" />
          <img class="image-item1" src="posters/00220.jpg" alt="img-17" />
          <img class="image-item1" src="posters/00222.jpg" alt="img-18" />
          <img class="image-item1" src="posters/00223.jpg" alt="img-19" />
          <img class="image-item1" src="posters/00224.jpg" alt="img-20" />
        </ul>
    <button id="next-slide1" class="slide-button1 material-symbols-rounded1">
      &gt;
    </button>
  </div>
  <div class="slider-scrollbar1">
    <div class="scrollbar-track1">
      <div class="scrollbar-thumb1"></div>
    </div>
  </div>
</div>


    <section class= genres>
        <div class=genre><img src="images/27495ee3-1738-465b-a44d-3a647284e9ea.jpg" alt=""></div>
        <div class=genre><img src="images/930f96ae-ee3c-4cce-84f8-81b8cd4a3b63.jpg" alt=""></div>
        <div class=genre><img src="images/4afa340f-20a1-4bd8-873f-949d8fc03321.jpg" alt=""></div>
        <div class=genre><img src="images/e454a029-9080-4241-892d-f21f46ca6893.jpg" alt=""></div>
    </section>

    

    <div class="container2">
  <h1 id="title2">Action</h1>
  <div class="slider-wrapper2">
    <button id="prev-slide2" class="slide-button2 material-symbols-rounded2">
      &lt;
    </button>
    <ul class="image-list2">
          <img class="image-item2" src="posters/00225.jpg" alt="img-1" />
          <img class="image-item2" src="posters/00228.jpg" alt="img-2" />
          <img class="image-item2" src="posters/00229.jpg" alt="img-3" />
          <img class="image-item2" src="posters/00232.jpg" alt="img-4" />
          <img class="image-item2" src="posters/00234.jpg" alt="img-5" />
          <img class="image-item2" src="posters/00236.jpg" alt="img-6" />
          <img class="image-item2" src="posters/00252.jpg" alt="img-7" />
          <img class="image-item2" src="posters/00253.jpg" alt="img-8" />
          <img class="image-item2" src="posters/00254.jpg" alt="img-9" />
          <img class="image-item2" src="posters/00256.jpg" alt="img-10" />
          <img class="image-item2" src="posters/00257.jpg" alt="img-11" />
          <img class="image-item2" src="posters/00260.jpg" alt="img-12" />
          <img class="image-item2" src="posters/00262.jpg" alt="img-13" />
          <img class="image-item2" src="posters/00265.jpg" alt="img-14" />
          <img class="image-item2" src="posters/00266.jpg" alt="img-15" />
          <img class="image-item2" src="posters/00269.jpg" alt="img-16" />
          <img class="image-item2" src="posters/00276.jpg" alt="img-17" />
          <img class="image-item2" src="posters/00278.jpg" alt="img-18" />
          <img class="image-item2" src="posters/00315.jpg" alt="img-19" />
          <img class="image-item2" src="posters/00322.jpg" alt="img-20" />
        </ul>
    <button id="next-slide2" class="slide-button2 material-symbols-rounded2">
      &gt;
    </button>
  </div>
  <div class="slider-scrollbar2">
    <div class="scrollbar-track2">
      <div class="scrollbar-thumb2"></div>
    </div>
  </div>
</div>

<div class="container3">
  <h1 id="title">Romance</h1>
  <div class="slider-wrapper3">
    <button id="prev-slide3" class="slide-button3 material-symbols-rounded3">
      &lt;
    </button>
    <ul class="image-list3">
          <img class="image-item3" src="posters/00324.jpg" alt="img-1" />
          <img class="image-item3" src="posters/00325.jpg" alt="img-2" />
          <img class="image-item3" src="posters/00328.jpg" alt="img-3" />
          <img class="image-item3" src="posters/00343.jpg" alt="img-4" />
          <img class="image-item3" src="posters/00356.jpg" alt="img-5" />
          <img class="image-item3" src="posters/00370.jpg" alt="img-6" />
          <img class="image-item3" src="posters/00377.jpg" alt="img-7" />
          <img class="image-item3" src="posters/00379.jpg" alt="img-8" />
          <img class="image-item3" src="posters/00380.jpg" alt="img-9" />
          <img class="image-item3" src="posters/00383.jpg" alt="img-10" />
          <img class="image-item3" src="posters/00385.jpg" alt="img-11" />
          <img class="image-item3" src="posters/00388.jpg" alt="img-12" />
          <img class="image-item3" src="posters/00389.jpg" alt="img-13" />
          <img class="image-item3" src="posters/00392.jpg" alt="img-14" />
          <img class="image-item3" src="posters/00396.jpg" alt="img-15" />
          <img class="image-item3" src="posters/00397.jpg" alt="img-16" />
          <img class="image-item3" src="posters/00401.jpg" alt="img-17" />
          <img class="image-item3" src="posters/00407.jpg" alt="img-18" />
          <img class="image-item3" src="posters/00430.jpg" alt="img-19" />
          <img class="image-item3" src="posters/00493.jpg" alt="img-20" />
        </ul>
    <button id="next-slide3" class="slide-button3 material-symbols-rounded3">
      &gt;
    </button>
  </div>
  <div class="slider-scrollbar3">
    <div class="scrollbar-track3">
      <div class="scrollbar-thumb3"></div>
    </div>
  </div>
</div>



<section class= genres>
        <div class=genre><img src="images\a5f5b6df-8c43-4d82-ac01-60d4e78ccc45.jpg" alt=""></div>
        <div class=genre><img src="images\d890518a-c76e-419b-9392-2b3602e2e159.jpg" alt=""></div>
        <div class=genre><img src="images/4afa340f-20a1-4bd8-873f-949d8fc03321.jpg" alt=""></div>
        <div class=genre><img src="images/e454a029-9080-4241-892d-f21f46ca6893.jpg" alt=""></div>
    </section>



    <div class="container4">
  <h1 id="title">Fantasy</h1>
  <div class="slider-wrapper4">
    <button id="prev-slide4" class="slide-button4 material-symbols-rounded4">
      &lt;
    </button>
    <ul class="image-list4">
      <img class="image-item4" src="posters/00495.jpg" alt="img-1" />
      <img class="image-item4" src="posters/00497.jpg" alt="img-2" />
      <img class="image-item4" src="posters/00499.jpg" alt="img-3" />
      <img class="image-item4" src="posters/00517.jpg" alt="img-4" />
      <img class="image-item4" src="posters/00518.jpg" alt="img-5" />
      <img class="image-item4" src="posters/00519.jpg" alt="img-6" />
      <img class="image-item4" src="posters/00520.jpg" alt="img-7" />
      <img class="image-item4" src="posters/00521.jpg" alt="img-8" />
      <img class="image-item4" src="posters/00522.jpg" alt="img-9" />
      <img class="image-item4" src="posters/00523.jpg" alt="img-10" />
      <img class="image-item4" src="posters/00529.jpg" alt="img-11" />
      <img class="image-item4" src="posters/00531.jpg" alt="img-12" />
      <img class="image-item4" src="posters/00539.jpg" alt="img-13" />
      <img class="image-item4" src="posters/00541.jpg" alt="img-14" />
      <img class="image-item4" src="posters/00542.jpg" alt="img-15" />
      <img class="image-item4" src="posters/00568.jpg" alt="img-16" />
      <img class="image-item4" src="posters/00581.jpg" alt="img-17" />
      <img class="image-item4" src="posters/00596.jpg" alt="img-18" />
      <img class="image-item4" src="posters/00602.jpg" alt="img-19" />
      <img class="image-item4" src="posters/00604.jpg" alt="img-20" />
    </ul>
    <button id="next-slide4" class="slide-button4 material-symbols-rounded4">
      &gt;
    </button>
  </div>
  <div class="slider-scrollbar4">
    <div class="scrollbar-track4">
      <div class="scrollbar-thumb4"></div>
    </div>
  </div>
</div>

<div class="container5">
  <h1 id="title">Sci-Fi</h1>
  <div class="slider-wrapper5">
    <button id="prev-slide5" class="slide-button5 material-symbols-rounded5">
      &lt;
    </button>
    <ul class="image-list5">
      <img class="image-item5" src="posters/00001.jpg" alt="img-1" />
      <img class="image-item5" src="posters/00002.jpg" alt="img-2" />
      <img class="image-item5" src="posters/00003.jpg" alt="img-3" />
      <img class="image-item5" src="posters/00004.jpg" alt="img-4" />
      <img class="image-item5" src="posters/00005.jpg" alt="img-5" />
      <img class="image-item5" src="posters/00006.jpg" alt="img-6" />
      <img class="image-item5" src="posters/00011.jpg" alt="img-7" />
      <img class="image-item5" src="posters/00032.jpg" alt="img-8" />
      <img class="image-item5" src="posters/00033.jpg" alt="img-9" />
      <img class="image-item5" src="posters/00034.jpg" alt="img-10" />
      <img class="image-item5" src="posters/00035.jpg" alt="img-11" />
      <img class="image-item5" src="posters/00036.jpg" alt="img-12" />
      <img class="image-item5" src="posters/00044.jpg" alt="img-13" />
      <img class="image-item5" src="posters/00046.jpg" alt="img-14" />
      <img class="image-item5" src="posters/00048.jpg" alt="img-15" />
      <img class="image-item5" src="posters/00064.jpg" alt="img-16" />
      <img class="image-item5" src="posters/00065.jpg" alt="img-17" />
      <img class="image-item5" src="posters/00066.jpg" alt="img-18" />
      <img class="image-item5" src="posters/00069.jpg" alt="img-19" />
      <img class="image-item5" src="posters/00072.jpg" alt="img-20" />
    </ul>
    <button id="next-slide5" class="slide-button5 material-symbols-rounded5">
      &gt;
    </button>
  </div>
  <div class="slider-scrollbar5">
    <div class="scrollbar-track5">
      <div class="scrollbar-thumb5"></div>
    </div>
  </div>
</div>



  <footer class="footer">
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