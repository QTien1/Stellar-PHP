<script src="../libs/vue@3.2.37.js"></script>
<script src="../database/game-list.php"></script>
<script src="../libs/cookie.js"></script>
<script src="../libs/theme-switcher.js"></script>
<script src="./header-comp.php"></script>

<div id="app">
    <headerComp></headerComp>
    <?php
        include '../database/database.php';

        if(isset($_POST["added"])) {
            if(isset($_FILES["image"])) {
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];

                $sale = isset($_POST["sale"]) ? 1 : 0;
                $popular = isset($_POST["popular"]) ? 1 : 0;
                $query = "INSERT INTO `game`(`id`, `title`, `base_price`, `curr_price`, `description`, `sale`, `popular`) VALUES ({$_POST['id']}, '{$_POST['title']}', {$_POST['base_price']}, {$_POST['curr_price']}, '{$_POST['description']}', {$sale}, {$popular})";
                if ($stellar_db -> query($query)) {
                    echo "Add game successfully";
                    move_uploaded_file($file_tmp,"../assets/images/games/".$_POST['id'].".jpg");
                }
            } else {
                echo "Please upload an image";
            }
        }

        if(isset($_POST["edited"])) {
            $sale = isset($_POST["sale"]) ? 1 : 0;
            $popular = isset($_POST["popular"]) ? 1 : 0;
            $query = "UPDATE `game` SET `title`='{$_POST['title']}',`base_price`={$_POST['base_price']},`curr_price`={$_POST['curr_price']},`description`='{$_POST['description']}',`sale`={$sale},`popular`={$popular} WHERE id={$_POST["edited"]}";
            if ($stellar_db -> query($query)) {
                echo "Update game successfully";
            }
        }

        if(isset($_POST["delete"])) {
            if ($stellar_db -> query("DELETE FROM game WHERE id={$_POST["delete"]}")) {
                echo "Delete game successfully";
                unlink("../assets/images/games/".$_POST['delete'].".jpg");
            }
        }

    ?>
    <form class="table cs-scroll" method="POST" enctype="multipart/form-data">
        <div class="table-hd center">ID</div>
        <div class="table-hd center">Image</div>
        <div class="table-hd center">Title</div>
        <div class="table-hd center">Base price</div>
        <div class="table-hd center">Sale price</div>
        <div class="table-hd center">Description</div>
        <div class="table-hd center">Sale?</div>
        <div class="table-hd center">Popular?</div>
        <div class="table-hd center">Actions</div>

        <?php
            if(isset($_POST["add"])):
        ?>
            <div class="table-it center"><input class="table-add-input" type="text" name="id"></div>
            <div class="table-it center"><input class="table-add-input" type="file" name="image" accept="img/*"></div>
            <div class="table-it center"><input class="table-add-input" type="text" name="title"></div>
            <div class="table-it center"><input class="table-add-input" type="text" name="base_price"></div>
            <div class="table-it center"><input class="table-add-input" type="text" name="curr_price"></div>
            <div class="table-it center"><input class="table-add-input" type="text" name="description"></div>
            <div class="table-it center"><input class="table-add-input" type="checkbox" name="sale"></div>
            <div class="table-it center"><input class="table-add-input" type="checkbox" name="popular"></div>
            <div class="table-it center">
                <button class="table-action btn" name="added"><img src="../assets/icons/plus.svg"></button>
            </div>
        <?php else: ?>
        <button class="table-add center btn" name="add">
            <img class="table-add-icon" src="../assets/icons/plus-circle.svg">
            Add games
        </button>
        <?php endif; ?>
        
        <?php
            $result = $stellar_db -> query("SELECT * FROM game");
            if ($result->num_rows > 0) :
                while($row = $result->fetch_assoc()):
                    if(isset($_POST["edit"]) && $row["id"] == $_POST["edit"]):
        ?>
        <div class="table-it center"><?=$row["id"]?></div>
        <div class="table-it center"><img class="table-img" src="../assets/images/games/<?=$row["id"]?>.jpg"></div>
        <div class="table-it center"><input class="table-add-input" type="text" name="title" value="<?=$row["title"]?>"></div>
        <div class="table-it center"><input class="table-add-input" type="text" name="base_price" value="<?=$row["base_price"]?>"></div>
        <div class="table-it center"><input class="table-add-input" type="text" name="curr_price" value="<?=$row["curr_price"]?>"></div>
        <div class="table-it center"><input class="table-add-input" type="text" name="description" value="<?=$row["description"]?>"></div>
        <div class="table-it center"><input class="table-add-input" type="checkbox" name="sale" <?=$row["sale"] ? "checked" : "" ?>></div>
        <div class="table-it center"><input class="table-add-input" type="checkbox" name="popular" <?=$row["popular"] ? "checked" : "" ?>></div>
        <div class="table-it center">
            <button class="table-action btn" name="edited" value="<?=$row["id"]?>"><img src="../assets/icons/edit-2.svg"></button>
        </div>
        <?php else: ?>
        <div class="table-it center"><?=$row["id"]?></div>
        <div class="table-it center"><img class="table-img" src="../assets/images/games/<?=$row["id"]?>.jpg"></div>
        <div class="table-it cs-scroll">
            <div class="table-subit center">
                <?=$row["title"]?>
            </div>
        </div>
        <div class="table-it center">$<?=$row["base_price"]?></div>
        <div class="table-it center">$<?=$row["curr_price"]?></div>
        <div class="table-it cs-scroll">
            <div class="table-subit center">
                <?=$row["description"]?>
            </div>
        </div>
        <div class="table-it center"><input type="checkbox" disabled <?=$row["sale"] ? "checked" : "" ?>></div>
        <div class="table-it center"><input type="checkbox" disabled <?=$row["popular"] ? "checked" : "" ?>></div>
        <div class="table-it center">
            <button class="table-action btn" name="edit" value="<?=$row["id"]?>"><img src="../assets/icons/edit-2.svg"></button>
            <button class="table-action btn" name="delete" value="<?=$row["id"]?>"><img src="../assets/icons/x.svg"></button>
        </div>
        <?php endif; endwhile; endif; ?>
    </form>
</div>

<style>
    @import url("../css/root.css");
    @import url("../css/header-comp.css");

    .cs-scroll {
        overflow: auto;
    }

    .cs-scroll::-webkit-scrollbar {
        width: 15px;
        background-color: rgb(var(--bgDarkColor4));
        border-radius: 7px;
    }

    .cs-scroll::-webkit-scrollbar-thumb {
        background-color: rgb(var(--bgColor));
        border-radius: 7px;
    }

    .btn {
        cursor: pointer;
        border: none;
        background-color: rgb(var(--bgDarkColor2));
        font-family: Dosis;
        color: rgb(var(--textColor));
        border-radius: 10px;
    }

    .btn:hover {
        background-color: rgb(var(--bgDarkColor1));
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .table {
        margin: 50px;
        padding: 10px;
        width: calc(100% - 100px - 20px);
        height: calc(100% - 100px - 100px - 20px);
        display: grid;
        background-color: rgba(var(--bgDarkColor3), 0.85);
        border-radius: 10px;
        grid-template-columns: 3% 15% 20% 6% 6% 30% 5% 5% 10%;
        grid-template-rows: 25px 45px;
        grid-auto-rows: 90px;
        grid-row-gap: 10px;
    }

    .table-add {
        grid-column-start: 1;
        grid-column-end: 10;
        font-size: 22px;
    }

    .table-add-input {
        width: 85%;
        border-radius: 10px;
        background-color: rgb(var(--bgColor));
        border: 0;
        height: 25px;
        font-family: Dosis;
        color: rgb(var(--textColor));
    }

    .table-add-icon {
        margin-right: 5px;
        height: 65%;
    }

    .table-subit {
        width: 100%;
        min-height: 100%;
    }

    .table-action {
        background-color: transparent;
        width: 50px;
        height: 50px;
    }

    .table-img {
        max-width:100%;
        max-height:100%;
    }

    .table-hd {
        font-weight: bold;
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
            document.body.className = "admin-page";
        },
        created() {
            
        },
        components: {
            headercomp: headerComp,
        }
    }).mount('#app')
</script>