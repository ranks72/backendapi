<?php
    require_once '../core/init.php';
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    if (isset($_GET['username'])) {
        $profile = cek_profile($_GET['username']);
        //dd($profile);
        if(!is_null($profile)){
            $question = get_question_byall();
            $count_question = count_answer_user($profile['id_user']);

            if($count_question == 0){
                $count_rows = count_question();
                for($i=0; $i < $count_rows; $i++){
                    $test = create_answer($question[$i],$profile['id_user']);
                }
                $kategori = get_subkat_all();
                $hasil = get_question_not_answer($profile['id_user']);
                $result = array(
                    'status' => 'success',
                    'kategori' => $hasil,
                );
            }else{
                // $kategori = get_subkat_all();
                // dd($kategori);
                $hasil = get_question_not_answer($profile['id_user']);
                //dd($hasil);
                $result = array(
                    'status' => 'success',
                    'message' => $hasil,
                );
                
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