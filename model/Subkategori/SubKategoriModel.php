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
    
    function create_kategori($data){
        global $mysqli;
        //mencegah sql injection
        $query = "INSERT INTO category(category) VALUES ('$data[category]')";
        $user_new = mysqli_query($mysqli, $query);

        if($user_new){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }
?>