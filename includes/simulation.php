<?php
session_start();

if ("POST" == $_SERVER["REQUEST_METHOD"]) {

    $dice_count = $_POST["number"];
    $dice_sides = $_POST["sides"];

    // check if variables are empty
    if (empty($dice_count) || empty($dice_sides)) {
        $_SESSION['error'] = 'emptyinputs';
        echo $dice_sides;
        header('Location: ./view.php');
        die();
    }

    // get max possible output
    $max_output = (int)substr($dice_sides, 1);
    $min_output = 1;
    $total = 0;
    $dice_rolls = [];
    for ($i = 0; $i < $dice_count; $i++) {
        $roll = rand($min_output, $max_output);
        $total += $roll;
        $dice_rolls['Die #'.($i+1)] = $roll;
        // array_push($dice_rolls, $roll);
    }
    $_SESSION['number_of_dice'] = $dice_count;
    $_SESSION['sides_of_dice'] = $dice_sides;
    $_SESSION['dice_rolls'] = $dice_rolls;
    $_SESSION['Total'] = $total;

    header("Location:./view.php");
}
else {
    header("Location:../index.html");
}