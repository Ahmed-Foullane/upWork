<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Categories</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/assets/css/admin.css">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include_once dirname(dirname(__DIR__))."/components/admin/header.php"; ?>
<?php include_once dirname(dirname(__DIR__))."/components/admin/sidebare.php"; ?>
<?php 
use app\models\CategorieModel;
?>

<section class="teachers">
    <h1 class="heading">Create Categories</h1>

    <form action="/category/createCategory" method="post" class="search-tutor">
        <input type="text" name="name" placeholder="create category..." required maxlength="100">
        <button type="submit" class="fa-regular fa-square-plus" name="search_tutor"></button>
    </form>

    <div class="box-container">
        <?php
        $Categorie = new CategorieModel();
        $categories = $Categorie->getAllCategories();
        foreach ($categories as $category):
         ?>
            <div class='box'>
                <div class='tutor'>
                    <div class='info' style="margin-left: 20px">
                        <h3><?= $category->getName();  ?></h3>
                    </div>
                </div>
                <div stule="display: flex;">

                    <a href="/category/deletCategory?id=<?=$category->getId()?>" class="inline-btn bg-[#ff3300]" style="background-color: orangered;">delete</a>
                    <a onclick="handelShowUpdateForm(true,'<?= $category->getName();  ?>', <?= $category->getId();  ?>)"  class="inline-btn bg-[#ff3300]" style="background-color: #4463ad;">Update</a>
                </div>
            </div>
            
        <?php 
    endforeach;
     ?>
    </div>
</section>

    <section class="form-container">

   <form action="/category/updateCategory" method="post" enctype="multipart/form-data">
      <h3>Update Category</h3>
      <p>new name</p>
      <input type="text" name="name" placeholder="enter update categroy" required maxlength="50" class="box update">
      <input type="text" name="id" hidden class="id" >
      <div style="display: flex; justify-content: space-between;">
          <button value="" name="submit" class="btn " style="background-color: orangered">Update</button>
          <button onclick="handelShowUpdateForm(false, '')" class='btn'>Cancel</button>
      </div>
   </form>
</section>
<script src="/assets/js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>