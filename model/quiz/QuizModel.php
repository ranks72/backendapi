<?php
    function get_question_all(){
        global $mysqli;
        $query = "SELECT * FROM question";
        $result = mysqli_query($mysqli, $query);
        
        while( $row = mysqli_fetch_array( $result)){
            $data[] = array(
                'id_question' => $row['id_question'],
                'id_category' => $row['id_category'],
                'question' => $row['question'],
            ); // Inside while loop
        }
        return $data;
    }

    function get_question_bykategori($kategori){
        global $mysqli;
        $query = "SELECT question.id_question , category.id_category, category.category, question.question FROM `question` 
                    JOIN category on question.id_category = category.id_category 
                    WHERE category.category = '$kategori'";
        $result = mysqli_query($mysqli, $query);
        
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id_question' => $row['id_question'],
                'id_category' => $row['id_category'],
                'category' => $row['category'],
                'question' => $row['question'],
            ); // Inside while loop
        }
        return $data;
    }

    function get_question_byall(){
        global $mysqli;
        $query = "SELECT question.id_question , category.id_category, category.category, question.question FROM `question` 
                    JOIN category on question.id_category = category.id_category";
        $result = mysqli_query($mysqli, $query);
        
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id_question' => $row['id_question'],
                'id_category' => $row['id_category'],
                'category' => $row['category'],
                'question' => $row['question'],
            ); // Inside while loop
        }
        return $data;
    }

    function count_question(){
        global $mysqli;
        $query  = "SELECT question.id_question , category.id_category, category.category, question.question FROM `question` 
                    JOIN category on question.id_category = category.id_category";
        if( $result = mysqli_query($mysqli, $query) ) return mysqli_num_rows($result);
    }

    function count_answer_user($id_user){
        global $mysqli;
        $query  = "SELECT category.category, question.question FROM `feedback`  
                    JOIN question ON feedback.id_question = question.id_question 
                    JOIN category on question.id_category = category.id_category 
                    WHERE feedback.id_user = '$id_user'";
        if( $result = mysqli_query($mysqli, $query) ) return mysqli_num_rows($result);
    }

    function create_answer($data,$id_usern){
        global $mysqli;
        //mencegah sql injection
        $query = "INSERT INTO `feedback`(`id_user`, `id_question`, `cek_answer`) VALUES
                 ('$id_usern','$data[id_question]','0')";
        $answer_new = mysqli_query($mysqli, $query);

        if($answer_new){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }

    function get_question_not_answer($id_user){
        global $mysqli;
        $query  = "SELECT * FROM category";
        $result = mysqli_query($mysqli, $query);
        $question = array();
        $kategori_array = array();
        $question_array = array();
        //$data_question = mysqli_fetch_assoc($result);
        if(!is_null($result)){
            while( $data_kat = mysqli_fetch_array( $result)){
                $kategori_array['id_category'] = $data_kat['id_category'];
                $kategori_array['category'] = $data_kat['category'];
                $kategori_array['description'] = "Deskripsi kuis seharusnya ada disini";
                $kategori_array['shuffleQuestions'] = "false";
                $kategori_array['question'] = array(); // Inside while loop
                //dd();
                $pertanyaan_bykategori  = "SELECT question.id_question, question.question FROM `feedback`  
                                JOIN question ON feedback.id_question = question.id_question 
                                JOIN category on question.id_category = category.id_category 
                                WHERE feedback.id_user = '$id_user' AND category.id_category = '$kategori_array[id_category]'AND feedback.cek_answer = 0";
                $result_question = mysqli_query($mysqli, $pertanyaan_bykategori);
                
                $data_quest = mysqli_fetch_assoc($result_question);
                $question_array['id_question'] = $data_quest['id_question'];
                $question_array['question'] = $data_quest['question'];
                $question_array['duration'] = 60;
                $question_array['shuffleOptions'] = "false";
                $question_array['cek_answer'] = 0;
                array_push($kategori_array['question'],$question_array);

                // while( $data_quest = mysqli_fetch_array($result_question)){
                //     $question_array['id_question'] = $data_quest['id_question'];
                //     $question_array['question'] = $data_quest['question'];
                //     $question_array['duration'] = 60;
                //     $question_array['shuffleOptions'] = "false";
                //     $question_array['cek_answer'] = 0; // Inside while loop

                //     array_push($kategori_array['question'],$question_array);
                // };

                array_push($question,$kategori_array);
            };
            
            // $question = array(
            //     'status' => 'success',
            //     'category' => $data_question['category'],
            //     'question' => $data_question['question'],
            // );
            return $question;
        }else{
            $question = array(
                'status' => 'success',
                'question' => 'survei sudah dijawab',
            );
            return $question;
        }
    }

    function update_answer($answer_data,$id_user){
        global $mysqli;
        //dd($answer_data);
        $jawaban_query = mysqli_query($mysqli, "SELECT * FROM result WHERE result = '$answer_data[jawaban]'");
        $data_jawaban = mysqli_fetch_assoc($jawaban_query);
        //dd($data_jawaban);
        $query_answer = "UPDATE feedback SET id_result = '$data_jawaban[id_result]', 
                                             cek_answer = 1 , 
                                             feedback = '$answer_data[feedback]' 
                                             where id_user = '$id_user' AND id_question = '$answer_data[id_question]'";
        $answer_update = mysqli_query($mysqli, $query_answer);
        if($answer_update){
            $result = 1;
            return $result;
        }else{
            return NULL;
        }
    }
?>