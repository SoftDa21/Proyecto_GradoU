<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.jpg', 68, 5, 80); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
       // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(20); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(8, 38, 96);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 13);
      $this->Cell(100, 10, utf8_decode("INVENTARIO PRODUCTOS"), 0, 1, 'C', 0);
      $this->Ln(2);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(8, 38, 96); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 8);
      $this->Cell(12, 10, utf8_decode('Código'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Nombre Producto'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Categoria'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
      $this->Cell(15, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Proveedor'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Fecha Ingreso'), 1, 1, 'C', 1);
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
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 9);
$pdf->SetDrawColor(163, 163, 163); //colorBorde


include("../ConexionBD.php");
$consulta_inventario=$conexion->query("SELECT * FROM registro_productos LEFT JOIN categoria_producto ON registro_productos.categoria = categoria_producto.id");

while ($datos=$consulta_inventario->fetch_object()) {

   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(12, 10, utf8_decode($datos->id_producto), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($datos->nombreproducto), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos->categoria), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode("$". number_format($datos->precio_producto)), 1, 0, 'C', 0);
   $pdf->Cell(15, 10, utf8_decode($datos->cantidad), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($datos->proveedor), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($datos->fecha), 1, 1, 'C', 0);

}

$pdf->Output('Inventario.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
