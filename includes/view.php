<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Simulation</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time();?>">
</head>
<body>
    <h1>dice game</h1>
    <?php 
        if (isset($_SESSION["error"])) {
            unset($_SESSION['error']);
            ?>
    <form action="../includes/simulation.php" method="post">
        <?php
            echo "<p class='err'>Please Fill All the Fields!!!</p>" ;
        ?>
        <input type="number" name="number" id="dice-number" required>
        <select name="sides" id="dice-sides">
            <option value=""></option>
            <option value="d4">d4</option>
            <option value="d6">d6</option>
            <option value="d8">d8</option>
            <option value="d10">d10</option>
            <option value="d12">d12</option>
            <option value="d20">d20</option>
        </select>
        <button>roll</button>
    </form>
    <?php }else {
        $number_of_dice = $_SESSION['number_of_dice'];
        $sides_of_dice = $_SESSION['sides_of_dice'];
        $total = $_SESSION["Total"];
        $dice_rolls = $_SESSION["dice_rolls"];

        unset($_SESSION["number_of_dice"]);
        unset($_SESSION["sides_of_dice"]);
        unset($_SESSION["Total"]);
        unset($_SESSION['dice_rolls']);
        ?>
        <p>Dice Count: <?php echo $number_of_dice?></p>
        <p>Dice Type: <?php echo $sides_of_dice?></p>
        <p>Total: <?php echo $total?></p>
        <p>Details:<br> 
            <?php
                foreach($dice_rolls as $key => $value) {
                    echo $key. ':&nbsp;' .$value . '<br>';
                }
            ?>
        </p>
        <?php }?>
</body>
</html>