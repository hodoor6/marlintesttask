<?php


        include($_SERVER['DOCUMENT_ROOT'] .'/core/bd.php');




//ВОПРОС как это все организовать и чтобы работало переведя на oop?

//
//вывод всех опубликовыных товаров
$selectProducts = "SELECT * from products where status=0 AND id > 0";

$statement = $pdo->query($selectProducts);

$products = $statement->fetchAll(PDO::FETCH_ASSOC);
//


////вывод всех товародля Админки как опубликованных так и нет
//PDO

$selectAdminProducts ="SELECT * from products where  id > 0";

$statement = $pdo->query($selectAdminProducts);

$adminProducts = $statement->fetchAll(PDO::FETCH_ASSOC);



//выборка товаров по категории когда находишься в списке товаров
//ВОПРОС научиться болле изяшно писать

//НЕ много ли функций проверки htmlspecialchars(strip_tags(trim()));
if (!empty($_GET['category_id']))
{

    $category_id = htmlspecialchars(strip_tags(trim($_GET['category_id'])));

    $selectProductsCategory = "SELECT * from products where status=0 AND category_id= :category_id";

    $statement = $pdo->prepare($selectProductsCategory);
    $statement->execute(['category_id'=>$category_id]);

    $productCategory = $statement->fetchAll(PDO::FETCH_ASSOC);

}


//выборка одного прокта в из списка продуктов и на редактирование вывод

if (!empty($_GET['id'])) {

    $idProduct = htmlspecialchars(strip_tags(trim($_GET['id'])));

    $selectProduct  = "SELECT * from products where id = :idProduct";

    $statement= $pdo->prepare($selectProduct);
    $statement->execute(['idProduct'=>$idProduct]);

    $product = $statement->fetch(PDO::FETCH_LAZY);

}



//Добавление данных о продукте все продукти передаются

if (!empty($_REQUEST['addproduct'])) {

    $nameProduct = htmlspecialchars(strip_tags(trim($_REQUEST['name'])));
    $descriptionProduct = htmlspecialchars(strip_tags(trim($_REQUEST['description'])));
    $textProduct = htmlspecialchars(strip_tags(trim($_REQUEST['text'])));
    $categoryProduct = htmlspecialchars(strip_tags(trim($_REQUEST['category'])));

    if ($_REQUEST['status']) {
        $status = 1;
    }

    $date = date("Y-m-d");

//ВОПРОС Как по другому добавлять файли?
//
//довление картинки на сервер

    if (!empty($_FILES['image']['name'])) {
        $uploaddir = '../images/';
        $name = time();
        $imageProduct = $name . '.' . basename($_FILES['image']['type']);

        move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . $imageProduct);

    } else {
        $imageProduct = null;
    }


    $addProduct = "INSERT INTO `products` SET
name= :nameProduct,
description=:descriptionProduct,
 text=:textProduct,
  image=:imageProduct,
    category_id=:categoryProduct,
   status=:status,
    date=:date";

    $statement = $pdo->prepare($addProduct);
    //добавление в базу данных
    $statement->execute([
        'nameProduct'=>$nameProduct,
        'descriptionProduct'=>$descriptionProduct,
        'textProduct'=>$textProduct,
        'imageProduct'=>$imageProduct,
        'categoryProduct'=>$categoryProduct,
        ':status'=>!empty($status) ?  : $status = 0,
        'date'=>$date
    ]);

    header("Location: /views/admin/adminproduct.php");


}

//Обновление продукта прием данных с формы
if (!empty($_REQUEST['updateproduct'])) {

    $id = $_REQUEST['updateId'];
    $nameProduct = htmlspecialchars(strip_tags(trim($_REQUEST['name'])));
    $descriptionProduct = htmlspecialchars(strip_tags(trim($_REQUEST['description'])));
    $textProduct = htmlspecialchars(strip_tags(trim($_REQUEST['text'])));
    $categoryProduct = htmlspecialchars(strip_tags(trim($_REQUEST['category'])));

    if ($_REQUEST['status']) {
        $status = 1;
    }

    $date = date("Y-m-d");

//удаление картинки
    if (!empty($_FILES['image']['name'])) {
        $uploaddir = '../images/';
        $name = time();
        $imageProduct = $name . '.' . basename($_FILES['image']['type']);
//перемещение картинки в дерикторию images
        move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . $imageProduct);

    } else {

        $imageProduct = htmlspecialchars(strip_tags(trim($_REQUEST['image'])));
    }

    $addProduct = "UPDATE `products`
    SET name=:nameProduct,
description=:descriptionProduct,
 text=:textProduct,
  image=:imageProduct,
    category_id=:categoryProduct,
   status=:status WHERE id =:id";

    $statement = $pdo->prepare($addProduct);
    //Обновление данных в базу данных
    $statement->execute([
        ':nameProduct'=>$nameProduct,
        ':descriptionProduct'=>$descriptionProduct,
        ':textProduct'=>$textProduct,
        ':imageProduct'=>$imageProduct,
        ':categoryProduct'=>$categoryProduct,
        ':status'=>!empty($status) ?  : $status = 0,
        ':id'=>$id
    ]);


  header("Location: /views/admin/adminProduct.php");

}


//функция вывода изображения если его нет в продукте

function getImage ($image)
{
    if($image){
        return $image;
    }

    return  'no-image.png';

}



//Вывод на Mysql версия 1
//вывод всех опубликовыных товаров
//$selectProducts = "SELECT * from products where status=0 AND id > 0";
//
//$resultSelectProducts = mysqli_query($bdConnect, $selectProducts );
//
//for ($products = [];$row = mysqli_fetch_assoc($resultSelectProducts);$products[] = $row);

////вывод всех товародля Админки как опубликованных так и нет

//$selectAdminProducts ="SELECT * from products where  id > 0";
//
//$resultSelectAdminProducts =mysqli_query($bdConnect,$selectAdminProducts);
//
//for ($adminProducts = [];$row = mysqli_fetch_assoc($resultSelectAdminProducts);$adminProducts[] = $row);
//

//выборка товаров по категории когда находишься в списке товаров
//ВОПРОС научиться болле изяшно писать
//if (!empty($_GET['category_id']))
//{
//
//    $id = $_GET['category_id'];
//
//
//
//    $selectProductsCategory = "SELECT * from products where status=0 AND category_id=".$id;
//
//    $result= mysqli_query($bdConnect, $selectProductsCategory);
//
//    for ($productCategory = []; $row = mysqli_fetch_assoc($result); $productCategory[] = $row);
//}

//выборка одного прокта в из списка продуктов
//
//if (!empty($_GET['id'])) {
//
//    $id = htmlspecialchars(strip_tags(trim($_GET['id'])));
//
//    $selectProduct  = "SELECT * from products where id =" . $id;
//
//    $result = mysqli_query($bdConnect,   $selectProduct );
//
//    for ($product = []; $row = mysqli_fetch_assoc($result); $product = $row) ;
//}


//Обновление продукта прием данных с формы
//
//if (!empty($_GET['submit'])) {
//
//    $updateNameProduct = htmlspecialchars(strip_tags(trim($_GET['name'])));
//    $updateIdProduct = htmlspecialchars(strip_tags(trim($_GET['name'])));
//
//    $updateProduct = "UPDATE products SET
//name='" . $updateNameProduct . "' where  id =" .  $updateIdProduct;
//
//    $result = mysqli_query($bdConnect, $updateProduct);
//    header("Location: /views/products.php");
//
//}

////ВОПРОС Как по другому добавлять файли?
////
////довление картинки на сервер
//
//if (!empty($_FILES['image']['name'])) {
//    $uploaddir = '../images/';
//    $name = time();
//    $imageProduct = $name . '.' . basename($_FILES['image']['type']);
//
//    move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . $imageProduct);
//
//} else {
//    $imageProduct = null;
//}
//
//
//$addProduct = "INSERT INTO `products` SET
//name='" . $nameProduct . "',
//description='" . $descriptionProduct . "',
// text='" . $textProduct . "',
//  image='" . $imageProduct . "',
//    category_id='" . $categoryProduct . "',
//   status='" . $status . "',
//    date='" . $date . "'";
//
////добавление в базу данных
//
//$result = mysqli_query($bdConnect, $addProduct);
//header("Location: /views/admin/adminproduct.php");
//
//
//}

//
//
////Обновление продукта прием данных с формы
//if (!empty($_REQUEST['updateproduct'])) {
//
//    $id = $_REQUEST['updateId'];
//    $nameProduct = htmlspecialchars(strip_tags(trim($_REQUEST['name'])));
//    $descriptionProduct = htmlspecialchars(strip_tags(trim($_REQUEST['description'])));
//    $textProduct = htmlspecialchars(strip_tags(trim($_REQUEST['text'])));
//    $categoryProduct = htmlspecialchars(strip_tags(trim($_REQUEST['category'])));
//
//    if ($_REQUEST['status']) {
//        $status = 1;
//    }
//
//    $date = date("Y-m-d");
//
////удаление картинки
//    if (!empty($_FILES['image']['name'])) {
//        $uploaddir = '../images/';
//        $name = time();
//        $imageProduct = $name . '.' . basename($_FILES['image']['type']);
////перемещение картинки в дерикторию images
//        move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir . $imageProduct);
//
//    } else {
//
//        $imageProduct = htmlspecialchars(strip_tags(trim($_REQUEST['image'])));
//    }
//
//    $addProduct = "UPDATE `products`
//    SET name='" . $nameProduct . "',
//description='" . $descriptionProduct . "',
// text='" . $textProduct . "',
//  image='" . $imageProduct . "',
//    category_id='" . $categoryProduct . "',
//   status='" . $status . "',
//    date='" . $date . "' WHERE id = '" . $id . "'";
//
//
//    $result = mysqli_query($bdConnect, $addProduct);
//    header("Location: /views/admin/adminProduct.php");
//
//}
//
//
////функция вывода изображения если его нет в продукте
//
//function getImage ($image)
//{
//    if($image){
//        return $image;
//    }
//
//    return  'no-image.png';
//
//}
