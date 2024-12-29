<?php
//Nombre de la sesion del proyecto
function getNameSesion()
{
    return ["name" => SESION_NAME];
}
//Retorla la url del proyecto
function base_url()
{
    return BASE_URL;
}
//Retorla la url de Assets
function media()
{
    return BASE_URL . "Assets";
}
function header_template($data = "")
{
    $view_header = "Views/Template/{$data['page_template']['head']}";
    require_once($view_header);
}
function footer_template($data = "")
{
    $view_footer = "Views/Template/{$data['page_template']['foot']}";
    require_once($view_footer);
}
//Muestra información formateada
function dep($data)
{
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}
function getModal(string $nameModal, $data)
{
    $view_modal = "Views/Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}
//Envio de correos
function sendEmail($data, $template)
{
    $asunto = $data['asunto'];
    $emailDestino = $data['email'];
    $empresa = NOMBRE_REMITENTE;
    $remitente = EMAIL_REMITENTE;
    //ENVIO DE CORREO
    $de = "MIME-Version: 1.0\r\n";
    $de .= "Content-type: text/html; charset=UTF-8\r\n";
    $de .= "From: {$empresa} <{$remitente}>\r\n";
    ob_start();
    require_once("Views/Template/Email/" . $template . ".php");
    $mensaje = ob_get_clean();
    $send = mail($emailDestino, $asunto, $mensaje, $de);
    return $send;
}

function sessionUser(int $idpersona)
{
    require_once("Models/LoginModel.php");
    $objLogin = new LoginModel();
    $request = $objLogin->sessionLogin($idpersona);
    return $request;
}

//Elimina exceso de espacios entre palabras
function strClean($strCadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>", "", $string);
    $string = str_ireplace("</script>", "", $string);
    $string = str_ireplace("<script src>", "", $string);
    $string = str_ireplace("<script type=>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1'='1", "", $string);
    $string = str_ireplace('OR "1"="1"', "", $string);
    $string = str_ireplace('OR ´1´=´1´', "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace("LIKE ´", "", $string);
    $string = str_ireplace("OR 'a'='a", "", $string);
    $string = str_ireplace('OR "a"="a', "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    return $string;
}
//Genera una contraseña de 10 caracteres
function passGenerator($length = 10)
{
    $pass = "";
    $longitudPass = $length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena = strlen($cadena);

    for ($i = 1; $i <= $longitudPass; $i++) {
        $pos = rand(0, $longitudCadena - 1);
        $pass .= substr($cadena, $pos, 1);
    }
    return $pass;
}
//Genera un token
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    $token = $r1 . '-' . $r2 . '-' . $r3 . '-' . $r4;
    return $token;
}
//Formato para valores monetarios
function formatMoney($cantidad)
{
    $cantidad = number_format($cantidad, 2, SPD, SPM);
    return $cantidad;
}
//Funcion que permite verificar si esta en sesion activa
function isLogin()
{
    session_start(['name' => SESION_NAME]);
    session_regenerate_id(true);
    if (empty($_SESSION['login'])) {
        header('Location: ' . base_url() . 'login');
    }
}
//Funcion que covierte el array en json de manera profesional
function toJson($data)
{
    return json_encode($data, JSON_UNESCAPED_UNICODE);
}
//function que activa la clase del menu de forma dinamica
function activeMenu($data, int $page_id)
{
    if ($data['page_id'] == $page_id) {
        return "active-menu-item";
    }
}