<?php
try {
    require_once('../config.php');

    $sql = "SELECT db_cv.user_hd.* FROM db_cv.user_hd";
    $query = $conn->prepare($sql);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($result as $key => $res) {
            $data[$key]['user_id'] = $res->user_id;
            $data[$key]['user_code'] = $res->user_code;
            $data[$key]['user_name'] = $res->user_name;
        }
    } else {
        $data = [];
    }
    echo json_encode($data);
} catch (PDOException $e) {
    $e;
}
