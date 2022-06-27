<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsondata = json_decode(file_get_contents("php://input"));
    $answer['username'] = $jsondata->username;
    $answer['id_question'] = $jsondata->id_question;
    $answer['jawaban'] = $jsondata->jawaban;
    $answer['feedback'] = $jsondata->feedback;

    if (!empty($answer['jawaban'])) {
        $profile = cek_profile($answer['username']);
        if(!is_null($profile)){

            if(empty($answer['feedback'])){
                $answer['feedback'] = "Tidak ada feedback yang diberikan";
            }else{
                $answer['feedback'] = $answer['feedback'];
            }
            //dd($answer['feedback']);
            
            $hasil = update_answer($answer,$profile['id_user']);
            if($hasil == 1){
                $result = array(
                    'status' => 'success',
                    'message' => 'Jawaban telah di isi',
                );

                header('Content-Type: application/json');
                echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }else{
                $result = array(
                    'status' => 'error',
                    'message' => "Jawaban tidak terinput"
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

    }else{
        $result = array(
            'status' => 'error',
            'message' => "jawaban kosong"
        );
        
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
?>