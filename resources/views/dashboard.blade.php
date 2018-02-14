

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  
  
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <link rel="stylesheet" href="{{url('css/style.css')}}">

  
</head>

<body>
<div class="container">
	

    <div class="wrapper">
    	<div class="row">
    		<div class="col-md-12">
    			<a href="/salir" class="btn btn-danger">Cerrar sesión</a>
    		</div>
    		
    	</div>

    	<div class="row">
    		<div class="col-md-12">
    			<table class="table table-responsive table-bordered">
    				<thead>
    					<th>Nombre</th>
    					<th>Descripción</th>
    					<th>Acción</th>
    				</thead>
    				<tbody id="tbody_alertas">
    					@php
							$alertas = $alertas['response'];


							foreach($alertas as $alerta){
								

								echo '
									<tr id="tr_'.$alerta['idAlerta'].'">
										<td>'.$alerta['nombre'].'</td>
			    						<td>'.$alerta['descripcion'].'</td>
			    						<td>
			    							<div class="row">
			    								<div class="col-md-6">
			    									<button class="btn btn-default" onclick="editar('.$alerta['idAlerta'].',\' '.$sesion.'\')">
			    										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			    									</button>
			    								</div>
			    								<div class="col-md-6">
			    									<button class="btn btn-danger" 
			    									onclick="eliminar('.$alerta['idAlerta'].',\' '.$sesion.'\')">
			    										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			    									</button>
			    								</div>
			    							</div>
			    						</td>
									</tr>
		    						';
								
							}


						@endphp
    					
    				</tbody>
    			</table>
    		</div>
    		<div class="col-md-2 col-md-offset-10">
    				<button class="btn btn-success" type="button" data-toggle="modal" data-target="#crearAlerta">
						Agregar Acción
					</button>
					
    		</div>
    		
    	</div>


	    
  </div>
</div>  


<!-- Modal -->
<div class="modal fade" id="crearAlerta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar acción</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        	<form class="form-horizontal">
        		<div class="col-md-12">
        			<div class="form-group">
				    	<label for="nombre">Nombre</label>
				    	<input type="text" class="form-control" id="nombre" placeholder="Ingrese un nombre">
				  </div>
				  <div class="form-group">
				    	<label for="descripcion">Descripción</label>
				    	<textarea  class="form-control" id="descripcion" placeholder="Ingrese una descripcion"></textarea>
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Tipo</label>
				    	<input type="text" class="form-control" id="tipo" placeholder="Ingrese un tipo">
				  </div>
        		
				
				  <div class="form-group">
				    	<label for="tipo">Color R</label>
				    	<input type="number" class="form-control" id="colorR" placeholder="Ingrese un color R">
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Color G</label>
				    	<input type="number" class="form-control" id="colorG" placeholder="Ingrese un color G">
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Color B</label>
				    	<input type="number" class="form-control" id="colorB" placeholder="Ingrese un color B">
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Acronimo</label>
				    	<input type="text" class="form-control" id="acronimo" placeholder="Ingrese un acronimo">
				  </div>
				</div>
			  
			</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="guardar('{{$sesion}}')">Guardar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editarAlerta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar acción</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        	<form class="form-horizontal">
        		<div class="col-md-12">
        			
				    	
				    	<input type="text" class="form-control hidden" id="idEditar" >
				  
        			<div class="form-group">
				    	<label for="nombre">Nombre</label>
				    	<input type="text" class="form-control" id="nombreEditar" placeholder="Ingrese un nombre" >
				  </div>
				  <div class="form-group">
				    	<label for="descripcion">Descripción</label>
				    	<textarea  class="form-control" id="descripcionEditar" placeholder="Ingrese una descripcion"></textarea>
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Tipo</label>
				    	<input type="text" class="form-control" id="tipoEditar" placeholder="Ingrese un tipo">
				  </div>
        		
				
				  <div class="form-group">
				    	<label for="tipo">Color R</label>
				    	<input type="number" class="form-control" id="colorREditar" placeholder="Ingrese un color R">
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Color G</label>
				    	<input type="number" class="form-control" id="colorGEditar" placeholder="Ingrese un color G">
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Color B</label>
				    	<input type="number" class="form-control" id="colorBEditar" placeholder="Ingrese un color B">
				  </div>
				  <div class="form-group">
				    	<label for="tipo">Acronimo</label>
				    	<input type="text" class="form-control" id="acronimoEditar" placeholder="Ingrese un acronimo">
				  </div>
				</div>
			  
			</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarAlerta('{{$sesion}}')">Editar</button>
      </div>
    </div>
  </div>
</div>

  
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script type="text/javascript">
	function editar(id, key){
		
			$.ajax({
			  url: "https://api-zironet.c9users.io/web/v1/alertas.json",
			  headers: {
			  		"x-api-key":key
			  },
			  type: "GET",
					success: function (response, request) {
			       console.log(response['error']);
			       if(response['error'] == 0){
			       		/*var alerta = <?php //echo json_encode($alertas).';'; ?>*/
						var alerta = response['response'];

						console.log(alerta);
						for(i = 0; i < alerta.length; i++){
							if(id == alerta[i]["idAlerta"]){
								$("#nombreEditar").val(alerta[i]["nombre"]);
								$("#descripcionEditar").val(alerta[i]["descripcion"]);
								$("#tipoEditar").val(alerta[i]["tipo"]);
								$("#colorREditar").val(alerta[i]["colorR"]);
								$("#colorGEditar").val(alerta[i]["colorG"]);
								$("#colorBEditar").val(alerta[i]["colorB"]);
								$("#acronimoEditar").val(alerta[i]["acronimo"]);
								$("#idEditar").val(alerta[i]["idAlerta"]);
								break;
							}
						}

						$("#editarAlerta").modal("show");
			       }
		    
			  
				}
			});
			
			
						
	}


	function editarAlerta(key){
		var nombre = $("#nombreEditar").val();
		var descripcion = $("#descripcionEditar").val();
		var tipo = $("#tipoEditar").val();
		var colorR = $("#colorREditar").val();
		var colorG = $("#colorGEditar").val();
		var colorB = $("#colorBEditar").val();
		var acronimo = $("#acronimoEditar").val();
		var idAlerta = $("#idEditar").val();

		var data = { 
			"data": {
				"idAlerta": idAlerta,
				"nombre": nombre, 
				"descripcion": descripcion,
				"tipo": tipo, 
				"colorR": colorR, 
				"colorG": colorG, 
				"colorB": colorB, 
				"acronimo": acronimo
			} 
		};


		$.ajax({
		  url: "https://api-zironet.c9users.io/web/v1/alertas.json",
		  headers: {
		  		"x-api-key":key,
		  		"Content-type":"application/json"
		  },
		  data: JSON.stringify(data),
		  type: "PUT",
				success: function (response, request) {
			       console.log(response['error']);
			       if(response['error'] == 0){
			       		var idAlerta = response['response']['idAlerta'];
			       		
			       		var nuevaFila = "<td>"+nombre+"</td>";
			       		nuevaFila += "<td>"+descripcion+"</td>";
					    nuevaFila += "<td><div class=\"row\">";
					    nuevaFila += "<div class=\"col-md-6\">";
					    nuevaFila += "<button class=\"btn btn-default\" onclick=\"editar("+idAlerta+", '{{$sesion}}')\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></button>";
					    nuevaFila += "</div>";
					    nuevaFila += "<div class=\"col-md-6\">";
					    nuevaFila += "<button class='btn btn-danger'  onclick=\"eliminar("+idAlerta+", '{{$sesion}}')\">";
					    nuevaFila += "<span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></button>";
					    nuevaFila += "</div> </div> </td>";
			       		
					   
			       		$( '#tr_'+idAlerta ).html(nuevaFila);
			       		$("#editarAlerta").modal("hide");
			       		
			       }
		    
			  
				}
		});

	}

	function eliminar(id, key){
	$.ajax({
	  url: "https://api-zironet.c9users.io/web/v1/alertas.json?id="+id,
	  headers: {
	  		"x-api-key":key
	  },
	  type: "DELETE",
			success: function (response, request) {
	       console.log(response['error']);
	       if(response['error'] == 0){
	       		$( '#tr_'+id ).remove();
	       }
    
	  
		}
	});
}

function guardar(key){
	var nombre = $("#nombre").val();
	var descripcion = $("#descripcion").val();
	var tipo = $("#tipo").val();
	var colorR = $("#colorR").val();
	var colorG = $("#colorG").val();
	var colorB = $("#colorB").val();
	var acronimo = $("#acronimo").val();

	var data = { 
		"data": {
			"nombre": nombre, 
			"descripcion": descripcion,
			"tipo": tipo, 
			"colorR": colorR, 
			"colorG": colorG, 
			"colorB": colorB, 
			"acronimo": acronimo
		} 
	};


	$.ajax({
	  url: "https://api-zironet.c9users.io/web/v1/alertas.json",
	  headers: {
	  		"x-api-key":key,
	  		"Content-type":"application/json"
	  },
	  data: JSON.stringify(data),
	  type: "POST",
			success: function (response, request) {
	       console.log(response['error']);
	       if(response['error'] == 0){
	       		var idAlerta = response['response']['idAlerta'];
	       		var nuevaFila = "<tr id='tr_"+idAlerta+"'>";
	       		nuevaFila += "<td>"+nombre+"</td>";
	       		nuevaFila += "<td>"+descripcion+"</td>";
			    nuevaFila += "<td><div class=\"row\">";
			    nuevaFila += "<div class=\"col-md-6\">";
			   nuevaFila += "<button class=\"btn btn-default\" onclick=\"editar("+idAlerta+", '{{$sesion}}')\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\" ></span></button>";
			    nuevaFila += "</div>";
			    nuevaFila += "<div class=\"col-md-6\">";
			    nuevaFila += "<button class=\"btn btn-danger\" onclick=\"eliminar("+idAlerta+", '{{$sesion}}')\">";
			    nuevaFila += "<span class=\"glyphicon glyphicon-trash\"aria-hidden=\"true\"</span></button>";
			    nuevaFila += "</div> </div> </td> </tr>";
	       		$("#tbody_alertas").append(nuevaFila);
	       		$("#crearAlerta").modal("hide");
	       		
	       }
    
	  
		}
	});

}



</script>


</body>

</html>
