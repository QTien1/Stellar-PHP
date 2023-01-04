<?php
    require '../database/database.php';
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        if($_POST["username"] == "admin" && $_POST["password"] == "admin") {
            setcookie("username", $_POST["username"]);
            header("Location: ./main-page.php");
        } else {
            $res = $stellar_db -> query("select password from user where username='{$_POST["username"]}'");
            if ($res -> num_rows > 0) {
                $row = $res -> fetch_assoc();
                if (password_verify($_POST["password"], $row["password"])) {
                    setcookie("username", $_POST["username"]);
                    header("Location: ./main-page.php");
                }
            }
        }
    }
?>

<script src="../libs/vue@3.2.37.js"></script>
<script src="../database/game-list.php"></script>
<script src="../libs/cookie.js"></script>
<script src="../libs/theme-switcher.js"></script>

<div id="app">
    <div class="login-box">
        <div class="logo-box">
            <img src="../assets/images/logo.png" class="logo">
        </div>
        <form name="login" class="login" method="POST">
            <div class="login-input-area">
                <div class="input-title">Username</div>
                <input class="login-input" type="text" placeholder="Username" name="username">
            </div>
            <div class="login-input-area">
                <div class="input-title">Password</div> 
                <input class="login-input" type="password" autocomplete="off" placeholder="Password" name="password">
            </div>
            <button class="btn-signin">Sign in</button><br>
            <div class="link-forgot-pwd">
                <a href="./forgot-pwd-page.php">Forgot your password?</a>
            </div>
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
    .login-box {
        margin: auto;
        margin-top: 3vh;
        width: 650px;
        height: 650px;
        background-color: rgba(var(--bgDarkColor2), 0.75);
        border-radius: 25px;
        color: var(--textColor);
        box-shadow: 1px 1px 5px black;
    }

    .logo-box {
        width: 100%;
        height: 300px;
        display: flex;
        justify-content: center;
    }

    .logo {
        height: 100%;
    }

    .wrong-input {
        width: 100%;
        color: red;
        display: flex;
        justify-content: center;
    }

    .login {
        margin-left: 20%;
        width: 60%;
        height: 300px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .login-input-area {
        width: 100%;
    }

    .login-input {
        width: 100%;
        border-radius: 5px;
        background-color: rgba(var(--bgColor), 0.75);
        color: var(--textColor);
        font-family: Dosis;
        font-size: 28px;
        box-shadow: 1px 1px 5px black;
        border: 0;
    }

    .input-title {
        font-size: 18px;
        margin: 10px 0px 10px 0px;
    }

    .btn-signin {
        margin: 20px 0px 10px 0px;
        padding: 5px 0px 5px 0px;
        width: 60%;
        border-radius: 5px;
        background: linear-gradient(90deg, rgb(var(--bgLightColor2)), rgb(var(--bgColor)));
        box-shadow: 1px 1px 5px black;
        border: 0px;
        font-family: Dosis;
        font-size: 28px;
        color: var(--textColor);
        cursor: pointer;
    }

    .link-forgot-pwd {
        width: 65%;
        height: 50px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        font-size: 18px;
    }

    .link-forgot-pwd a {
        color: var(--textColor);
        text-decoration: none;
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
            document.body.className = "login-page";
        },
        created() {

        },
        components: {

        },
    }).mount('#app')
</script>