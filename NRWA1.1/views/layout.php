<!DOCTYPE html>
<html>
<head>
    <title>Moja Web Aplikacija</title>
</head>
<body>
    <header>
        <a href='./'>Početna</a>
        <a href='?controller=animals&action=index'>Životinje</a>
        <a href='?controller=species&action=index'>Vrste</a>
        <a href='?controller=zoo&action=index'>Zoološki vrtovi</a>
    </header>

    <main>
        <?php require_once('routes.php'); ?>
    </main>

    <footer>
        &copy; 2024 Moja Web Aplikacija
    </footer>
</body>
</html>
