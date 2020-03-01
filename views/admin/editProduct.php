<?php

include($_SERVER['DOCUMENT_ROOT'] .'/model/products.php');
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');

?>
<h1>Редактирование продукта</h1>

<form action="/model/products.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="updateId" value="<? if (!empty($product['id'])) {
        echo $product['id'];
    }
    ?>">


        <p><label>Название товара<label/></p>

        <input type="text" name="name" placeholder="Название категории" value="<?=$product['id']?>">
        <p><label>Название краткое описание<label/></p>

        <textarea rows="5" cols="30" name="description" placeholder="Краткое описание"><?=$product['description']?></textarea>
        <p><label>Полное описание<label/></p>

        <textarea rows="7" cols="50" name="text" placeholder="Полное описание"><?=$product['text']?></textarea>
        <p><label>Изображение<label/></p>
    <img src="/images/<?=getImage($product['image']) ?>">
    <input type="hidden" name="image" value="<?=$product['image']?>">
    <p><label>Загрузить изображение<label/></p>
    <input type="file" name="image">

        <p><label>Категория<label/></p>
<!--ВОПРОС как болле компакно все вывести-->

        <select name="category">
            <?php
            foreach ($categories as $category) {
            if(in_array(product['category_id'], $category)  )
            {
            ?>
            <option value="<?= $product['category_id'] ?>"
                    hidden=""><?= $category['name'] ?></option>
            <?php
            }
            }
            ?>
                        <?php
            foreach ($categories as $category) {
                ?>

                <option value="<?= $category['id'] ?>">
                    <?= $category['name'] ?></option>
                <?php
            }
            ?>
        </select>


        <p><label>Статус товара</label></p>

        <input type="checkbox" name="status" value="true" <?if($product['status'] != 0){ echo 'checked';}?>>Отключить</br>


        <br>
        <input type="submit" name="updateproduct" value="Отправить">

    </form>