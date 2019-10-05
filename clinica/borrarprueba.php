<form action="principal.php" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Segmento</th>   
                        <th>Unidad de Negocio</th>
                        <th>Abreviatura</th>
						<th>Meta Casuística en %</th>
                        <th>Meta Ingresos en %</th>
                    </tr>
                </thead>
                 
                <tbody>    
			<?php
			// carga para vizualizar	
		echo 'Cargando nombre del archivo: '.$destino.' <br>';
         $chk_ext = explode(".",$destino);
        if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $handle = fopen($destino, "r");
			 $data = fgetcsv($handle, 1000, ",");                  //eliminar titulo del archivo csv
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
         }
        else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para verr si esta separado por " , "
             echo "Archivo invalido!";
         }
			
			
			
			
			?>
                  <?php                                             //lista todo lo que esta en la tabla
					 $i=0;
					 while( $fila = sqlsrv_fetch_array( $listado, SQLSRV_FETCH_ASSOC) ) 
					 {
						$SEG3=$fila['SEG3'];
						$DESCRIPCION=$fila['DESCRIPCION'];
						$DESCR=$fila['DESCR'];
						$META_CASOS=$fila['META_CASOS']*100;
						$META_INGRESOS=$fila['META_INGRESOS']*100;
						$i++;			
					?>
			
					<tr>
   				    <td><input type="text" name="<?php echo "SEG3_".$i;?>" id="<?php echo "SEG3_".$i;?>" class='form-control' maxlength="4"  style="display:none" value="<?php echo $SEG3;?>"><?php echo $SEG3;?></td>
					<td><?php echo $DESCRIPCION;?></td>
					<td><?php echo $DESCR;?></td>
					<td><input type="text" name="<?php echo "M_C".$i;?>" id="<?php echo "M_C".$i;?>" class='form-control' maxlength="4" required value="<?php echo $META_CASOS;?>"></td>
					<td><input type="text" name="<?php echo "M_I".$i;?>" id="<?php echo "M_I".$i;?>" class='form-control' maxlength="4" required value="<?php echo $META_INGRESOS;?>"></td>
					</tr>	
					<?php
					} //fin del while  
					?>     
                </tbody>
            </table>
			<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar Cambios</button>
			</div>
	</form>