<?php


    function procesaNotificacionSIS($xml) {
        $xmlParsed = simplexml_load_string($xml);
        $redsysClass = new RedsysAPI;
        $claveComercio = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //Clave recuperada de CANALES

        $response = (
            $redsysClass->createMerchantSignatureNotifSOAPRequest($claveComercio, $xml) === (string)$xmlParsed->Signature[0]) ?
            '<Response Ds_Version=\'0.0\'><Ds_Response_Merchant>OK</Ds_Response_Merchant></Response>'
            :
            '<Response Ds_Version=\'0.0\'><Ds_Response_Merchant>KO</Ds_Response_Merchant></Response>';


        return '<Message>' . $response . '<Signature>' .
                $redsysClass->createMerchantSignatureNotifSOAPResponse($claveComercio, $response, $redsysClass->getOrderNotifSOAP($xml)) .
        '</Signature></Message>';
    }



use_soap_error_handler(true);

try {
    // inicializamos el servidor SOAP con el wsdl
    $soapServer = new SoapServer(__DIR__.'/wsdl/sermepa.wsdl');

    // registramos la función para el procesado de la respuesta
    $soapServer->addFunction('procesaNotificacionSIS');

    // start handling requests
    $soapServer->handle();

} catch (SoapFault $exc) {
    echo $exc->getTraceAsString();
}
