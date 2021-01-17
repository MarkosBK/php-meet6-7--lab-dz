<?php
$users = "pages/users.txt";
function register($login, $password, $email)
{
    $name = trim(htmlspecialchars($login));
    $password = trim(htmlspecialchars($password));
    $email = trim(htmlspecialchars($email));
    if ($login == "" || $password == "" || $email == "") {
        echo "<h3><span style='color: orangered'>Необходимо заполнить все поля</span></h3>";
        return false;
    }
    if (strlen($login) < 3 || strlen($login) > 30 || strlen($password) < 3 || strlen($password) > 30) {
        echo "<h3><span style='color: orangered'>Значения полей должны быть от 3 до 30 символов</span></h3>";
        return false;
    }
    global $users;
    $fd = fopen($users, "a+");
    while (!feof($fd)) {
        $line = fgets($fd);
        $readLogin = substr($line, 0, strpos($line, ":"));
        if ($login == $readLogin) {
            echo "<h3><span style='color: orangered'>Такой пользователь уже существует!</span></h3>";
            return false;
        }
    }
    $line = $login . ":" . md5($password) . ":" . $email . "\r\n";
    fputs($fd, $line);
    fclose($fd);
    return true;
}

function addImage($files)
{
    for ($i = 0; $i < count($files["input__file"]["name"]); $i++) {
        if ($files && $files["input__file"]["error"][$i] == UPLOAD_ERR_OK) {
            $name = $files["input__file"]["name"][$i];
            $name = str_replace(" ", "_", $name);
            if (!file_exists("images/" . $name)) {
                move_uploaded_file($files["input__file"]["tmp_name"][$i], "images/" . $name);
                echo "<p style='color: green;'>Загрузка(" . $name . ") - успешно добавлено";
            } else {
                echo "<p style='color: orangered;'>Загрузка(" . $name . ") - призошла ошибка";
            }
        } else {
            echo "<p style='color: orangered;'>Загрузка(" . $name . ") - призошла ошибка";
        }
    }
}

function authorization($userData)
{
    $fd = fopen("pages/users.txt", "r");
    $check = false;
    while (!feof($fd)) {
        $str = fgets($fd);
        $user = explode(":", $str);
        if ($user[0] == $userData["login"] && $user[1] == md5($userData["password"])) {
            $check = true;
            break;
        }
    }
    if ($check) {

        $_SESSION["userLogin"] = $userData["login"];
        return true;
    } else {
        return false;
    }
}

function checkAuthorization()
{
    if (strlen($_SESSION["userLogin"]) != 0) {
        return true;
    } else return false;
}