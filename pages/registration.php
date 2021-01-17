<div class="d-flex flex-column align-items-center mt-5">

    <?
if(!isset($_POST["register-submit"])){
    ?>
    <form action="index.php?page=4" method="POST" class="p-2 text-center border shadow"
        style="width: 350px; background-color:white">
        <h3 class="border-bottom">Registration</h3>
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" name="login" class="form-control text-center">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control text-center">
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirm password:</label>
            <input type="password" name="password-confirm" class="form-control text-center">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control">
        </div>
        <input class="btn btn-dark container-fluid" type="submit" name="register-submit" value="Add user">
    </form>
    <?
}
else{
    if(register($_POST["login"], $_POST["password"], $_POST["email"])){
        echo "<h3><span style='color: green'>Пользователь успешно добавлен</span></h3>";
        ?>
    <script>
    window.location = "index.php?page=1"
    </script>
    <?
    }
}
?>