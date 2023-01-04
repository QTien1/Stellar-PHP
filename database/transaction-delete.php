<?php
    require './database.php';
    $stellar_db -> query("delete from cart where username='{$_GET["username"]}' and game_id={$_GET["id"]}");
    header("Location: ../pages/transaction-page.php");
?>