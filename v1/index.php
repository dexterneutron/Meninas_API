<?php

if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // Get tag
    $tag = $_POST['tag'];
    // Include Database handler
    require_once '../include/DB_Functions.php';
    $db = new DB_Functions();
    // response Array
    $response = array("tag" => $tag, "success" => 0, "error" => 0);
    // check for tag type
    if ($tag == 'login') {
        // Request type is check Login
        $user = $_POST['usuario'];
        $password = $_POST['password'];
        // check for cuenta
        $cuenta = $db->validarUsuarioAdmin($user, $password);
        if ($cuenta != false) {
            // cuenta found
            // echo json with success = 1
            $response["success"] = 1;
            $response["cuenta"]["admin_username"] = $cuenta["telefono"];
            echo json_encode($response);
        } else {
            // cuenta not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Email o password Incorrecto";
            echo json_encode($response);
        }
    }
}
?>