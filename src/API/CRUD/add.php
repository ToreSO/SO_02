<?php 
try {
    require_once('../config.php');
    $sql = "INSERT INTO db_cv.user_hd(id,user_code,user_name,user_career_id) VALUES ";
    foreach ($json_item as $value) {
        $insertQuery[] = '(
        :user_code' . $n . ',
        :user_name' . $n . ',
        :user_career_id' . $n . '
        )';
        $insertData['user_code' . $n] = $value['user_code'];
        $insertData['user_name' . $n] = $value['user_name'];
        $insertData['user_career_id' . $n] = $value['user_career_id'];
        $n++;
    }
    if (!empty($insertQuery)) {

        $sql .= implode(', ', $insertQuery);
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($insertData);
        if ($result) {
            echo 'inserted';
        }
        else {
            echo 'error';
        }
    }
} catch (PDOException $e) {
    echo $e;
    echo 'error';
}