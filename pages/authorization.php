<div class="d-flex flex-column align-items-center mt-5">

    <?
if(!isset($_POST["authorization-submit"])){
    ?>
    <form action="index.php?page=5" method="POST" class="p-2 text-center border shadow"
        style="width: 350px; background-color:white">
        <h3 class="border-bottom">Log In</h3>
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" name="login" class="form-control text-center">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control text-center">
        </div>
        <input class="btn btn-dark container-fluid" type="submit" name="authorization-submit" value="Log In">
        <h4 id="messageLogin" style="visibility: hidden; color:green"></h4>
    </form>
    <?
}
else{
    // echo "<h3><span style='color: green'>Пользователь успешно добавлен</span></h3>";
    if(authorization($_POST)){
    ?>
    <script>
    window.location = "index.php?page=1";
    </script>
    <?
    }
    else{
        unset($_POST);
        ?>
    <script>
    window.location = "index.php?page=5";
    </script>
    <?
    }
}
?>