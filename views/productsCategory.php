<?php
include($_SERVER['DOCUMENT_ROOT'] .'/model/products.php');
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');

if($id == 0)
{
    $id = 3;
}
?>


<br>
<h1>Продукты из категории <?= $categories[$id]['name'] ?></h1>
<br>

<table width="800" border="1" cellspacing="0" cellpadding="4" align="center">

    <tr>
        <th>id</th>
        <th>Продукт</th>
        <th>Описание</th>
        <th>Полное описание</th>
        <th>Фото</th>
        <th>Категория</th>
        <th>Статус</th>
        <th>Дата добавления</th>
    </tr>

    <?php

    foreach ($productCategory as $product) {

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
                <img src="/images/<?=getImage($product['image'])?>">
            </td>
                  <td>
                      <?php


                      if(($categories[$product['category_id']]['name']) != null)
                      {

                          ?>
                          <a href="/views/productsCategory.php?category_id=<?= $product['category_id'] ?>">    <?= $categories[$product['category_id']]['name'] ?></a>
                          <?php
                      }else{
                          ?>
                          <a href="/views/productsCategory.php?category_id=3">    <?= $categories[3]['name'] ?></a>
                          <?php
                      }
                      ?>


            </td>
            <td>
                <?= $product['status'] ?>

            </td>

            <td>
                <?= $product['date'] ?>

            </td>
        </tr>
        <?php
    }
    ?>
    <table>

