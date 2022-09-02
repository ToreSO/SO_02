<?php 
try {
    require_once('../config.php');
    if (isset($_REQUEST['subject_code'])) {
        $subject_code = $_REQUEST['subject_code'];
    }
    if (isset($_POST['subject_name'])) {
        $subject_name = $_REQUEST['subject_name'];
    }
    if (isset($_REQUEST['subject_id'])) {
        $subject_id =  $_REQUEST['subject_id'];
    }

    $sql = "UPDATE db_cv.user_subject SET subject_code = :subject_code , subject_name = :subject_name WHERE subject_id = :subject_id";
    $query = $conn->prepare($sql);
        $query->bindParam(':subject_code', $subject_code, PDO::PARAM_STR);
        $query->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $query->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);

        $result = $query->execute();
        if ($result) {
            echo 'updated';
        }
    } catch (PDOException $e) {
        $e;
    }