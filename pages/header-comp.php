var headerComp = {
    data() {
        return {
            user: {
                username: "Stellar",
                avatar_url: "../assets/images/avatar-placeholder.png",
                curr_money: 0,
                currency: "USD"
            },
            isProfileClick: false,
            isThemeClick: false,
        }
    },
    methods: {
        profileClick() {
            this.isProfileClick = !this.isProfileClick;
            this.isThemeClick = false;
        },
        themeMenuClick() {
            this.isThemeClick = !this.isThemeClick;
        },
        themeClick(theme) {
            document.documentElement.className = theme;
            Cookie.create("theme", theme)
        },
        logOut() {
            Cookie.delete("username")
            location.pathname = "/index.php"
        }
    },
    computed: {

    },
    beforeMounted() {

    },
    mounted() {
        let cookie = Cookie.get("username")
        if (cookie) {
            this.user.username = cookie.value
        } else {
            this.user.username = "Guest"
        }
    },
    created() {

    },
    template: `
<div class="header">
    <div class="header-content">
        <div class="header-logo">
            <img src="../assets/images/logo.svg">
        </div>
        <div class="header-selection-frame">
            <a href="./main-page.php" class="header-selection">Store</a>
            <a href="./about-page.php" class="header-selection">About</a>
            <a v-if="user.username=='admin'" href="./admin-page.php" class="header-selection">Database</a>
            <a v-else class="header-selection">Support</a>
        </div>
        <div class="header-spacer"></div>
        <div class="header-profile-box">
            <div class="profile-box" @click="profileClick">
                <div class="profile-username">
                    <span>{{user.username}} - {{user.curr_money.toLocaleString('en-US')}} {{user.currency}}</span>
                </div>
                <img :src="user.avatar_url" class="profile-avatar">
            </div>
            <div class="profile-setting-menu" :class="{'show-profile-menu': isProfileClick}">
                <div class="setting-theme setting-item" @click.self="themeMenuClick">
                    Change Theme
                </div>
                <div class="setting-theme-submenu" :class="{'show-theme-submenu': isThemeClick}">
                    <div class="setting-theme-item" @click.self="themeClick('theme-default')">Default</div>
                    <div class="setting-theme-item" @click.self="themeClick('theme-spring')">Spring</div>
                    <div class="setting-theme-item" @click.self="themeClick('theme-summer')">Summer</div>
                    <div class="setting-theme-item" @click.self="themeClick('theme-autumn')">Autumn</div>
                    <div class="setting-theme-item" @click.self="themeClick('theme-winter')">Winter</div>
                </div>
                <div class="setting-theme setting-item" @click="logOut">
                    Log out
                </div>
            </div>
        </div>
    </div>
</div>`
  }