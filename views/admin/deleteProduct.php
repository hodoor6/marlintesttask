<?php

include($_SERVER['DOCUMENT_ROOT'] .'/model/products.php');

//
$id =htmlspecialchars(strip_tags(trim($_GET['id'])));
$image    = htmlspecialchars(strip_tags(trim($_GET['image'])));

if(!empty($image) ){

    $path = $_SERVER['DOCUMENT_ROOT'] .'./images/' . $image;
    unlink ($path);

}

$deleteProduct = "DELETE FROM `products` WHERE id='".$id."'";


    $result = mysqli_query($bdConnect,$deleteProduct);
  header("Location: /views/admin/adminProduct.php");

