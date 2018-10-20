<?php
require 'jwt.php';

$jwt = new JWT();

$token = $jwt->create(array("id_user"=>123, "nome"=>"Erivan Cledson"));

echo "TOKEN: ".$token;


//site para saber se ele está certo https://jwt.io/ copia o token

//infoma a chave no site no campo que tem o nome your-256-bit secret abC123!