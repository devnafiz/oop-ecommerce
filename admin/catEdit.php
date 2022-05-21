
<?php include '../classes/Category.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

  if(!isset($_GET['catid']) || $_GET['catid'] ==Null){

    echo "<script>window.location = 'catlist.php'</script>";
  }else{

    $id =$_GET['catid'];
  }

?>

<?php

  $cat =new Category();

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $name =$_POST['name'];
     $insertUpdate =$cat->catUpdate($name,$id);
  }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <?php
                       if(isset($insertUpdate)){

                        echo $insertUpdate;
                       }
                ?>


                <?php 

                  $getCat=$cat->getCatById($id);


                  if($getCat){

                    while($result=$getCat->fetch_assoc()){


                 

                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['name'];?> " class="medium" name="name" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php

                         }
                  }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>