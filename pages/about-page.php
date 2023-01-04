<script src="../libs/vue@3.2.37.js"></script>
<script src="../database/game-list.php"></script>
<script src="../libs/cookie.js"></script>
<script src="../libs/theme-switcher.js"></script>
<script src="./header-comp.php"></script>

<div id="app">
    <headerComp></headerComp>
    <div class="about">
        <img class="logo" src="../assets/images/logo.svg">
        <div class="title">About Stellar</div>
        <div class="desc">
            <p>This website is made by 4 members: Tienei, Unyielding, KenYukita, TDHP. </p>
            <p>This website was created with the purpose of satisfying the interests and passions of the people in the team, and sharing the game for all players around the world (some games charge a fee because they have to pay taxes to the publisher,...)</p>
            <p>We also create a virtual world where people all over the world can chat with each other, join groups, form clans and more! With millions of participants. Hurry up to join the stellar world to become a member of this great family !</p>
        </div>
    </div>
</div>

<style>
    @import url("../css/root.css");
    @import url("../css/header-comp.css");
    .about {
        margin: 20px auto 0px auto;
        width: calc(900px - 40px);
        padding: 10px 20px 10px 20px;
        background-color: rgba(var(--bgDarkColor2), 0.75);
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 5px;
    }

    .logo {
        width: 50%;
    }

    .title {
        font-size: 48px;
    }

    .desc {
        font-size: 24px;
    }
</style>

<script>
    const { createApp } = Vue

    const app = createApp({
        data() {
            return {
            
            }
        },
        methods: {

        },
        computed: {

        },
        beforeMounted() {

        },
        mounted() {
            document.body.className = "about-page";
        },
        created() {

        },
        components: {
            headercomp: headerComp,
        },
    }).mount('#app')
</script>