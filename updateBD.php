<?php
require_once './Controller/connection.php';

$task1=0;
$task1 = $_POST["idTask1"];
$status1 = $_POST["idStatus1"];
$task2=0;
$task2 = $_POST["idTask2"];
$status2 = $_POST["idStatus2"];
$task3=0;
$task3 = $_POST["idTask3"];
$status3 = $_POST["idStatus3"];

if($task1)
{
    foreach($task1 as $t1)
    {
        $atualizar = "UPDATE tasks SET status=$status1 WHERE id=$t1";
        $atualizar2 = mysqli_query($conn, $atualizar);
        echo "<h1>task1 = $t1</h1><br>";
    }
    echo "<h1>status1 = $status1</h1><br>";
}

if($task2)
{
    foreach($task2 as $t2)
    {
        $atualizar = "UPDATE tasks SET status=$status2 WHERE id=$t2";
        $atualizar2 = mysqli_query($conn, $atualizar);
        echo "<h1>task2 = $t2</h1><br>";
    }
    echo "<h1>status2 = $status2</h1><br>";
}


if($task3)
{
    foreach($task3 as $t3)
    {
        $atualizar = "UPDATE tasks SET status=$status3 WHERE id=$t3";
        $atualizar2 = mysqli_query($conn, $atualizar);
        echo "<h1>task3 = $t3</h1><br>";
    }
    echo "<h1>status3 = $status3</h1><br>";

}

function Task($status1)
{
    //$task = addslashes($task);
    if($status1>0)
    {
        return 1;
    }
    else
    {
        return 'erro';
    }

    
}