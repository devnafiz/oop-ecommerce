﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>


<?php 

   $cat =new Category();

   if(isset($_GET['delCat'])){

   	$id =$_GET['delCat'];

   	$delCat =$cat->delCatById($id);
   }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                       if(isset($delCat)){

                        echo $delCat;

                       }
                       ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
                         $getCat=$cat->getAllCat();

                         if($getCat){
                              $i=0;
                         	while($result =$getCat->fetch_assoc()){

                               $i++;
                         	
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="catEdit.php?catid=<?php echo $result['id'];?>">Edit</a> || <a href="?delCat=<?php echo $result['id'];?>" onclick="return confirm('Are you sure?')">Delete</a></td>
						</tr>

						<?php   }
                             }

                          ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

