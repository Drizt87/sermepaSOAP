<?php

    /** Incluimos el archivo de configuración que contiene los datos necesarios */
    require_once __DIR__.'/config.php';

    /** @var  $idPedido */
    $idPedido   = date('hidmY');   //el valor que le damos en cada ejemplo

    /** @var  $amount */
    $amount     = 552;             //el valor que le damos en cada ejemplo

    /** @var  $redsysClass */
    $redsysClass = new RedsysAPI;

    // Se Rellenan los campos
    $redsysClass->setParameter('DS_MERCHANT_AMOUNT',          $amount);
    $redsysClass->setParameter('DS_MERCHANT_ORDER',           $idPedido);
    $redsysClass->setParameter('DS_MERCHANT_MERCHANTCODE',    $nComercio);
    $redsysClass->setParameter('DS_MERCHANT_CURRENCY',        $moneda);
    $redsysClass->setParameter('DS_MERCHANT_TRANSACTIONTYPE', $tipoTransaccion);
    $redsysClass->setParameter('DS_MERCHANT_TERMINAL',        $terminal);
    $redsysClass->setParameter('DS_MERCHANT_MERCHANTURL',     $urlRespuesta);
    $redsysClass->setParameter('DS_MERCHANT_URLOK',           $urlKO);
    $redsysClass->setParameter('DS_MERCHANT_URLKO',           $urlOK);

?>
<html lang="es">
<head></head>
<body>
    <form name="frm" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_blank">
        Ds_Merchant_SignatureVersion <input size="100" type="text" name="Ds_SignatureVersion" value="<?= $version; ?>" /></br />
        Ds_Merchant_MerchantParameters <input size="100" type="text" name="Ds_MerchantParameters" value="<?= $redsysClass->createMerchantParameters(); ?>"/></br />
        Ds_Merchant_Signature <input size="100" type="text" name="Ds_Signature" value="<?= $redsysClass->createMerchantSignature($claveComercio); ?>"/></br>
        <button type="submit" value="Enviar" >Enviar</button>
    </form>

    </body>
</html>