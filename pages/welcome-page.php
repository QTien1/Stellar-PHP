<?php
    if(isset($_POST["signin"])) {
        header("Location: ./login-page.php");
    }
    if(isset($_POST["signup"])) {
        header("Location: ./signup-page.php");
    }
?>

<script src="../libs/vue@3.2.37.js"></script>
<script src="../database/game-list.php"></script>
<script src="../libs/cookie.js"></script>
<script src="../libs/theme-switcher.js"></script>

<div id="app">
    <div class="main">
        <div class="main-logo">
            <img src="../assets/images/logo.svg" class="logo">
        </div>
        <form class="btn-main" method="POST">
            <button class="btn-uni btn-signin" type="submit" name="signin">
                Sign in
            </button>
            <button class="btn-uni btn-signup" type="submit" name="signup">
                Sign up
            </button>
        </form>
    </div>
</div>

<style>
    @import url("../css/root.css");
    body {
        background-image: linear-gradient(180deg, rgba(var(--bgDarkColor3),var(--bgImageLightGrad1)), rgb(var(--bgDarkColor3),var(--bgImageLightGrad2))), var(--bgImage);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .main-logo {
        position: absolute; 
        margin-top: 5%;
        width: 99%;
    }
    .logo {
        margin-left: 29%;
        width: 40%;
    }

    .btn-main {
        position: absolute;
        margin-top: 25%;
        margin-left: 18.5%;
        width: 60%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .btn-uni {
        height: 3%;
        width: 20%;
        font-family: Dosis;
        font-size: 28px;
        background-image: linear-gradient(145deg, rgb(var(--bgLightColor2)), rgb(var(--bgDarkColor2)));
        color: var(--textColor);
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    @media screen and (max-width: 800px) {
        .btn-main {
            margin-top: 30%;
            margin-left: 24%;
            width: 60%;
            flex-flow: column;
        }
        .btn-uni {
            margin-top: 10%;
            width: 80%;
        }
    }
</style>
    
<script>
    const { createApp } = Vue

    createApp({
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
            document.body.className = "main-signin";
        },
        created() {

        },
        components: {

        },
    }).mount('#app')
</script>