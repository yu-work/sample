<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Person;

$person = new Person("山田太郎", 25);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Person View</title>
</head>
<body>
    <div>
        名前: <?php echo htmlspecialchars($person->getName()); ?><br>
        年齢: <?php echo htmlspecialchars((string)$person->getAge()); ?>
    </div>
</body>
</html>
