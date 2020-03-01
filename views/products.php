<?php
include($_SERVER['DOCUMENT_ROOT'] .'/model/products.php');
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');

?>

<br>
<h1>Продукты</h1>
<br>

<table width="800" border="1" cellspacing="0" cellpadding="4" align="center">

    <tr>
        <th>id</th>
        <th>Продукт</th>
        <th>Описание</th>
        <th>Полное описание</th>
        <th>Фото</th>
        <th>Категория</th>
        <th>Дата добавления</th>
    </tr>

    <?php

    foreach ($products as $product) {

        ?>

        <tr>
            <td>
                <?= $product['id'] ?>
                         </td>


            <td>
                <a href="/views/product.php?id=<?=$product['id']?>">   <?= $product['name'] ?></a>
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
            <td>
                <?= $product['date'] ?>

            </td>
        </tr>
        <?php
    }
    ?>
    <table>