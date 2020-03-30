<?php

error_reporting(0);
include ("func.php");
echo "\e                         GOJEK 20k         \n";
echo "\e                   INSTAGRAM  @HILMAWANABDR \n";
echo "\n";
nope:
echo "\e[?] Masukkan Nomor HP Disini Wajib 628xxx  : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor Telah Terdaftar bambaang\n";
			goto nope;
    }
  else
    {
echo "\e[!] Tunggu Brooo\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\e[x] Failed Get OTP!\n";
    }
  else
    {
    otp:
    echo "\e[!] OTP BROO (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
        {
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!] Trying to redeem Reff :G-YN6TJY3 !\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] Done Broo!! Sekarang Masuk Ke Gojek Login Masukin Kode Promo. (G-MPW4WBM) SEMOGA SUKSES\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
