<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $alluser = get_user_all();
    //dd($alluser);

    if(!is_null($alluser)){
        $hasil = $alluser;
        $result = array(
            'status' => 'success',
            'data' => $hasil,
        );

        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    }else{
        $result = array(
            'status' => 'error',
            'message' => "Data tidak ditemukan"
        );
        
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
    
?>