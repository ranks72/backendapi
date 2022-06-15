<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    if (isset($_GET['username']) && isset($_GET['category'])) {
        $profile = cek_profile($_GET['username']);
        //dd($profile);
        if(!is_null($profile)){
            $question = get_question_bykategori($_GET['category']);
            $count_answer = count_answer_user($profile['id_user'],$_GET['category']);
            //dd($count_answer);

            if($count_answer = 0){
                $count_rows = count_question($_GET['category']);
                for($i=0; $i < $count_rows; $i++){
                    $test = create_answer($question[$i],$profile['id_user']);
                }
                $result = get_question_not_answer($_GET['category'],$profile['id_user']);

            }else{
                $result = get_question_not_answer($_GET['category'],$profile['id_user']);
            }
            
            //dd($profile['id_user']);
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
    }else {
        $result = array(
            'status' => 'error',
            'message' => "Invalid Request"
        );
        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
?>