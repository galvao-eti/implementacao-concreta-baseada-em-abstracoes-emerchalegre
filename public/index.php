<?php

require '../autoload.php';

use Alfa\SGBD;
use Alfa\BaseDeDados;

$servidor = new SGBD;

$servidor->setEndereco("127.0.0.1");
$servidor->setPorta(3306);
$servidor->setUsuario("root");
$servidor->setSenha("");

$db = new BaseDeDados("alfa", $servidor);

$Produto = new \Alfa\Produto($db);
$Produto->setNome("produto");

/* Create  */
$arrayColunasCreate = array (
    'nome',
    'preco'
);

$arrayValoresCreate = array(
    "Teclado Sem Fio Microsoft",
    255.00
);

try {
    $db->conectar();
    $Produto->create($arrayColunasCreate, $arrayValoresCreate);
} catch (Exception $e) {
    echo $e->getMessage();
}
finally{
    $db->desconectar();
}

/* Update */
$arrayColunasUpdate = array (
    'nome',
    'preco'
);

$arrayValoresUpdate = array(
    "Teclado Sem Fio Microsoft",
    255.00
);

$clausulaUpdate = "codigo = 1";

try {
    $db->conectar();
    $Produto->update($arrayColunasUpdate, $arrayValoresUpdate, $clausulaUpdate);
} catch (Exception $e) {
    echo $e->getMessage();
}
finally{
    $db->desconectar();
}

/* Delete */

$clausulaDelete = "codigo = 3";

try {
    $db->conectar();
    $Produto->delete($clausulaDelete);
} catch (Exception $e) {
    echo $e->getMessage();
}
finally{
    $db->desconectar();
}

/* Retrieve */

$arrayColunasRetrieve= array (
    'codigo',
    'nome',
    'preco'
);

$clausulaRetrieve = "codigo = 4";

try {
    $db->conectar();
    $ret = $Produto->retrieve($arrayColunasRetrieve, $clausulaRetrieve);
    
    foreach($ret as $key => $value) {
        $html = "<ul>";
        foreach($value as $idx => $val ){
            $html .= "<li>" . $val . "</li>";
        }
        $html .= "</ul>";
    
        echo $html;
    }
    
    
    
} catch (Exception $ex) {
    echo $e->getMessage();
}