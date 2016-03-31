<?php

    //ADDITIONAL EXAMPLES:
    //http://phpseclib.sourceforge.net/rsa/examples.html

    $public_key = file_get_contents('public.key');
    $private_key = file_get_contents('private.key');
    $plaintext = "SOC:123-45-6789";

    require_once('Crypt/RSA.php');
    $rsa = new Crypt_RSA();

    echo '<pre>';
    echo "Starting Plaintext:\n$plaintext";
    echo "\n --- \n";
    $rsa->loadKey($public_key); // public key
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    $ciphertext = $rsa->encrypt($plaintext);
    echo "\nCiphertext:\n";
    echo chunk_split($ciphertext);

    $rsa->loadKey($private_key); // private key
    $plaintext2 = $rsa->decrypt($ciphertext);

    echo "\n --- \n";
    echo "\n\nDecrypted Back into Plaintext\n\n";
    echo $plaintext2;
?>
