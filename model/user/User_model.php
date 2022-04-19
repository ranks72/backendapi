<?php
//-------------- mendaftarkan user -------------------//
    function register_model($data){
        global $mysqli;
        //mencegah sql injection
        $username = $data['username'];
        //dd(gettype($username));
        $pass = escape($data['password']);
        $query = "INSERT INTO user(firstname, lastname, phone, email, username, password, login_type, pertanyaan_validasi, answer_validation) 
                    VALUES('$data[firstname]', '$data[lastname]', '$data[phone]', '$data[email]', '$username', '$pass', '$data[login_type]', '$data[pertanyaan_validasi]', '$data[answer_validation]')";
        $user_new = mysqli_query($mysqli, $query);

        if($user_new){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }
    
    //---- mencegah sql injection -----//
    function escape($data){
        global $mysqli;
        return mysqli_real_escape_string($mysqli, $data);
    }
    
    //--- mengecek username apakah sudah terdaftar atau belum ---//
    function cek_username($name){
        global $mysqli;
        $query = "SELECT * FROM user WHERE username = '$name'";
        if( $result = mysqli_query($mysqli, $query) ) return mysqli_num_rows($result);
    }

    //--- mengecek username dan password sudah sesuai atau belum ---//
    function cek_pass_user($name , $pass){
        global $mysqli;
        $query  = "SELECT * FROM user WHERE username = '$name' && password = '$pass'";
        if( $result = mysqli_query($mysqli, $query) ) return mysqli_num_rows($result);
    }
    
    //----------------- cek data user ------------------//
    function cek_data_user($username){
        global $mysqli;
        //mencegah sql injection
        //$nama = escape($name);
        //$password = escape($pass);
        
        $query  = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($mysqli, $query);
        $data_user = mysqli_fetch_array($result);
        if(!is_null($data_user)){
            $user = array(
                'status' => 'success',
                'id_user' => $data_user['id_user'],
                'username' => $data_user['username'],
                'login_type' => $data_user['login_type'],
                'email' => $data_user['email']
            );
            return $user;
        }else{
            $user = null;
            return $user;
        }    
    }

    function cek_profile($username){
        global $mysqli;
        $nama = escape($username);
        $query  = "SELECT * FROM user WHERE username = '$nama'";
        $result = mysqli_query($mysqli, $query);
        $data_user = mysqli_fetch_assoc($result);
        //dd($data_user);
        if(!is_null($data_user)){
            $profile_u = array(
                'status' => 'success',
                'id_user' => $data_user['id_user'],
                'firstname' => $data_user['firstname'],
                'lastname' => $data_user['lastname'],
                'phone' => $data_user['phone'],
                'email' => $data_user['email'],
                'username' => $data_user['username'],
                'login_type' => $data_user['login_type'],
            );
            return $profile_u;
        }else{
            $profile_u = null;
            return $profile_u;
        }
        
    }

?>
