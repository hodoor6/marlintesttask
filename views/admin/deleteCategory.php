<?php

include($_SERVER['DOCUMENT_ROOT'] .'/model/categories.php');

if($_GET['idcategory'])
{
    $idcategory = htmlspecialchars(strip_tags(trim($_GET['idcategory'])));

    $deleteProduct = "DELETE FROM `categories` WHERE id='".$idcategory."'";


    $result = mysqli_query($bdConnect,$deleteProduct);

    $updateCategory =  "UPDATE `products`
    SET category_id='3'
   WHERE category_id = '" . $idcategory . "'";

    $result = mysqli_query($bdConnect,$updateCategory );
    header("Location: /views/admin/adminCategories.php");
}