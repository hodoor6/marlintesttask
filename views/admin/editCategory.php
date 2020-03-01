<?php

include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');


?>
<h1>Редактирование категории</h1>

<form action="/model/categories.php" method="post">
    <p><label>Название категории<label/></p>

    <input type="hidden" name="id"  value="<?=$category['id']?>">
    <input type="text" name="name" placeholder="Название категории" value="<?=$category['name']?>">


    <input type="submit" name="updateсategory" value="Отправить">

</form>