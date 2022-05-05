<?php

session_start();

$plaintext = "hello Word";
echo "the plain text is".$plaintext;

$cipher = "aes-128-gcm";

$key = "mysecretkey";

$ivlen = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);


echo "----- the encrypted text is ".$ciphertext;
   


?>