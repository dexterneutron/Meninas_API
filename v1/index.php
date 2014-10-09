<?php

require_once '../include/DbHandler.php';
require '.././libs/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);
 
    // setting response content type to json
    $app->contentType('application/json');
 
    echo json_encode($response);
}

 
$app->post('/loginAdmin', function() use ($app) {

            $username = $app->request->post('username');
            $password = $app->request->post('password');
            $response = array();
            
            
            $db = new DbHandler();
            // check for correct email and password
            
            $result=$db->validarUsuarioAdmin($username, $password);
               if ($result) {
                
                if ($username != NULL) {
                    $response["error"] = false;
                    $response['username'] = $result['admin_username'];
                  //  $response['apiKey'] = $user['api_key'];
                } else {
                    // unknown error occurred
                    $response['error'] = true;
                    $response['message'] = "An error occurred. Please try again";
                }
            } else {
                // user credentials are wrong
                $response['error'] = true;
                $response['UserName'] = $result['admin_username'];
                

                $response['message'] = 'Login Fallido, Usuario o Clave Incorrectos';
            }
            echoRespnse(200, $response);
        });



$app->run();





































/*
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
}*/
?>