<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsondata = json_decode(file_get_contents("php://input"));
    $change['username'] = $jsondata->username;
    $change['password'] = $jsondata->password;
    $change['firstname'] = $jsondata->firstname;
    $change['lastname'] = $jsondata->lastname;
    $change['phone'] = $jsondata->phone;
    $change['email'] = $jsondata->email;
    $change['pertanyaan_validasi'] = $jsondata->pertanyaan_validasi;
    $change['answer_validation'] = $jsondata->answer_validation;

    if (!empty($change['username']) && !empty($change['password'])) {
        $user = cek_username($change['username']);
        
        if($user == 1){
            $change['password'] = SHA1($change['password']);
            $change_profile = change_profile_model($change);
            //dd($change_profile);
            $result = array(
                'status' => 'success',
                'message' => $change_profile
            );
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }else{
            $result = array(
                'status' => 'error',
                'message' => "Username tidak ditemukan"
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