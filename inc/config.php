<?php
    include 'dataConnection.php';

    function getUserAccessRoleByID($id)
    {
        global $link;
            
        $query = "select Role from User where id = ".$id;
        
        $rs = mysqli_query($link,$query);
        $row = mysqli_fetch_assoc($rs);
           
        return $row['Role'];
    }
?> 