<?php

include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');

?>
<h1>Добавление категории</h1>

<form action="/model/categories.php" method="post">
    <p><label>Название категории<label/></p>

    <input type="text" name="name" placeholder="Название категории" value="">


    <input type="submit" name="addсategory" value="Отправить">

</form>