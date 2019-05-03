<?php
include "Conexion.php";
$con=@mysqli_connect("127.0.0.1","root","","misiondb");
$query=mysqli_query($con,"select * from producto");
$clientes = array();
$n=0;
while($r=$query->fetch_object()){ $clientes[]=$r; $n++;
 
}

?>
<!DOCTYPE html>
<html>
<head>

<title>Generar PDF con los productos existentes</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jspdf/dist/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>

<meta charset="utf-8">
</head>
<body style="background-image: url('../img/banner1.jpg');">
    <br>
    <div class="container" style="text-align: center;">
      <div class="panel panel-default">

      <div class="panel-body">

      <div class="row">
          <div class="col-md-12">

            <h1>Crear un PDF con los productos existentes.</h1>
            <br>
          </div>

          <div class="col-md-12">
            <p><strong>Continuar con la descarga...</strong></p>
            <button id="GenerarMysql" class="btn btn-default">Descargar el documento</button>
            <br>
          </div>

          <div class="col-md-4"></div>

      </div>

      </div>

      </div><!-- /.Cierra-default-panel -->
    </div><!-- /.container-fluid -->



<script>
$("#GenerarMysql").click(function(){
  var pdf = new jsPDF('l', 'mm', [557, 520]);
  pdf.text(20,20,"PDF de los productos en el COLONO");


 
 var columns = ["Nombre", "IA", "Presentación", "Precio", "Uso técnico"];
  var data = [
<?php foreach($clientes as $c):
    {
?>

 ["<?php echo $c->nombre_Producto; ?>","<?php echo $c->IA. '   '?>", "<?php echo $c->presentacion . '   ' ?>", "<?php echo $c->precio. '   ' ?>",  "<?php echo $c->uso_Tecnico. '   ' ?>",],
<?php } ?>  
<?php endforeach; ?>  
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 40, }}
  );



  pdf.save('MiTabla.pdf');

});
</script>

</body>
</html>