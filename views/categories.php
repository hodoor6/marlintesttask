<?php
include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');
?>


<br>
<h1>Категория</h1>
<br>
<table width="800" border="1" cellspacing="0" cellpadding="4" align="center">

    <tr>
        <th>id</th>
        <th>Категория</th>
       </tr>

    <?php
    foreach ($categories as $category) {

        ?>


        <tr>
            <td>
                <?= $category['id'] ?>
            </td> <td>
                <?= $category['name'] ?>
            </td>

        <?php
    }
    ?>

    <table>
