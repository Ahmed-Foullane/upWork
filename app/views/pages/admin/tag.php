<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Tags</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/assets/css/admin.css">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include_once dirname(dirname(__DIR__))."/components/admin/header.php"; ?>
<?php include_once dirname(dirname(__DIR__))."/components/admin/sidebare.php"; ?>
<?php 
use app\models\TagModel;
?>

<section class="teachers">
    <h1 class="heading">Create Tags</h1>

    <form action="/tag/createTag" method="post" class="search-tutor">
        <input type="text" name="name" placeholder="create Tag..." required maxlength="100">
        <button type="submit" class="fa-regular fa-square-plus" name="search_tutor"></button>
    </form>

    <div class="box-container">
        <?php
        $Tag = new TagModel();
        $Tags = $Tag->getAllTags();
        foreach ($Tags as $Tag):
         ?>
            <div class='box'>
                <div class='tutor'>
                    <div class='info' style="margin-left: 20px">
                        <h3><?= $Tag->getName();  ?></h3>
                    </div>
                </div>
                <div stule="display: flex;">

                    <a href="/Tag/deletTag?id=<?=$Tag->getId()?>" class="inline-btn bg-[#ff3300]" style="background-color: orangered;">delete</a>
                    <a onclick="handelShowUpdateForm(true,'<?= $Tag->getName();  ?>', <?= $Tag->getId();  ?>)"  class="inline-btn bg-[#ff3300]" style="background-color: #4463ad;">Update</a>
                </div>
            </div>
            
        <?php 
    endforeach;
     ?>
    </div>
</section>

    <section class="form-container">

   <form action="/Tag/updateTag" method="post" enctype="multipart/form-data">
      <h3>Update Tag</h3>
      <p>new name</p>
      <input type="text" name="name" placeholder="enter update Tag" required maxlength="50" class="box update">
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