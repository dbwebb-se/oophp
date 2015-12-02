<?php include(__DIR__ . "/src/config.php"); ?>
<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Dynamic navbar with php</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?=CNavigation::generateMenu($menu, "navbar");?>
</body>
</html>
