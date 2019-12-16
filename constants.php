<?php
    define("ROOT", "UBung"); //Application root folder
    //define("ROOT", "BCS22432019/CA17100"); //Application root folder

    //Roles
    define("ADMIN", "Admin");
    define("CUSTOMER", "Customer");
    define("OWNER", "Owner");
    define("DESPATCHER", "Despatcher");
    define("UNAUTHORIZED", "<span style='color:red; font-weight:bold'>Sorry, this action is unauthorized. Ask administrator for more details.</span>");

    function IsInRole($role) {
        if ($_SESSION['role'] == $role) {
            return true;
        }
    }

    function CheckRole($roles) {
        if (is_array($roles))
        {
            foreach($roles as $role){
                if ($_SESSION['role'] == $role) {
                    return;
                }
            }
        }
        else if ($_SESSION['role'] == $roles) {
            return;
        }
        echo UNAUTHORIZED;
        exit;
    }   
    
    function ErrorMessage($message) {
        echo "<div class='alert alert-danger' role='alert'>" . $message . "</div>";  
    }   

    function SuccessMessage($message) {
        echo "<div class='alert alert-success' role='alert'>" . $message . "</div>";  
    }   
?>