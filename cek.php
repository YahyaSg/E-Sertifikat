<?php 
    if(isset($_GET)){
        $no = $_GET['no'];
        $subsno = substr($no,0,1);
        var_dump($subsno);
    }
?>