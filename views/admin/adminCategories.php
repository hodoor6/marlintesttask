<?php
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');

?>
<h2>Админ панель Категорий</h2>

<table width="800" border="1" cellspacing="0" cellpadding="4" align="center">

    <tr>
        <th>id</th>
        <th>Категория</th>
        <th>Добавить</th>
        <th>Редактировать</th>
        <th>Удалить</th>

    </tr>

    <?php
    foreach ($categories as $category) {

        ?>


        <tr>
            <td>
                <?= $category['id'] ?>
            </td>
            <td>
                <?= $category['name'] ?>
            </td>
            <td>
                <a href="/views/admin/addCategory.php">Добавить</a>

            </td>
            <td>
                <a href="/views/admin/editCategory.php?idcategory=<?= $category['id']?>">Редактировать</a>
            </td>
            <td>
                <a href="/views/admin/deleteCategory.php?idcategory=<?= $category['id']?>">Удалить</a>
            </td>

        </tr>
        <?php
    }
    ?>

    <table>