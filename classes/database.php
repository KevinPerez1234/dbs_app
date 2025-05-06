<?php 

class database{
function opencon(): PDO {
    return new PDO (
    'mysql:host=localhost;
    dbname=dbs_app',
    username: 'root',
    password: '');
                  
    }   

    function signupUser($first_name, $last_name, $username, $password){
    $con = $this->opencon();
    try {
        $con->beginTransaction();
        $stmt = $con->prepare("INSERT INTO Admin (admin_FN, admin_LN, 
        admin_username, admin_password) VALUES (?,?,?,?)");
        $stmt->execute([$first_name, $last_name, $username, $password]);
        // Get newly inserted user_id
        $userId = $con->lastInsertId();
        $con->commit();
        return $userId;
    }catch (PDOException $e) {
        $con->rollBack();
        return false;
    }
 }
}
?>