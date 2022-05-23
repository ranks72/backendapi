<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    $db = new mysqli();

    $jsondata = json_decode(file_get_contents("php://input"));

    $forget['new_password'] = $jsondata->new_password;
    $forget['username'] = $jsondata->username;
    $pertanyaan_validasi = $jsondata->pertanyaan_validasi;
    $answer_validation = $jsondata->answer_validation;

    if (!empty($forget['username'])) {
        $data_user = cek_username($forget['username']);

        if($data_user == 1){
            $user = cek_data_user($forget['username']);
            //dd($user['pertanyaan_validasi']);
            if($pertanyaan_validasi == $user['pertanyaan_validasi'] && $answer_validation == $user['answer_validation']){
                $forget['new_password'] = SHA1($forget['new_password']);
                $change_password = forget_model($forget);
                //dd($change_password);
                $result = array(
                    'status' => 'success',
                    'message' => $change_password
                );
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }else{
                $result = array(
                    'status' => 'error',
                    'message' => "Validasi salah"
                );
                
                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        }else{
            $result = array(
                'status' => 'error',
                'message' => "Username tidak ditemukan"
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