<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Student Forum</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Posts List</a></li>
            <li><a href="addpost.php">Add a new post</a></li>
        </ul>
    </nav>

    <main>
        <?=$output?>
    </main>

    <footer>
        <p>&copy; 2026 Coursework COMP1841</p>
    </footer>
</body>
</html>