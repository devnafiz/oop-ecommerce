
<?php include '../classes/Brand.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

  if(!isset($_GET['brandid']) || $_GET['brandid'] ==Null){

    echo "<script>window.location = 'brandlist.php'</script>";
  }else{

    $id =$_GET['brandid'];
  }

?>

<?php

  $brand =new Brand();

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $name =$_POST['name'];
     $insertUpdate =$brand->BrandUpdate($name,$id);
  }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
                <?php
                       if(isset($insertUpdate)){

                        echo $insertUpdate;
                       }
                ?>


                <?php 

                  $getBrand=$brand->getBrandById($id);


                  if($getBrand){

                    while($result=$getBrand->fetch_assoc()){


                 

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