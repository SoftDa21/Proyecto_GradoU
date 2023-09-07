<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include("../ConexionBD.php");

      $this->Image('logo.jpg', 105, 5, 80); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      //$this->Cell(110, 15, utf8_decode('NOMBRE EMPRESA'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(20); // Salto de línea
      $this->SetTextColor(103); //color


      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(8, 38, 96);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(70, 10, utf8_decode("PRE - FACTURA"), 0, 1, 'C', 0);
      $this->Ln(3);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(8, 38, 96); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(45, 10, utf8_decode('Fecha Venta'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Nombre Cliente'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Télefono Cliente'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Medio de Pago'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Vendedor'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Precio Total Venta'), 1, 1, 'C', 1);
      
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

include("../ConexionBD.php");
$id=$_GET["id"];
$consultafactura = $conexion->query("SELECT * FROM registro_ventas JOIN mediopago ON registro_ventas.mediopago = mediopago.id_mp 
JOIN registro_productos ON registro_ventas.producto = registro_productos.id_producto WHERE id_venta = $id");

while ($datos = $consultafactura->fetch_object()) {

$i = $i + 1;
/* TABLA */
$pdf->Cell(45, 10, utf8_decode($datos->fechaventa), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode($datos->nombrecliente), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode($datos->telefonocliente), 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode($datos->nombreproducto), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($datos->medio), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($datos->vendedor), 1, 0, 'C', 0);
$pdf->Cell(35, 10, utf8_decode("$" . number_format($datos->precioventa)), 1, 1, 'C', 0);

}


$pdf->Output('Prefactura.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
