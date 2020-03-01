<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/products.php');
include($_SERVER['DOCUMENT_ROOT'] . '/model/categories.php');

?>
<h1>Добавление продукта</h1>

<form action="/model/products.php" method="post" enctype="multipart/form-data">
    <p><label>Название товара<label/></p>

    <input type="text" name="name" placeholder="Название категории" value="">
    <p><label>Название краткое описание<label/></p>

    <textarea rows="5" cols="30" name="description" placeholder="Краткое описание"></textarea>
    <p><label>Полное описание<label/></p>

  <textarea rows="10" cols="50" name="text" placeholder="Полное описание"></textarea>
    <p><label>Изображение<label/></p>
    <input type="file" name="image">
    <p><label>Категория<label/></p>


    <select name="category">
        <option value="3" hidden="">Выберите категорию</option>
        <?php
        foreach ($categories as $category) {
            ?>
            echo'
            <option value="<?= $category['id'] ?>">
                <?= $category['name'] ?></option>
            <?php
        }
        ?>
    </select>


    <p><label>Статус товара</label></p>

    <input type="checkbox" name="status" value="true">Отключить<Br>


    <br>
    <input type="submit" name="addproduct" value="Отправить">

</form>