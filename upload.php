<?php
$ds          = DIRECTORY_SEPARATOR;
 
$storeFolder = 'uploads';

if (!file_exists($storeFolder)) {
    mkdir($storeFolder, 0777, true);
	touch($storeFolder . $ds . "index.html");
}

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];           
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
    $targetFile =  $targetPath . generateRandomString() . $_FILES['file']['name'];
 
    move_uploaded_file($tempFile,$targetFile);
     
}
?>   