<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\FirstClass;

$first = new FirstClass("Hello World!");
?>
<!DOCTYPE html>
<html>
<head>
    <title>First View</title>
</head>
<body>
    <div>
        <?php echo htmlspecialchars($first->getText()); ?>
    </div>
</body>
</html>
