<?php

use RDSystems\Captcha;

require_once "./captcha/captcha.php";
$captcha = new Captcha();
if (count($_POST) > 0) {
    $userCaptcha = filter_var($_POST["captcha_code"], FILTER_SANITIZE_STRING);
    $isValidCaptcha = $captcha->validateCaptcha($userCaptcha);
    if ($isValidCaptcha) {
        $sucess_message = "Validação concluída com sucesso!";
    } else {
        $error_message = "Código errado!";
    }
}
?>
<html>

<head>
    <title>Teste Captcha</title>
    <link href="captcha/captcha.css" type="text/css" rel="stylesheet" />
</head>

<body>    
    <form name="frmCaptcha" method="post" action="">
        <table border="0" cellpadding="10" cellspacing="1" width="100%" class="captcha-table">
            <tr class="tablerow">
                <td>Digite o código abaixo:
                    <input name="captcha_code" type="text" class="captcha-input captcha-input">
                </td>
                <td><br><input type="submit" name="submit" value="Confirmar" class="captcha-btn"></td>
            </tr>
            <tr class="tablerow">
                <td>
                    <span id="error-captcha" class="captcha-error">
                        <?php
                        if (isset($error_message)) {
                            echo $error_message;
                        }
                        ?>
                    </span>
                    <span id="sucess-captcha" class="captcha-sucess">
                        <?php
                        if (isset($sucess_message)) {
                            echo $sucess_message;
                        }
                        ?>
                    </span>
                </td>
            <tr>
        </table>
    </form>
</body>

</html>