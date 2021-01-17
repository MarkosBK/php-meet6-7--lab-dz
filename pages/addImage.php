<h2 align="center" class="my-5">Add Images</h2>

<?php

if (!isset($_POST["addImage"])) {
    if (checkAuthorization()) {
?>
<form method="POST" action="index.php?page=2" enctype="multipart/form-data">
    <div class="input__wrapper">
        <input type="file" id="input__file" name="input__file[]" class="input input__file" accept="image/*" multiple>
        <label for="input__file" class="input__file-button btn btn-dark">
            <span class="input__file-button-text">Выберите файл</span>
        </label>
        <input style="height: 60px;font-weight: 700;" id="addImage" type="submit" name="addImage" value="Add"
            class="ml-1 btn btn-dark" disabled>
    </div>
</form>
<ul class="list-group" id="addImagesList">

</ul>
<?php
    }
} else {
    addImage($_FILES);
    unset($_FILES);
    ?>
<script>
setTimeout(() => {
    window.location = "index.php?page=2"
}, 2000);
</script>
<?php
}
?>

<script>
var submit = document.getElementById("addImage");
var input = document.getElementById("input__file");
let label = input.nextElementSibling,
    labelVal = label.querySelector('.input__file-button-text').innerText;

input.addEventListener('change', function(e) {
    let countFiles = '';
    let ul = document.getElementById("addImagesList");
    ul.innerHTML = "";
    if (this.files && this.files.length >= 1) {
        console.log(this.files)
        for (let i = 0; i < this.files.length; i++) {
            const file = this.files[i];
            let li = document.createElement("li");
            li.classList.add("list-group-item");
            li.classList.add("text-center");
            li.textContent = file.name;
            ul.appendChild(li);
        }
        countFiles = this.files.length;
        submit.disabled = false;
    }


    if (countFiles)
        label.querySelector('.input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
    else
        label.querySelector('.input__file-button-text').innerText = labelVal;
});
</script>