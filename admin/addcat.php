
<?php include '../classes/Category.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php

  $cat =new Category();

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $name =$_POST['name'];
     $insertCat =$cat->catInsert($name);
  }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php
                       if(isset($insertCat)){

                        echo $insertCat;
                       }
                ?>
               <div class="block copyblock"> 
                 <form action="addcat.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="name" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>