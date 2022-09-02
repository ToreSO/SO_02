<?php
try {
    require_once('../config.php');
    if (isset($_REQUEST['user_id'])) {
        $user_id = $_REQUEST['user_id'];
        
        $sql = "SELECT 
            db_cv.user_hd.user_id ,
            db_cv.user_hd.user_code ,
            db_cv.user_hd.user_name ,
            db_cv.user_subject.subject_id ,
            db_cv.subject.subject_code ,
            db_cv.subject.subject_name
        FROM db_cv.user_subject
        LEFT JOIN  db_cv.user_hd ON
        db_cv.user_subject.user_id = db_cv.user_hd.user_id
        LEFT JOIN  db_cv.subject ON
        db_cv.user_subject.subject_id = db_cv.subject.subject_id
        WHERE 
        db_cv.user_hd.user_id = :user_id";
        $query = $conn->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($result as $key => $res) {
                $data[$key]['user_id'] = $res->user_id;
                $data[$key]['user_code'] = $res->user_code;
                $data[$key]['user_name'] = $res->user_name;
                $data[$key]['subject_id'] = $res->subject_id;
                $data[$key]['subject_code'] = $res->subject_code;
                $data[$key]['subject_name'] = $res->subject_name;
            }
        } else {
            $data = [];
        }
        echo json_encode($data);
    }
} catch (PDOException $e) {
    $e;
}
