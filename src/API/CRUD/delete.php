<?php
try {
    require_once('../config.php');
    if (isset($_REQUEST['user_subject_id'])) {
        $user_subject_id = $_REQUEST['user_subject_id'];
        $sql = "DELETE FROM db_cv.user_subject WHERE user_subject_id = :user_subject_id";
        $query = $conn->prepare($sql);
        $query->bindParam(':user_subject_id', $user_subject_id, PDO::PARAM_INT);

        $result = $query->execute();
        if ($result) {
            echo 'deleted';
        }
    }else{
        echo 'error';
    }
} catch (PDOException $e) {
    echo $e;
}