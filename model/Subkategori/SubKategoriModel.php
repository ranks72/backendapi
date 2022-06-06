<?php
    function get_subkat_all(){
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
        $kategori_new = mysqli_query($mysqli, $query);

        if($kategori_new){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }

    function update_kategori($data){
        global $mysqli;
        //mencegah sql injection
        $query = "UPDATE category SET category = '$data[new_category]' where category = '$data[category]'";
        $kategori_update = mysqli_query($mysqli, $query);

        if($kategori_update){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }

    function delete_kategori($data){
        global $mysqli;
        //mencegah sql injection
        $id = (int)$data['id_category'];
        $query = "DELETE FROM category WHERE id_category = ".$id;
        $kategori_delete = mysqli_query($mysqli, $query);

        if($kategori_delete){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }
?>