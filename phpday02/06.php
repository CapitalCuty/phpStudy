<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php混编</title>
</head>
<body>
    <?php $age=10; ?>
    <?php if($age>18): ?>
    <h1>成年人</h1>
    <?php else: ?>
    <h1>小朋友</h1>
    <?php endif ?>
</body>
</html>