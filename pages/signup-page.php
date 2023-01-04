<?php
    require '../database/database.php';
    if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $hashed_pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
        if ($stellar_db -> query("insert into user (username, email, password) values ('{$_POST["username"]}', '{$_POST["email"]}', '{$hashed_pwd}')")) {
            setcookie("username", $_POST["username"]);
            header("Location: ./main-page.php");
        }
    } else {
        $no_input = true;
    }
?>

<script src="../libs/vue@3.2.37.js"></script>
<script src="../database/game-list.php"></script>
<script src="../libs/cookie.js"></script>
<script src="../libs/theme-switcher.js"></script>

<div id="app">
    <div class="signup-box">
        <div class="logo-box">
            <img src="../assets/images/logo.svg" class="signup-img">
        </div>
        <form class="signup" method="POST">
            <!--account_form_box-->
            <div class="signup-title">Create your Account</div>
            <div class="signup-input-area">
                <div class="signup-input-title">Username</div>
                <input type="text" maxlength="20" class="signup-input" name="username" placeholder="Username">
            </div>
            <div class="signup-input-area">
                <div class="signup-input-title">E-mail Address</div>
                <input type="text" maxlength="255" class="signup-input" name="email" placeholder="E-mail Address">
            </div>
            <div class="signup-input-area">
                <div class="signup-input-title">Password</div>
                <input type="password" maxlength="255" class="signup-input" name="password" placeholder="Password">
            </div>
            <div class="signup-input-area">
                <div class="signup-input-title">Confirm password</div>
                <input type="password" maxlength="255" class="signup-input" placeholder="Confirm password">
            </div>
            <!--sign up-->
            <button class="signup-btn" type="submit">
                <span>Sign Up</span>
            </button>
        </form>
    </div>
</div>

<style>
    @import url("../css/root.css");
    .signup-box {
        margin: auto;
        margin-top: 3vh;
        width: calc(650px - 20px);
        height: calc(700px - 20px);
        background-color: rgba(var(--bgDarkColor2), 0.75);
        border-radius: 25px;
        color: var(--textColor);
        box-shadow: 1px 1px 5px black;
        padding: 20px;
    }

    .logo-box {
        width: 100%;
        height: 200px;
        display: flex;
        justify-content: center;
    }
    .signup-img {
        height: 100%;
    }
    .signup {
        margin-left: 20%;
        width: 60%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .signup-title {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        font-size: 28px;
        margin: 10px 0px 10px 0px;
    }
    .signup-input-area {
        width: 100%;
    }
    .signup-input-title {
        font-size: 18px;
        margin: 5px 0px 5px 0px;
    }
    .signup-input {
        width: 100%;
        background-color: rgba(var(--bgColor), 0.75);
        border: 0;
        box-shadow: 1px 1px 5px black;
        border-radius: 5px;
        font-size: 28px;
        font-family: Dosis;
        color: var(--textColor);
    }
    .signup-btn {
        background-image: linear-gradient(90deg, rgb(var(--bgLightColor2)), rgb(var(--bgColor)));
        box-shadow: 1px 1px 5px black;
        margin: 40px 0px 10px 0px;
        padding: 5px 0px 5px 0px;
        width: 60%;
        border: 0;
        border-radius: 5px;
        font-family: Dosis;
        color: var(--textColor);
        font-size: 24px;
        cursor: pointer;
    }

    .error {
        width: 100%;
        display: flex;
        justify-content: center;
        color: red;
        font-size: 24px;
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
            document.body.className = "signup-page";
        },
        created() {

        },
        components: {

        },
    }).mount('#app')
</script>