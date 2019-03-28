<?php

    /** Incluimos la libreria proporcionada por redsys */
    require_once __DIR__.'thirds/redsys/apiRedsys.php';

    // desactivar la cache WSDL
    ini_set("soap.wsdl_cache_enabled","0");

    /** @var  $nComercio */
    $nComercio          = '999008881';

    /** @var  $terminal */
    $terminal           = '001';

    /** @var  $moneda */
    $moneda             = '978';

    /** @var  $tipoTransaccion */
    $tipoTransaccion    = '1';

    /** @var  $urlRespuesta */
    $urlRespuesta       = 'https://'.$_SERVER['SERVER_NAME'].'/recibeTPV.php?wsdl';

    /** @var  $urlKO */
    $urlKO              = 'https://'.$_SERVER['SERVER_NAME'].'/ok';

    /** @var  $urlOK */
    $urlOK              = 'https://'.$_SERVER['SERVER_NAME'].'/ko';

    /** @var  $version */
    $version            = "HMAC_SHA256_V1";

    /** @var  $claveComercio */
    $claveComercio      = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES

