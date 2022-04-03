
<?php
	session_start();
	if(!$_SESSION["Ingreso"]){
		header("location:index.php?ruta=ingreso");
		exit();
	} 
	
	$nombre = $_SESSION["nombre"];


?>
<h1>
	<?php
		
		echo $nombre;
	?>
</h1>
<script>	
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#t1 thead th').each( function () {
        var title = $(this).text();
		if(title == "Nombre"){
			$(this).html( '<label for="Name">'+title+'</label>' );
		}
		else{
			$(this).html( '<label for="'+title+'">'+title+'</label>' );
			$(this).html( '<input type="text" id="'+title+'" name="'+title+'" placeholder="Buscar '+title+'" />' );
		}
		
    } );
 
    // DataTable
    var table = $('#t1').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
				
				//var column = this;
                //var some = column.index();
				//if (column.index() == 1) return;
                
				
				$( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );


</script>
	<br>
	<h1>Empresas</h1>

	<table id="t1" class="display">
		
		<thead>
			
			<tr>
				<th>Nombre</th>
				<th>Ubicacion</th>
				<th>Ganancia</th>
				<th></th>
				<th></th>

			</tr>
		</thead>

		<tbody>
			
			
			<?php
			
				$mostrar = new EmpresasC();
				$mostrar -> MostrarEmpresasC();

			?>
			
			
	
		</tbody>
		<tfoot>
            <tr>
                <th>NOmbre</th>
                <th>ubicacion</th>
                <th>ganancia</th>
            </tr>
        </tfoot>

	</table>
	

