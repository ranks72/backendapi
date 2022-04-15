<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        
        $user = cek_data_user($_POST['username']);//validasi username
        //dd($user);
        if(!is_null($user)){
            $pass_user = sha1($_POST['password']);
            $validasi_pass = cek_pass_user($_POST['username'], $pass_user);//validasi username password
            //dd($validasi_pass);

            //jika berhasil login
            if($validasi_pass == 1){
                $result = $user;
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }else{
                $result = array(
                    'status' => 'error',
                    'message' => "password salah"
                );
                
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }     
        }else{
            $result = array(
                'status' => 'error',
                'message' => "username tidak ditemukan"
            );
            
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    } else {
        $result = array(
            'status' => 'error',
            'message' => "username atau password kosong"
        );
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
?>