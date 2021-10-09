<?php
include('database.php');

if(isset($_POST['submit'])){
//MATCH page id exist or not

    $page_id=616;
    $query=$connection->query("SELECT p_id from project Where p_id = $page_id"); 

 if(mysqli_num_rows($query)){

    $folderPath = "assets/images/";
    $extensions = array('jpg','png','jpeg','gif');

    //file upload
    foreach( $_FILES['image']['tmp_name'] as $key => $value){

        $fileName = $_FILES['image']['name'][$key];
        $fileTmpName = $_FILES['image']['tmp_name'][$key];
        $img_ext = pathinfo($fileName, PATHINFO_EXTENSION );
        
        if( in_array($img_ext,$extensions)){
            move_uploaded_file( $fileTmpName, $folderPath.$fileName);

            $insert = $connection->query("INSERT INTO gallery (p_id, path) VALUES ('$page_id','$fileName')"); 
            if($insert){ 
                    echo 'upload';
            }else{ 
                echo 'not upload';
            }
        
        }else{
            echo 'only upload jpg, png, jpeg, gif';
        }

    }
    
 }
   
    
   
        
    
}

?>