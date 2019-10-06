<?php
 
$cep = $_POST['fcep'];
 
$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
 
$dados['sucesso'] = (string) $reg->resultado;
$dados['cende']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
$dados['cbairro']  = (string) $reg->bairro;
$dados['ccidade']  = (string) $reg->cidade;
$dados['cuf']  = (string) $reg->uf;
 
echo json_encode($dados);
 
?>