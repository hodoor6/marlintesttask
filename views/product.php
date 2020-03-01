<?php

include($_SERVER['DOCUMENT_ROOT'] .'/model/products.php');
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');


//?>



<br>
<h1>Продукт</h1>
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


        <tr>
            <td>
                <?PHP echo $product['id'] ?>
                         </td>


            <td>
                <a href="products.php">   <?= $product['name'] ?></a>
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

<!--                     //ВОПРОС как это вывести при помощи функции и oop-->

                    <?php if(!empty($categories[$product['category_id']]['name'])){

                        ?>
                        <a href="/views/productsCategory.php?category_id=<?= $product['category_id'] ?>">    <?= $categories[$product['category_id']]['name'] ?></a>
                        <?php
                    }else{
    ?>
                     <a href="/views/productsCategory.php?category_id=<?=$product['category_id']?>">    <?= $categories[$product['category_id']]['name'] ?></a>
 <?php
         }
?>
            </td>

            <td>
                <?= $product['date'] ?>

            </td>
        </tr>

    <table>