<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styling/style.css">
</head>
<body class="zoekbody">
    <header>
        <a href="home.php"><img src="images/HOBO_logo.png" id="logo"></a>
        <div class="nav">
            <a href="zoek.php"><img src="images/imageedit_7_4079119959.png" id="zoek"></a>
            <a href="profiel.php"><img src="images/imageedit_4_9934679820.png" id="inlog"></a>
        </div>
    </header>

    <h2>Search</h2>
<form method="post" action="search.php">
    <input type="text" name="query" placeholder="search on name">
    <button type="submit">Search</button>
</form>

<div class="trendingzoek">
        <h1 id="titlezoek">Trending</h1>
        <div class="posters-container">
            <div class="posterzoek">
                <img src="posters/00001.jpg" alt="Movie 1">
            </div>
            <div class="posterzoek">
                <img src="posters/00002.jpg" alt="Movie 2">
            </div>
            <div class="posterzoek">
                <img src="posters/00003.jpg" alt="Movie 3">
            </div>
            <div class="posterzoek">
                <img src="posters/00004.jpg" alt="Movie 4">
            </div>
            <div class="posterzoek">
                <img src="posters/00005.jpg" alt="Movie 5">
            </div>
            <div class="posterzoek">
                <img src="posters/00006.jpg" alt="Movie 6">
            </div>
            <div class="posterzoek">
                <img src="posters/00011.jpg" alt="Movie 6">
            </div>
            <div class="posterzoek">
                <img src="posters/00032.jpg" alt="Movie 6">
            </div>
            <div class="posterzoek">
                <img src="posters/00033.jpg" alt="Movie 6">
            </div>
        </div>
    </div>

</body>
</html>