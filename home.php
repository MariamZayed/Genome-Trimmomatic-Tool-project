<php

if(isset($_POST["Submit"])){
     
     $target_dir = "uploads/";
     folderDestintion = $target_dir . basename($_FILES["ref"]["name"]);
     $fileDestination = $target_dir . basename($_FILES["ref"]["name"]);
     $refActualExt = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     
     //get the html data
     $adapter       = $_POST["adapter"];
     $uploaded_file = $_FILES['ref'];//so this is now an array cause it holds more than 1 file
                                      // and all the files that the user uploaded
     
     //getting all information of the uploaded files..extracting
     $fileName    = $uploaded_file['name'];//arr
     $fileTmpName = $uploaded_file['tmp_name'];//arr
     $fileSize    = $uploaded_file['size'];//arr
     $fileError   = $uploaded_file['error'];//arr
     $fileType    = $uploaded_file['type'];//arr
     
     // this is to store the adapter seqence in a file.txt
     // Store the data
     fopen("adapterSequence.txt","a+");
     file_put_contents('adapterSequence.txt', $adapter);
     
     //this is the only allowes extentions
     $alowed = array('fasta','fastaq');

        if ($fileError === 4) {
               echo "<div>You have to select a file!</div>";  
?>
               <a href="index4.html"><div>Go Back To Upload Page</div></a>            
<?php
               } 
 

           //cheching if the user inserted one of primtted extentions
           elseif (in_array($refActualExt,$alowed)){// الابرخ وكومة القش

           //cheching if the uploaded file has no error it self
           //checking if the user uploaded a file and not just pressed upoload without really uploading a file
           //error nummber 4 means he didnt upload afile and pressed the button and 0 means all clear
           if ($fileError === 0){

               if ($fileSize < 10000000){

                   //moving the file from its temporary place to it's new stabled place weith its new name
                    move_uploaded_file($fileTmpName, $fileDestination);

                   echo '<div>Your File is Uploaded Successfuly!</div>';
   ?>
               <a href="index4.html"><div>Go Back To Upload Page</div></a>
   <?php

               } else {
                   echo '<div>Your File Number Is Too Big!</div>';
   ?>
               <a href="index4.html"><div>Go Back To Upload Page</div></a>
   <?php
               }
           } else{ 
               echo 'There Was An Error Uploading Your File Number!';
   ?>
               <a href="index4.html"><div>Go Back To Upload Page</div></a>
   <?php
           }
           } else{
            echo 'File Number Type Is Not Allowed. ';
   ?>
               <a href="index4.html"><div>Go Back To Upload Page</div></a>
   <?php
           }
   }
   /* END Uploading a File*/
?>