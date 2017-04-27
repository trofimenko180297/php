<?php
if (!empty($_FILES['file']['name'])) {
    copy($_FILES['file']['tmp_name'], "gallery/{$_FILES['file']['name']}");
}
$photo_list = array_diff(scandir("gallery"), array('..', '.'));
?>
<div>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/jpeg,image/png"><br/><br/>
    <input type="submit">
</form>
</div>
<div>
    <table>
        <tr>
        <?php foreach ($photo_list as $photo) {?>
            <td><img src="gallery/<?=$photo?>" style="height: 100px;width: 100px"></td>
        <?php } ?>
        </tr>
    </table>
</div>