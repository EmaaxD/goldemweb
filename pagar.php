<?php 
include_once ('includes/fuciones/functions.php');
include_once 'includes/fuciones/conexion.db.php';
$conexion = conexion();
 if(!isset($_POST['submit'])) {
   exit("hubo un error");
 }
 
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


require_once 'includes/paypal.php';
 
if (isset($_POST['submit'])):

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date("Y-m-d H:i:s");

    //Pedidos
    $boletos = $_POST['boletos'];
    $numero_boleto = $boletos;
    $camisa = $_POST['pedido_extra']['camisa']['cantidad'];
    $precioCamisa = $_POST['pedido_extra']['camisa']['precio'];

    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];

    $pedido = productoJson($boletos,$camisa,$etiquetas);

    //eventos
    $eventos = $_POST['registro'];
    $registro = eventosJson($eventos);

    echo "<pre>";
      var_dump($_POST);
    echo "</pre>";
    
    endif;
    try {

      //CONSULTAS PREPARADAS
      $stmt = $conexion->prepare("INSERT INTO registrados (name_registrado,lastname_registrado,email_registrado,date_registro,pases_articulos,talleres_registrado,regalo,total_pagado) VALUES(?,?,?,?,?,?,?,?)");
      $stmt->bind_param("ssssssis", $nombre,$apellido,$correo,$fecha,$pedido,$registro,$regalo,$total);
      $stmt->execute();
      $stmt->close();
      // header("Location: validar_registro.php?exitoso=1");

    } catch (Exception $e) {
      $error = $e->getMessage();
    }   

/*
$compra = new Payer();
$compra->setPaymentMethod('paypal');
 
$articulo = new Item();
$articulo->setName($producto)
         ->setCurrency('ILS')
         ->setQuantity(1)
         ->setPrice($precio);
 
$i = 0;
$arreglo_pedido = array();
foreach($numero_boletos as $key => $value) {
 if((int) $value['cantidad'] > 0) {
   ${"$articulo$i"} = new Item();
   $arreglo_pedido[] = ${"$articulo$i"};
   ${"$articulo$i"}->setName('Pase: ' . $key)
                    ->setCurrency('ILS')
                    ->setQuantity((int) $value['cantidad'])
                  //   ->setPrice($precio);
                    ->setPrice( (int)$value['precio'] );
    $i++;
  }//----if
}//---foreach
 
    
$i = 0;
foreach($pedidoExtra as $key => $value) {
   if((int) $value['cantidad'] > 0) {

      if($key == 'camisas'){
          $precio = (float) $value['precio'] * .93;
      }else{
          $precio =(int)  $value['precio'];
      }
   ${"$articulo$i"} = new Item();
   $arreglo_pedido[] = ${"$articulo$i"};
   ${"$articulo$i"}->setName('Extras: ' . $key)
                   ->setCurrency('ILS')
                   ->setQuantity((int) $value['cantidad'])
                   ->setPrice( $precio );
  $i++;
  }//----if
}//---foreach      
      

$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));
  
$detalles = new Details();
$detalles->setShipping($envio)
          ->setSubtotal($precio); 
          
          
$cantidad = new Amount();
$cantidad->setCurrency('MXN')
          ->setTotal($total)
          ->setDetails($detalles);
          
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
               ->setItemList($listaArticulos)
               ->setDescription('Pago ')
               ->setInvoiceNumber(uniqid());
               

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");
              
              
$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));
     
     try {
       $pago->create($apiContext);
     } catch (PayPal\Exception\PayPalConnectionException $pce) {
       // Don't spit out errors or use "exit" like this in production code
       echo '<pre>';print_r(json_decode($pce->getData()));exit;
   }

$aprobado = $pago->getApprovalLink();


header("Location: {$aprobado}");
*/