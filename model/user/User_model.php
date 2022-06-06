<?php

    function get_user_all(){
        global $mysqli;
        $query = "SELECT * FROM user";
        $result = mysqli_query($mysqli, $query);
        
        while( $row = mysqli_fetch_array( $result)){
            $data[] = array(
                'id_user' => $row['id_user'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'username' => $row['username'],
                'login_type' => $row['login_type'],
                'pertanyaan_validasi' => $row['pertanyaan_validasi'],
                'answer_validation' => $row['answer_validation'],
            ); // Inside while loop
        }
        return $data;
    }

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

    function forget_model($data){
        global $mysqli;
        $username = $data['username'];
        $query = "UPDATE user SET password = '$data[new_password]' where username = '$username'";
        $pass_new = mysqli_query($mysqli, $query);
        if($pass_new){
            $result = "Password telah diganti";
            return $result;
        }else{
            return NULL;
        }

    }

    function change_profile_model($data){
        global $mysqli;
        $profile = $data;
        //$pass = escape($profile['password']);
        $query = "UPDATE user SET firstname = '$profile[firstname]', lastname = '$profile[lastname]',
                phone = '$profile[phone]', email = '$profile[email]', username = '$profile[username]', 
                pertanyaan_validasi = '$profile[pertanyaan_validasi]', answer_validation = '$profile[answer_validation]' where username = '$profile[username]'";
        $pass_new = mysqli_query($mysqli, $query);
        if($pass_new){
            $result = "Profile telah diganti";
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
                'email' => $data_user['email'],
                'pertanyaan_validasi' => $data_user['pertanyaan_validasi'],
                'answer_validation' => $data_user['answer_validation'],
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
                'pertanyaan_validasi' => $data_user['pertanyaan_validasi'],
                'answer_validation' => $data_user['answer_validation'],
            );
            return $profile_u;
        }else{
            $profile_u = null;
            return $profile_u;
        }
        
    }

?>
