
<?php


   include_once '../lib/Database.php';
   include_once '../helpers/Format.php';
 
?>

<?php

 /**
  * category
  * 
  */
 class Category {
 	private $db;
 	private $fm;
 	
      public function __construct()
	 	{
	 		$this->db = new Database();
	 		$this->fm =new Format();
	 	}

 	public function catInsert($name){

 		  $name =$this->fm->validation($name);
         
          $name =mysqli_real_escape_string($this->db->link, $name);

          if(empty($name)){

          	 $msg='Cat Name Must not empty';
          	 return $msg;
          }else{

          	$query ="INSERT INTO tbl_category(name) VALUES ('$name') ";

          	 $catInsert =$this->db->insert($query);

          	 if($catInsert){
          	 	$msg = 'Category inserted Succefully';
          	 	return $msg;
          	 }else{

              $msg = '<span class="error">Category not inserted</span> ';
          	 	return $msg;
          	 }
          }

 	}


    public function getAllCat(){
         $query="SELECT * FROM tbl_category ORDER BY id DESC";

         $result =$this->db->select($query);
         return $result;

    }
 }



?>