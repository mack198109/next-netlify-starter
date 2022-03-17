<?php

# KCAPTCHA ���������������� ����

$alphabet = "0123456789abcdefghijklmnopqrstuvwxyz"; # �� ������� ����� ������!

# ������� ��� ������ CAPTCHA
//$allowed_symbols = "0123456789"; 
$allowed_symbols = "23456789"; #alphabet without similar symbols (o=0, 1=l, i=j, t=f)

# ����� �� ��������
$fontsdir = 'fonts';	

# CAPTCHA ����� ������
//$length = mt_rand(3,5); # ��������� 5 ��� 6
$length = 5;

# ������ CAPTCHA. �� ��������. ������� ����������!
$width = 110;
$height = 50;

$fluctuation_amplitude = 5;

# ��������� ������������ ����� �������������� �������� ����� ���������
$no_spaces = true;

$show_credits = false; 
$credits = 'script.landman.ru';

# ���� ����������� (RGB, 0-255)
//$foreground_color = array(0, 0, 0);
//$background_color = array(220, 230, 255);
$foreground_color = array(mt_rand(0,100), mt_rand(0,100), mt_rand(0,100));
$background_color = array(mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));

# �������� �������� JPEG, ��� ������, ��� ����� ��������, �� ������ ������ �����
$jpeg_quality = 100;
?>