<?php
    require '../database/database.php';
?>

<script src="../libs/vue@3.2.37.js"></script>
<script src="../database/game-list.php"></script>
<script src="../libs/cookie.js"></script>
<script src="../libs/theme-switcher.js"></script>
<script src="./header-comp.php"></script>
<script src="./nav-comp.php"></script>

<div id="app">
    <div class="main">
        <headerComp></headerComp>
        <navComp></navComp>
        <div class="transaction">
            <div class="title">Your shopping cart</div>
            <div class="transaction-detail">
                <div class="detail">
                    <div class="detail-purchase" v-for="(item, index) in game_purchase" :key="item.id">
                        <img class="game-img" :src="`../assets/images/games/${item.id}.jpg`">
                        <div class="game-detail">
                            <div class="game-title">{{item.title}}</div>
                            <div class="game-price">{{item.curr_price == 0 ? "Free" : `$${item.curr_price}`}}</div>
                            <a class="game-remove" :href="`../database/transaction-delete.php?username=<?=$_COOKIE["username"]?>&id=${item.id}`">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="operation">
                    <div class="operation-total">Estimated total: ${{total}}</div>
                    <button class="operation-buy">Purchase</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url("../css/root.css");
    @import url("../css/header-comp.css");
    @import url("../css/nav-comp.css");
    .transaction {
        margin: 20px auto 0px auto;
        padding: 10px 20px 10px 20px;
        width: calc(900px - 40px);
        background-color: rgb(var(--bgDarkColor3));
        border-radius: 5px;
    }

    .title {
        font-size: 28px;
    }

    .transaction-detail {
        width: 100%;
        display: flex;
    }

    .detail {
        width: 66%;
        margin-right: 10px;
    }

    .detail-purchase {
        margin: 10px 0px 10px 0px;
        display: flex;
        width: 100%;
        height: 80px;
    }

    .game-img {
        height: 100%;
    }

    .game-detail {
        margin-left: 10px;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .game-title {
        font-size: 24px;
    }

    .game-remove {
        color: white;
        text-decoration: none;
        cursor: pointer;
    }

    .operation {
        width: 33%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .operation-buy {
        border: none;
        font-family: Dosis;
        margin-top: 10px;
        width: 65%;
        font-size: 20px;
        background-color: rgb(var(--bgColor));
        color: var(--textColor);
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<script>
    const { createApp } = Vue

    const app = createApp({
        data() {
            return {
                transaction_cart: [<?php
                    $res = $stellar_db -> query("select game_id from cart where username='{$_COOKIE["username"]}'");
                    if ($res) {
                        while ($row = $res -> fetch_assoc()) {
                            echo $row["game_id"] . ",";
                        }
                    }
                ?>],
            }
        },
        methods: {

        },
        computed: {
            game_purchase() {
                let games = []
                this.transaction_cart.forEach((game) => games.push(game_list.find((list) => list.id == game)))
                return games
            },
            total() {
                let  t = 0
                this.game_purchase.forEach((game) => {
                    t += game.curr_price
                })
                return t.toFixed(2)
            }
        },
        beforeMounted() {

        },
        mounted() {
            document.body.className = "transaction-page";
        },
        created() {

        },
        components: {
            headercomp: headerComp,
            navcomp: navComp,
        },
    }).mount('#app')
</script>