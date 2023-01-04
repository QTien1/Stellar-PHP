<?php
    require '../database/database.php';
    if(isset($_POST["buy"])) {
        $stellar_db -> query("insert into cart (username, game_id) values ('{$_COOKIE["username"]}', '{$_GET["id"]}')");
    }
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
        <div class="game">
            <div class="game-top">
                <div class="top-dir">
                    <a href="./search-page.php">All Games</a> > <a>{{game_title}}</a>
                </div>
                <div class="top-game-title">
                    <div class="name_game">{{game_title}}</div>
                </div>
            </div>
            <div class="game-center">
                <div class="center-carousel">
                    <div class="carousel-slide">
                        <img :src="`../assets/images/games/<?=$_GET["id"]?>_${item.id}.jpg`" class="carousel-slide-item " :class="{'slide-show': item.clicked }" v-for="item in game_carousel" :key="item.id">
                    </div>
                    <div class="carousel-thumbs">
                        <div v-for="item in game_carousel" :key="item.id" class="carousel-thumb-box " :class="{'thumb-show': item.clicked }" @click="carouselThumbClick(item.id)">
                            <img :src="`../assets/images/games/<?=$_GET["id"]?>_${item.id}.jpg`" class="carousel-thumb-img">
                        </div>
                    </div>
                </div>
                <div class="center-right">
                    <img :src="`../assets/images/games/<?=$_GET["id"]?>.jpg`" class="center-right-img">
                    <div class="center-right-desc">{{game_desc}}</div>
                </div>
            </div>
            <div class="game-bottom">
                <div class="bottom-buy">
                    <div class="buy-title">Buy {{game_title}}</div>
                    <form class="buy-box" method="POST">
                        <div class="buy-box-sale" v-if="game_curr_price !== game_base_price">-{{(100 - (game_curr_price / game_base_price * 100)).toFixed(0)}}%</div>
                        <div class="buy-box-price">
                            <div class="price-base" v-if="game_curr_price !== game_base_price">${{game_base_price}}</div>
                            <div class="price-curr">{{game_curr_price == 0 ? "Free" : `$${game_curr_price}`}}</div>
                        </div>
                        <button class="buy-box-btn" type="submit" name="buy">{{game_curr_price == 0 ? "Click to get" : "Add to cart"}}</button>
                    </form>
                </div>
                <div class="bottom-right">
                    <button class="right-fav">Set as favorite</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url("../css/root.css");
    @import url("../css/header-comp.css");
    @import url("../css/nav-comp.css");
    .game {
        width: 900px;
        margin: auto;
    }
    .game-top {
        padding: 10px 0px 10px 0px;
        width: 100%;
    }

    .top-dir {
        font-size: 16px;
    }

    .top-dir a {
        color: var(--textColor);
        text-decoration: none;
    }

    .top-game-title {
        font-size: 28px;
    }

    .game-center {
        padding: 10px;
        width: calc(100% - 20px);
        height: 430px;
        background-color: rgb(var(--bgDarkColor2));
        display: flex;
        border-radius: 5px;
    }

    /* FREAKING CAROUSEL */

    .center-carousel {
        width: 65%;
        height: 100%;
    }

    .carousel-slide {
        width: 100%;
        height: 73%;
        position: relative;
    }

    .carousel-slide-item {
        height: 100%;
        position: absolute;
        visibility: hidden;
    }

    .slide-show {
        visibility: visible;
    }

    .carousel-thumbs {
        padding-bottom: 10px;
        margin-top: 10px;
        width: 100%;
        height: calc(25% - 20px);
        display: flex;
        overflow-x: scroll;
        overflow-y: hidden;
    }

    .carousel-thumbs::-webkit-scrollbar {
        width: 10px;
        background-color: rgb(var(--bgDarkColor4));
        border-radius: 5px;
    }

    .carousel-thumbs::-webkit-scrollbar-thumb {
        width: 8px;
        background-color: rgb(var(--bgColor));
        border-radius: 5px;
    }

    .carousel-thumb-box {
        height: 100%;
        margin: 3px 7px 3px 7px;
    }

    .carousel-thumb-img {
        height: 100%;
    }

    .thumb-show {
        margin: 0px 4px 0px 4px;
        border: 3px white solid;
    }

    .center-right {
        margin-left: 10px;
        width: 35%;
        height: 100%;
    }

    .center-right-desc {
        font-size: 16px;
        padding: 5px 0px 5px 0px;
    }

    .center-right img {
        width: 100%;
    }

    .game-bottom {
        margin-top: 10px;
        padding: 10px 0px 10px 0px;
        width: 100%;
        border-radius: 5px;
        display: flex;
    }

    .bottom-buy {
        padding: 20px 20px 20px 20px;
        width: calc(65% - 50px);
        height: calc(100px - 40px);
        background-color: rgb(var(--bgDarkColor2));
        position: relative;
        border-radius: 5px;
    }

    .buy-title {
        font-size: 24px;
    }

    .buy-box {
        margin: 0;
        padding: 3px;
        height: calc(45px - 3px);
        background-color: rgb(15, 15, 15);
        display: flex;
        max-width: 70%;
        position: absolute;
        right: 20px;
        bottom: -20px;
        border-radius: 5px;
    }

    .buy-box-btn {
        cursor: pointer;
    }

    .buy-box-sale {
        width: 60px;
        background-color: rgb(var(--bgDarkGreen1));
        color: rgb(var(--bgLightGreen3));
        text-shadow: 1px 1px 2px black;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        font-size: 20px;
    }

    .buy-box-price {
        margin: 0px 10px 0px 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .price-base {
        font-size: 12px;
        color: grey;
        display: flex;
        justify-content: end;
    }

    .price-curr {
        color: white;
        font-size: 20px;
        display: flex;
        justify-content: end;
    }

    .buy-box-btn {
        background: linear-gradient(90deg, rgb(var(--bgLightGreen1)), rgb(var(--bgDarkGreen1)));
        border: 0;
        border-radius: 5px;
        color: rgb(var(--bgLightGreen4));
        text-shadow: 1px 1px 2px black;
        font-family: Dosis;
        font-size: 20px;
        padding: 0px 20px 0px 20px;
    }

    .bottom-right {
        margin-left: 10px;
        padding: 20px;
        width: calc(35% - 40px);
        background-color: rgb(var(--bgDarkColor2));
        border-radius: 5px;
    }

    .right-fav {
        border: 0;
        background: linear-gradient(90deg, rgb(var(--bgLightColor1)), rgb(var(--bgDarkColor1)));
        border-radius: 5px;
        width: 100%;
        font-size: 24px;
        font-family: Dosis;
        color: var(--textColor);
        text-shadow: 1px 1px 2px black;
    }
</style>

<script>
    const { createApp } = Vue

    const app = createApp({
        data() {
            return {
                carousel_counter: 1,
                game_carousel: [
                    {
                        id: 1,
                        clicked: true,
                    },
                    {
                        id: 2,
                        clicked: false,
                    },
                    {
                        id: 3,
                        clicked: false,
                    }
                ]
            }
        },
        methods: {
            carousel(id) {
                for (let i = 0; i < this.game_carousel.length; i++) {
                    this.game_carousel[i].clicked = false;
                }
                this.game_carousel[id - 1].clicked = true;
            },
            carouselThumbClick(item_id) {
                this.carousel(item_id)
                carousel_counter = item_id
            }
        },
        computed: {
            game() {
                return game_list.find(x => x.id == <?=$_GET["id"]?>)
            },
            game_title() {
                return this.game.title
            },
            game_base_price() {
                return this.game.base_price
            },
            game_curr_price() {
                return this.game.curr_price
            },
            game_desc() {
                return this.game.description
            }
        },
        beforeMounted() {

        },
        mounted() {
            document.body.className = "base-game-page";
        },
        created() {
            setInterval(() => {
                this.carousel_counter++;
                if (this.carousel_counter > this.game_carousel.length)
                    this.carousel_counter = 1;
                this.carousel(this.carousel_counter)
            }, 5000)
        },
        components: {
            headercomp: headerComp,
            navcomp: navComp,
        },
    }).mount('#app')
</script>