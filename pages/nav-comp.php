var navComp = {
    data() {
        return {
            search_input: "",
            cart_amount: <?php 
                require '../database/database.php';
                $res = $stellar_db -> query("select count(*) as total from cart where username='{$_COOKIE["username"]}'");
                if ($res) {
                    $row = $res -> fetch_assoc();
                    echo $row["total"];
                } else {
                    echo 0;
                }
            ?>,
        }
    },
    methods: {

    },
    computed: {
        game_list_filtered() {
            if (this.search_input.length > 0) {
                // Generate a Regex (To find a specific string)
                let gen_regex = "";
                for(let letter of this.search_input) {
                    gen_regex += `${letter}(.*?)`
                }
                let search_regex = new RegExp(`${gen_regex}`, "gmi")
                // Filter array value
                let filtered = game_list.filter(a => a.title.match(search_regex));
                return filtered.slice(0, 5)
            } else {
                return []
            }
        }
    },
    beforeMounted() {

    },
    mounted() {
        
    },
    created() {

    },
    template: `
    <div class="store-nav">
    <a href="./main-page.php" class="store-nav-your-store store-nav-control">
        Your Store
    </a>
    <a href="./search-page.php?special=true" class="store-nav-current-special store-nav-control">
        Current Specials
    </a>
    <a href="./search-page.php" class="store-nav-popular-game store-nav-control">
        All Games
    </a>
    <div class="store-nav-category store-nav-control">
        Categories
    </div>
    <div class="store-nav-search-spacer"></div>
    <a href="./transaction-page.php" class="store-nav-cart store-nav-control">
        <img src="../assets/icons/shopping-cart.svg">
        <div class="cart-amount" v-if="cart_amount > 0">{{cart_amount}}</div>
    </a>
    <div class="store-nav-search store-nav-control">
        <form class="store-nav-search-form">
            <div class="search-box">
                <input type="text" class="search-box-input" placeholder="Search" v-model="search_input">
                <a class="search-box-icon"><img src="../assets/icons/search.svg" style="fill: white;"></a>
            </div>
        </form>
    </div>
    <div class="search-box-result">
        <a :href="\`./base-game-page.php?id=\${item.id}\`" class="search-item" v-for="item in game_list_filtered" :key="item.id" >
            <img :src="\`../assets/images/games/\${item.id}.jpg\`">
            <div class="search-item-desc">
                <div class="search-item-title">{{item.title}}</div>
                <div class="search-item-price">{{item.curr_price == 0 ? "Free" : \`$\${item.curr_price}\`}}</div>
            </div>
        </a>
    </div>
</div>
    `
}