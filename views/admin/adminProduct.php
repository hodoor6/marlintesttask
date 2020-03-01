<?php
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');
include($_SERVER['DOCUMENT_ROOT'] .'/model/products.php');

?>
<h2>Админ панель Продуктов</h2>

<table><table width="800" border="1" cellspacing="0" cellpadding="4" align="center">

        <tr>
            <th>id</th>
            <th>Продукт</th>
            <th>Описание</th>
            <th>Полное описание</th>
            <th>Фото</th>
            <th>Категория</th>
            <th>Статус</th>
            <th>Дата добавления</th>
            <th>Добавить</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>

        <?php
        foreach ($adminProducts as $product) {

            ?>

            <tr>
                <td>
                    <?= $product['id'] ?>
                </td>

                <td>
                    <?= $product['name'] ?>
                </td>
                <td>
                    <?= $product['description'] ?>
                </td>
                <td>
                    <?= $product['text'] ?>
                </td>

                <td>
                    <img src="/images/<?=getImage($product['image']) ?>">

                </td>
                <td>

                    <?php

                    foreach ($categories as $category) {
                        if (in_array($product['category_id'], $category)) {

                            echo '<a href="/views/productsCategory.php?category_id=' . $product['category_id'] . '">' . $category['name'] . '</a>';
                        }
                    }
                    ?>

                </td>
                <td>
                    <?= $product['status'] ?>

                </td>

                <td>
                    <?= $product['date'] ?>

                </td> <td>
                    <a href="/views/admin/addProduct.php?=<?=$product['id']?>">Добавить</a>

                </td> <td>
                    <a href="/views/admin/editProduct.php?id=<?=$product['id']?>">Редактировать</a>

                </td> <td>
                    <a href="/views/admin/deleteProduct.php?id=<?=($product['id'])?>&image=<?=$product['image']?>">Удалить</a>
                </td>
            </tr>
            <?php
        }
        ?>

        <table>