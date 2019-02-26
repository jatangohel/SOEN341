<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SOEN341-Scehdule Generator</title>
</head>
<body>
  <div>
    <?php

    require_once 'UserSchedule.php';

    $userSched = new UserSchedule("F",2019, 4);

    $userSched->genProgramSched('Osama');

    $userSched->dispUserSchedule();
/*

        */

    ?>
  </div>
</body>
</html>
