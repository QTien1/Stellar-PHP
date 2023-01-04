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
        <div class="store">
            <div class="store-title">Current Specials</div>
            <div class="special-game-box">
                <a :href="`./base-game-page.php?id=${item.id}`" v-for="item in specials" :key="item.id" class="game-box-item">
                    <img :src="`../assets/images/sales/${item.id}.jpg`" class="game-item-img">
                    <div class="game-item-desc">
                        <div class="game-item-desc-name">
                            {{item.title}}
                        </div>
                        <div class="game-item-desc-price">
                            <div class="item-desc-price-curr">${{item.curr_price}}</div>
                            <div class="item-desc-price-sale" v-if="item.curr_price !== item.base_price">-{{( 100 - (item.curr_price / item.base_price * 100)).toFixed(0)}}%</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="store-title">Popular Games</div>
            <div class="store-game-box">
                <a :href="`./base-game-page.php?id=${item.id}`" v-for="item in populars" :key="item.id" class="game-box-item">
                    <img :src="`../assets/images/games/${item.id}.jpg`" class="game-item-img">
                    <div class="game-item-desc">
                        <div class="game-item-desc-name">
                            {{item.title}}
                        </div>
                        <div class="game-item-desc-price">
                            <div class="item-desc-price-box">
                                <div class="price-box-base" v-if="item.curr_price !== item.base_price">${{item.base_price}}</div>
                                <div class="price-box-curr">{{item.curr_price == 0 ? "Free" : `$${item.curr_price}`}}</div>
                            </div>
                            <div class="item-desc-price-sale" v-if="item.curr_price !== item.base_price">-{{( 100 - (item.curr_price / item.base_price * 100)).toFixed(0)}}%</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="store-title">Games for you</div>
            <div class="store-game-box">
                <a :href="`./base-game-page.php?id=${item.id}`" v-for="item in game_for_you" :key="item.id" class="game-box-item">
                    <img :src="`../assets/images/games/${item.id}.jpg`" class="game-item-img">
                    <div class="game-item-desc">
                        <div class="game-item-desc-name">
                            {{item.title}}
                        </div>
                        <div class="game-item-desc-price">
                            <div class="item-desc-price-box">
                                <div class="price-box-base" v-if="item.curr_price !== item.base_price">${{item.base_price}}</div>
                                <div class="price-box-curr">{{item.curr_price == 0 ? "Free" : `$${item.curr_price}`}}</div>
                            </div>
                            <div class="item-desc-price-sale" v-if="item.curr_price !== item.base_price">-{{( 100 - (item.curr_price / item.base_price * 100)).toFixed(0)}}%</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @import url("../css/root.css");
    @import url("../css/header-comp.css");
    @import url("../css/nav-comp.css");
    .store {
        background-color: rgb(var(--bgDarkColor2));
        width: 880px;
        margin: 10px auto 0px auto;
        padding: 0px 10px 10px 10px;
        border-radius: 5px;
    }

    .store-title {
        padding: 10px 0px 10px 0px;
        font-size: 24px;
    }

    .special-game-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

    .store-game-box {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }
    .game-box-item {
        color: var(--textColor);
        text-decoration: none;
        background-image: linear-gradient(-45deg, rgb(var(--bgLightColor1)), rgb(var(--bgDarkColor1)));
        width: 22%;
        border-radius: 5px;
        padding: 5px 5px 5px 5px;
    }

    .game-item-img {
        width: 100%;
    }

    .game-item-desc {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .game-item-desc-name {
        width: 100%;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .game-item-desc-price {
        width: 100%;
        height: 50px;
        font-size: 18px;
        display: flex;
        align-items: center;
    }

    .item-desc-price-sale {
        width: 60px;
        height: 45px;
        background-color: rgb(var(--bgDarkGreen1));
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(var(--bgLightGreen3));
        font-size: 24px;
    }

    .item-desc-price-curr {
        color: white;
        height: 45px;
        padding: 0px 10px 0px 10px;
        background-color: rgba(15, 15, 15, 0.65);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item-desc-price-box {
        height: 45px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        padding: 0px 10px 0px 10px;
        background-color: rgba(15, 15, 15, 0.65);
    }

    .price-box-base {
        font-size: 12px;
        color: grey;
        display: flex;
        justify-content: end;
    }

    .price-box-curr {
        color: white;
        font-size: 20px;
        display: flex;
        justify-content: end;
    }
</style>

<script>
    const { createApp } = Vue
    createApp({
        data() {
            return {
                specials: game_list.filter(a => a.sale).slice(0, 4),
                populars: game_list.filter(a => a.popular).slice(0, 4),
                arrRandom: Array(25).fill().map((_, i) => i),
                arrRandomGen: [],
                game_for_you: null,
            }
        },
        methods: {

        },
        computed: {

        },
        beforeMounted() {
            
        },
        mounted() {
            document.body.className = "main";
        },
        created() {
            for (let i = 0; i < 4; i++) {
                let rand = Math.floor(Math.random() * this.arrRandom.length)
                this.arrRandomGen.push(game_list[this.arrRandom[rand]])
                this.arrRandom.splice(rand, 1)
            }
            this.game_for_you = this.arrRandomGen
        },
        components: {
            headercomp: headerComp,
            navcomp: navComp,
        }
    }).mount('#app')

</script>