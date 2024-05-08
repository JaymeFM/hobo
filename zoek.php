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

    <h2>Search</h2>
<form method="post" action="search.php">
    <input type="text" name="query" placeholder="search on name">
    <input type="text" name="query" placeholder="search on genre">
    <input type="text" name="query" placeholder="search on release date">
    <input type="text" name="query" placeholder="search on rating">
    <button type="submit">Search</button>
</form>

</body>
</html>