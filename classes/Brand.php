
<?php


   include_once '../lib/Database.php';
   include_once '../helpers/Format.php';
 
?>

<?php

 /**
  * category
  * 
  */
 class Brand {
 	private $db;
 	private $fm;
 	
      public function __construct()
	 	{
	 		$this->db = new Database();
	 		$this->fm =new Format();
	 	}

 	public function brandInsert($name){

 		  $name =$this->fm->validation($name);
         
          $name =mysqli_real_escape_string($this->db->link, $name);

          if(empty($name)){

          	 $msg='Cat Name Must not empty';
          	 return $msg;
          }else{

          	$query ="INSERT INTO tbl_brand(name) VALUES ('$name') ";

          	 $brandInsert =$this->db->insert($query);

          	 if($brandInsert){
          	 	$msg = 'Brand inserted Succefully';
          	 	return $msg;
          	 }else{

              $msg = '<span class="error">Brand not inserted</span> ';
          	 	return $msg;
          	 }
          }

 	}


    public function getAllCat(){
         $query="SELECT * FROM tbl_category ORDER BY id DESC";

         $result =$this->db->select($query);
         return $result;

    }


    public function getCatById($id){

          $query="SELECT * FROM tbl_category WHERE id ='$id'";

         $result =$this->db->select($query);
         return $result;

    }

    public function catUpdate($name,$id){

           $name =$this->fm->validation($name);
         
          $name =mysqli_real_escape_string($this->db->link, $name);
         $id =mysqli_real_escape_string($this->db->link, $id);

          if(empty($name)){

             $msg='Cat Name Must not empty';
             return $msg;
          }else{

            $query ="UPDATE tbl_category 

               SET 
               name='$name'
               WHERE id ='$id'
            ";

            $updated =$this->db->update($query);
            if($updated){
                $msg = 'Category Update Succefully';
                return $msg;

            }else{

                  $msg = '<span class="error">Category not update</span> ';
                return $msg;

            }
          }
    }



    public function delCatById($id){

        $query="DELETE FROM tbl_category WHERE id ='$id'";

       // print_r( $query);die();

        $delData = $this->db->delete($query);

        if($delData){
             $msg = 'Category  Succefully deleted';
                return $msg;
        }else{

           $msg = 'Category  Succefully not deleted';
                return $msg;
        }
    }
 }



?>