<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH ?>/includes/Mvc/Views/templates/css/style.css">
</head>
<body>
<div><a href="<?php echo BASE_PATH; ?>">Home</a></div>
<div>
    <?php

    foreach ($data as $item) {
        echo "<h2><a href='{$item->url}'>{$item->title}</a></h2>";
        echo "<div><span>Posted ago: </span>{$item->postedAgo}<div>";
        echo "<div><span>Posted by: </span>{$item->postedBy}<div>";
        echo "<hr>";
    }
    ?>
</div>
</body>
</html>