<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= html($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="/rs-website">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact">Kontakt</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="about">Über mich</a>
    </li>
</ul>
<br>
<?= $content ?>
</body>
</html>


