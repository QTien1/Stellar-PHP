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
        <div class="search">
            <div class="bottom-left">
                <div class="list-search">
                    <input class="search-input" type="text" placeholder="Search" v-model="search_input">
                    <button class="search-btn"><img src="../assets/icons/search.svg"></button>
                    <div class="search-spacer"></div>
                    <select class="search-select" v-model="search_select">
                        <option value="lowest">Lowest price</option>
                        <option value="highest">Highest price</option>
                    </select>
                </div>
                <div class="list-box">
                    <a :href="`./base-game-page.php?id=${item.id}`" class="list-item" v-for="item in game_list_filtered" :key="item.id">
                        <img :src="`../assets/images/games/${item.id}.jpg`" class="list-item-img">
                        <div class="list-item-title">{{item.title}}</div>
                        <div class="list-item-sale">
                            <div class="list-item-sale-box" v-if="item.curr_price !== item.base_price">-{{( 100 - (item.curr_price / item.base_price * 100)).toFixed(0)}}%</div>
                        </div>
                        <div class="list-item-price">
                            <div class="price-base" v-if="item.curr_price !== item.base_price">${{item.base_price}}</div>
                            <div class="price-curr">{{item.curr_price == 0 ? "Free" : `$${item.curr_price}`}}</div>
                        </div>
                    </a> 
                </div>
            </div>
            <div class="bottom-attr">
                <div class="attr-box">
                    <div class="attr-box-title">Narrow by price</div>
                    <input type="range" class="range-input" min="0" max="40" step="4" v-model="price_val" @change="priceRangeChange">
                    <div class="price-box-name">{{price_name}}</div>
                    <hr class="dividers">
                    <div class="attr-box-special">
                        <input type="checkbox" class="checkbox" v-model="special_checkbox"><label>Special Offers</label>
                    </div>
                </div>
                <div class="attr-box">
                    <div class="attr-box-title">Narrow by tag</div>
                    <div class="tag-box-checkbox" v-for="item in tag_list" :key="item">
                        <input type="checkbox" class="checkbox"><label>{{item}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url("../css/root.css");
    @import url("../css/header-comp.css");
    @import url("../css/nav-comp.css");
    .search {
        margin: 20px auto 0px auto;
        width: 900px;
        display: flex;
        background-color: rgb(var(--bgDarkColor2));
    }

    .bottom-left {
        padding: 20px;
        width: calc(70% - 40px);
    }

    .list-search {
        width: 100%;
        display: flex;
        align-items: center;
    }

    .search-input {
        width: calc(50% - 10px);
        height: calc(30px - 2px);
        border-radius: 5px;
        border: 0;
        font-family: Dosis;
        background-color: rgb(var(--bgColor));
        font-size: 20px;
        color: var(--textColor);
    }

    .search-btn {
        border: 0;
        height: 30px;
        width: 30px;
        padding: 2px;
        background-color: rgb(var(--bgColor));
        border-radius: 5px;
        margin: 0px 10px 0px 10px;
    }

    .search-btn:hover { 
        background-color: rgb(var(--bgDarkColor1));
    }

    .search-spacer {
        flex: 1;
    }

    .search-select {
        height: 30px;
        width: calc(30% - 10px);
        background-color: rgb(var(--bgColor));
        border: 0;
        border-radius: 5px;
        font-family: Dosis;
        color: var(--textColor);
        font-size: 18px;
    }

    .list-box {
        margin-top: 10px;
        padding-right: 10px;
        width: calc(100%-10px);
        max-height: 600px;
        overflow-y: scroll;
    }

    .list-box::-webkit-scrollbar {
        width: 15px;
        background-color: rgb(var(--bgDarkColor4));
        border-radius: 7px;
    }

    .list-box::-webkit-scrollbar-thumb {
        background-color: rgb(var(--bgColor));
        border-radius: 7px;
    }

    .list-item {
        margin: 10px 0px 10px 0px;
        width: 100%;
        height: 50px;
        display: flex;
        background-color: rgb(var(--bgDarkColor3));
        border-radius: 5px;
        color: var(--textColor);
        text-decoration: none;
    }

    .list-item-img {
        height: 100%;
    }

    .list-item-title {
        padding: 0px 5px 0px 5px;
        width: calc(75% - 10px);
        font-size: 20px;
    }

    .list-item-sale {
        padding: 0px 5px 0px 5px;
        width: 65px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .list-item-sale-box {
        width: 80%;
        height: 50%;
        background-color: rgb(var(--bgDarkGreen1));
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(var(--bgLightGreen3));
    }

    .list-item-price {
        margin-right: 10px;
        width: 100px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
    }

    .price-base {
        font-size: 14px;
        color: grey;
    }

    .price-curr {
        font-size: 20px;
    }

    .bottom-attr {
        padding: 20px;
        width: calc(30% - 40px);
    }

    .attr-box {
        width: 100%;
        border: 2px rgb(var(--bgColor)) solid;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .attr-box-title {
        background-color: rgb(var(--bgColor));
        padding: 5px 10px 5px 10px;
        width: calc(100% - 20px);
        display: flex;
        justify-content: center;
    }

    .tag-box-checkbox {
        display: flex;
        align-items: center;
    }

    .checkbox {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        appearance: none;
        width: 22px;
        height: 22px;
        background-color: rgb(var(--bgColor));
        border-radius: 5px;
    }

    .checkbox:hover {
        background-color: rgb(var(--bgDarkColor1));
    }

    .checkbox::after {
        content: "";
        position: absolute;
        width: 14px;
        height: 14px;
        background-color: rgb(var(--bgLightColor4));
        display: none;
        border-radius: 4px;
    }

    .checkbox:checked::after{
        display: block;
    }
    .range-input {
        appearance: none;
        margin: 10px 40px 10px 40px;
        width: calc(100% - 80px);
        height: 10px;
        background: rgb(var(--bgColor));
        border-radius: 5px;
    }
    .range-input::-webkit-slider-thumb {
        appearance: none;
        width: 20px;
        height: 20px;
        background: rgb(var(--bgLightColor4)); 
        cursor: pointer;
        border-radius: 100%;
    }

    .price-box-name {
        margin: 0px 40px 10px 40px;
        width: calc(100% - 80px);
        display: flex;
        justify-content: center;
    }

    .dividers {
        width: 80%;
        border: 1px solid rgb(var(--bgColor));
    }

    .attr-box-special {
        display: flex;
        align-items: center;
    }
</style>

<script>
    const { createApp } = Vue

    const app = createApp({
        data() {
            return {
                price_val: 40,
                price_name: null,
                search_input: "",
                search_select: "lowest",
                special_checkbox: <?=isset($_GET["special"]) ? "true" : "false"?>,
                tag_list: ["Indie", "Action", "Casual", "Adventure", "Singleplayer", "2D", "Simulation"],

            }
        },
        methods: {
            priceRangeChange() {
                if (this.price_val == 0) {
                    this.price_name = "Free"
                } else if (this.price_val == 40) {
                    this.price_name = ">$40.00"
                } else {
                    this.price_name = `$${this.price_val}.00`
                }
            }
        },
        computed: {
            game_list_filtered() {
                let gen_regex = "";
                for(let letter of this.search_input) {
                    gen_regex += `${letter}(.*?)`
                }
                let search_regex = new RegExp(`${gen_regex}`, "gmi")
                // Filter array value
                let filtered = game_list.filter(a => a.title.match(search_regex));
                filtered = filtered.filter(a => a.curr_price <= (this.price_val == 40 ? Infinity : this.price_val))
                if (this.special_checkbox) {
                    filtered = filtered.filter(a => a.base_price !== a.curr_price)
                }
                switch (this.search_select) {
                    case "lowest": {
                        filtered.sort((a,b) => a.curr_price - b.curr_price);
                        break;
                    }
                    case "highest": {
                        filtered.sort((a,b) => b.curr_price - a.curr_price);
                        break;
                    }
                }
                return filtered
            }
        },
        beforeMounted() {

        },
        mounted() {
            this.priceRangeChange()
            document.body.className = "search-page";
        },
        created() {

        },
        components: {
            headercomp: headerComp,
            navcomp: navComp,
        },
    }).mount('#app')
</script>