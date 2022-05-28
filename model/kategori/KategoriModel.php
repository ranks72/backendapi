<?php
    function get_all(){
        global $mysqli;
        $query = "SELECT * FROM category";
        $result = mysqli_query($mysqli, $query);
        
        while( $row = mysqli_fetch_array( $result)){
            $data[] = array(
                'id_category' => $row['id_category'],
                'category' => $row['category'],
            ); // Inside while loop
        }
        return $data;
    }
    
?>