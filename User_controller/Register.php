<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsondata = json_decode(file_get_contents("php://input"));

    $regis['username'] = $jsondata->username;
    $regis['password'] = $jsondata->password;
    $regis['firstname'] = $jsondata->firstname;
    $regis['lastname'] = $jsondata->lastname;
    $regis['phone'] = $jsondata->phone;
    $regis['email'] = $jsondata->email;
    $regis['login_type'] = $jsondata->login_type;

    if (!empty($regis['username'])) {
        $data_user = cek_username($regis['username']);
        //dd($data_user);
        if($data_user == 0){
            
            $regis['password'] = SHA1($regis['password']);
            $user = register_model($regis);
            //dd($user);
            if($user == 1){
                $user = cek_data_user($regis['username']);
                $result = array(
                    'status' => 'success',
                    'username' => $user["username"],
                );
    
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }else{
                $result = array(
                    'status' => 'error',
                    'message' => "username tidak ditemukan"
                );
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }

        }else{
            $result = array(
                'status' => 'error',
                'message' => "Username telah digunakan"
            );
            
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }else{
        $result = array(
            'status' => 'error',
            'message' => "Username kosong"
        );
        
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
?>