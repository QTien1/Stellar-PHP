var game_list = [
    <?php
        require './database.php';
        $res = $stellar_db -> query("select * from game");
        if ($res):
            while ($row = $res -> fetch_assoc()):
    ?>
    {
        id: <?=$row["id"]?>,
        title: "<?=$row["title"]?>",
        base_price: <?=$row["base_price"]?>,
        curr_price: <?=$row["curr_price"]?>,
        description: "<?=$row["description"]?>",
        popular: <?=$row["popular"] ? "true" : "false"?>,
        sale: <?=$row["sale"] ? "true" : "false"?>,
    },
    <?php endwhile; endif; ?>
]