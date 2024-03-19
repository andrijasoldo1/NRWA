<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Animals</title>
</head>
<body>
    <h1>List of Animals</h1>
    <ul>
        <?php if(!empty($animals)): ?>
            <?php foreach($animals as $animal): ?>
                <li><?= $animal->name ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No animals found</li>
        <?php endif; ?>
    </ul>
</body>
</html>
