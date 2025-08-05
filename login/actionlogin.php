<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['send']) ){
        function test_input($data){
            $data = htmlspecialchars($data); 
            $data = stripslashes($data); 
            $data = trim($data); 
            return $data ; 
        }
        $name = test_input($_POST['name']);
        $pwd = test_input($_POST['pwd']);

        if(!empty($name) && !empty($pwd)){

        }else{
            // you leav an empty input !
            header('location:login.php?p=2'); 
            exit();
        }
    }else{
        // enter yoru data !
        header('location:login.php?p=1'); 
        exit();
    }
?>