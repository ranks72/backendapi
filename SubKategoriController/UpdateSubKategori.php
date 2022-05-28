<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsondata = json_decode(file_get_contents("php://input"));
    $kategori['category'] = $jsondata->category;
    $kategori['new_category'] = $jsondata->new_category;

    if (!empty($kategori['category'])) {
        $hasil = update_kategori($kategori);
        if($hasil == 1){
            $result = array(
                'status' => 'success',
                'message' => 'Kategori diubah',
            );

            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }else{
            $result = array(
                'status' => 'error',
                'message' => "hasil tidak terinput"
            );
            header('Content-Type: application/json');
            echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

    }else{
        $result = array(
            'status' => 'error',
            'message' => "Kategori kosong"
        );
        
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
?>