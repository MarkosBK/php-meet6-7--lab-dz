<h2 align="center">Gallery</h2>

<div class="container-fluid row m-0">
    <?php
    $image = '';
    $images = scandir("images");
    foreach ($images as $value) {
        if ($value == "." || $value == "..") continue;
        else {
            $border = "linear-gradient(to right, red, purple);";
    ?>
    <input type="hidden" value="<?echo $value?>" id="selectImage">
    <div data-toggle="modal" data-target="#pictureModal" class="p-2 col-lg-3 col-md-4 col-sm-6"
        onclick="imageClick(this.previousSibling.previousSibling.value)">
        <div class="galleryItemBorder" style="background: <?php echo $border ?>;">
            <div class="divImage galleryItem"
                style=" height: 200px; background-image:<?php echo " url(images/" . $value . ")" ?>">
            </div>
        </div>
    </div>

    <?php
        }
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="pictureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid p-3" style="height: 100%;">
                    <div class="divImage" id="modalImage" style="height: 100%; "></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function imageClick(e) {
    let img = document.getElementById("modalImage");
    img.style = `background-image: url(images/${e}); height: 100%`;
}
</script>