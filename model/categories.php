<?php
include($_SERVER['DOCUMENT_ROOT']  .'/core/bd.php');
//неуспел перевести на pdo
// вывод всех категории

$selectCategories = mysqli_query($bdConnect,"SELECT * from categories where id > 0");



for ($categories = []; $row = mysqli_fetch_assoc($selectCategories); $categories[] = $row);


//вывод на редактирование категории

if($_REQUEST['idcategory']) {


    $idcategory = htmlspecialchars(strip_tags(trim($_REQUEST['idcategory'])));

    $selectCategory = "SELECT * from categories where id =" . $idcategory;


    $result = mysqli_query($bdConnect, $selectCategory);




    for ($category = []; $row = mysqli_fetch_assoc($result); $category = $row) ;

}


//добавление данных о категгрии

if(!empty($_REQUEST['addсategory']))
{

    $category = htmlspecialchars(strip_tags(trim($_REQUEST['name'])));


    $addCategory = "INSERT INTO `categories` (name) VALUE ('$category')";



$result = mysqli_query($bdConnect, $addCategory);
    header("Location: /views/admin/adminCategories.php");


}

//обновление данных с формы

if(!empty($_REQUEST['updateсategory']))
{

    $id = htmlspecialchars(strip_tags(trim($_REQUEST['id'])));
    $category = htmlspecialchars(strip_tags(trim($_REQUEST['name'])));


    $updateCategory = "UPDATE `categories` SET name='".$category."' WHERE id='".$id."'";



$result = mysqli_query($bdConnect,  $updateCategory);
    header("Location: /views/admin/adminCategories.php");


}





