<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $number = (int) $_POST["number"];
    echo "Number : $number<br>";

    $status = ($number % 2 == 0) ? "Type : even" : "Type : odd";

    echo $status;
}
?>

<form method="post">
    <label for="number">Enter a number :</label>
    <input type="number" name="number" id="number" required>
    <input type="submit" value="Odd / Even Checker">
</form>
