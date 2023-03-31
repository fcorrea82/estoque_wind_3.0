<?php
$para = "fcorrea82@hotmail.com";
$assunto = "teste";
$corpo = "ola email";
$headers = "From: flavio.correa82@gmail.com";

if (mail($para, $assunto, $corpo, $headers)) {
    echo "email enviado para $para com sucesso!";
} else {
    echo "falha no envio do email";
}
