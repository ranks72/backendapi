<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsondata = json_decode(file_get_contents("php://input"));

    if (!empty($jsondata->username) && !empty($jsondata->password)) {
        
        $user = cek_data_user($jsondata->username);//validasi username
    
        if(!is_null($user)){
            $pass_user = sha1($jsondata->password);
            $validasi_pass = cek_pass_user($jsondata->username, $pass_user);//validasi username password
            //dd($validasi_pass);

            //jika berhasil login
            if($validasi_pass == 1){
                $result = array(
                    'status' => 'success',
                    'id_user' => $user['id_user'],
                    'username' => $user["username"],
                    'login_type' => $user["login_type"],
                    'email' => $user["email"]
                );
    
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