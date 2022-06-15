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

    function count_question($kategori){
        global $mysqli;
        $query  = "SELECT question.id_question , category.id_category, category.category, question.question FROM `question` 
                    JOIN category on question.id_category = category.id_category 
                    WHERE category.category = '$kategori'";
        if( $result = mysqli_query($mysqli, $query) ) return mysqli_num_rows($result);
    }

    function count_answer_user($id_user, $kategori){
        global $mysqli;
        $query  = "SELECT category.category, question.question FROM `feedback`  
                    JOIN question ON feedback.id_question = question.id_question 
                    JOIN category on question.id_category = category.id_category 
                    WHERE feedback.id_user = '$id_user' AND category.category = '$kategori'";
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

    function get_question_not_answer($kategori,$id_user){
        global $mysqli;
        $query  = "SELECT category.category, question.question FROM `feedback`  
                    JOIN question ON feedback.id_question = question.id_question 
                    JOIN category on question.id_category = category.id_category 
                    WHERE feedback.id_user = '$id_user' AND category.category = '$kategori' AND feedback.cek_answer = 0";
        $result = mysqli_query($mysqli, $query);
        $data_question = mysqli_fetch_assoc($result);
        if(!is_null($data_question)){
            $question = array(
                'status' => 'success',
                'category' => $data_question['category'],
                'question' => $data_question['question'],
            );
            return $question;
        }else{
            $question = array(
                'status' => 'success',
                'question' => 'survei sudah dijawab',
            );
            return $question;
        }
    }
?>