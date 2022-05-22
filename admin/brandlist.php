<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>


<?php 

   $brand =new Brand();

   if(isset($_GET['delCat'])){

   	$id =$_GET['delCat'];

   	$delBrand =$brand->delCatById($id);
   }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                       if(isset($delBrand)){

                        echo $delBrand;

                       }
                       ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
                         $getBrand=$brand->getAllBrand();

                         if($getBrand){
                              $i=0;
                         	while($result =$getBrand->fetch_assoc()){

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

