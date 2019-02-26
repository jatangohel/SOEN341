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


/*
    echo "Chosen Lecture Sections <br>";
    foreach ($fallSemester->getLecs() as $lec)
        echo $lec->dispInfo();

    echo "<br>";

    echo "Chosen Tutorial Sections <br>";
    foreach ($fallSemester->getTuts() as $tut)
        echo $tut->dispInfo();

    echo "<br>";

    echo "Chosen lab Sections <br>";
    foreach ($fallSemester->getLabs() as $lab)
        echo $lab->dispInfo();
        */

    ?>
  </div>
</body>
</html>
