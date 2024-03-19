<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Details</title>
</head>
<body>
    <h1>Animal Details</h1>
    <?php if(isset($animal)): ?>
        <p>Name: <?= $animal->name ?></p>
        <?php if(isset($animal->species)): ?>
            <p>Species: <?= $animal->species->name ?></p>
        <?php else: ?>
            <p>Species: Not specified</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Animal not found</p>
    <?php endif; ?>
</body>
</html>
