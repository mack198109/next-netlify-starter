<?php

include('kcaptcha/kcaptcha.php');
session_start();
require_once("config.php");


if ($_POST['act']== "y")
{
if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] ==  $_POST['keystring'])
{

if (isset($_POST['posName']) && $_POST['posName'] == "")
{
$statusError = "$errors_name";
}
elseif (isset($_POST['posEmail']) && $_POST['posEmail'] == "")
{
$statusError = "$errors_mailfrom";
}
elseif(isset($_POST['posEmail']) && !preg_match("/^([a-z,._,0-9])+@([a-z,._,0-9])+(.([a-z])+)+$/", $_POST['posEmail']))
{
$statusError = "$errors_incorrect";

unset($_POST['posEmail']);
}
elseif (isset($_POST['posRegard']) && $_POST['posRegard'] == "")
{
$statusError = "$errors_subject";
}
elseif (isset($_POST['posText']) && $_POST['posText'] == "")
{
$statusError = "$errors_message";
}

elseif (!empty($_POST))
{
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: $content  charset=$charset\r\n";
$headers .= "Date: ".date("Y-m-d (H:i:s)",time())."\r\n";
$headers .= "From: \"".$_POST['posName']."\" <".$_POST['posEmail'].">\r\n";
$headers .= "X-Mailer: My Send E-mail\r\n";

$subject = $_POST['posRegard'];
$message = $_POST['posText'];

mail("$mailto","$subject","$message","$headers");

unset($name, $posText, $mailto, $subject, $posRegard, $message);

$statusSuccess = "$send";
}

}else{
$statusError = "$captcha_error";
unset($_SESSION['captcha_keystring']);
}
}
?>

<html>
<head>
<title>O�pa��a� c����</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="style.css" rel="stylesheet" type="text/css" media='screen,projection' />
</head>
<body>

<!---��� ��� ����� ���. �����--->
<div align="center">

<table border="0" width="360" cellspacing="5" cellpadding="5">

<h3 align="center">O�pa��a� c����</h3>
<p id="emailSuccess">
<strong style="color:green;"><?php echo "$statusSuccess" ?></strong>
</p>
<p id="emailError"><strong style="color:red;"><?php echo "$statusError" ?></strong></p>
<tr>
<td>
<div id="contactFormArea">
<form action="./" method="post" id="cForm">
<input type="hidden" name="act" value="y" />
<fieldset>
<label for="posName"><b>���� ���:</b></label>
<input class="text" type="text" size="25" name="posName" id="posName" />
<label for="posEmail"><b>��� E-mail �����:</b></label>
<input class="text" type="text" size="25" name="posEmail" id="posEmail" />
<label for="posRegard"><b>���� ���������:</b></label>
<input class="text" type="text" size="25" name="posRegard" id="posRegard" />
<label for="posText"><b>���������:</b></label>
<textarea cols="60" rows="8" name="posText" id="posText"></textarea>
<p align="center"><label for="posCaptcha"><b>������� ��� ����</b>:</label></p>
<p align="center"><img src="kcaptcha?<?php echo session_name()?>=<?php echo session_id()?>" border=0></p>
<p align="center"><input class="text" type="text" size="5" name="keystring" id="keystring" onfocus="this.className='focus'" onblur="this.className='text'" /></p>
<p align="center"><label><input class="submit" type="submit" name="selfCC" id="selfCC" value=" ��������� " /></label></p>
</fieldset>
</form>
</div>
</td>
</tr>

<!---���. ������--->
<tr>
<td>
<input type="button" value=" �������� ����� " onClick="ReloadButton()" style="float: left">
<script>
 function ReloadButton()
 {
 location.href="javascript:window.location.reload()";
 }
</script>
		
<input type="button" value=" ������� ���� " onClick="window.close();" style="float: right">		
</td>
</tr>
<!---�����. ���. ������--->

</table>

</div>
<!---����� ��� ��� ����� ���. �����--->

</body>
</html>




