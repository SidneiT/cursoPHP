<?php
use Lib\Config;

// Inclusao do arquivo de bootstrap
require __DIR__ . '/../bootstrap.php';

if( $_GET ) {
    
    if( isset( $_GET['modulo'] ) ) {
        
        $modulo = "Model\\{$_GET['modulo']}";
        
        $objeto = new $modulo();
        
        $servidor_soap = new SoapServer( Config::get('path') . "wsdl/{$_GET['modulo']}.wsdl" );
        
        $servidor_soap->setObject( $objeto );
        
        $servidor_soap->handle();
    }
    
}
 