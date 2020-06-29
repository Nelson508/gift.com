<div class="col-3">
                <div class="card ">
                    <img
                    title="<?php echo $item['NombreProducto'];?>"
                    alt="<?php echo $item['NombreProducto'];?>"
                    class="card-img-top" 
                    src="dist/img/<?php echo $item['Imagen'];?>"
                    data-toggle="popover"
                    data-trigger="hover"
                    data-content="<?php echo $item['Descripcion'];?>"
                    height="217px"
                    >
                    <div class="card-body">
                        <span><b><?php echo $item['NombreProducto'];?></b></span></br>
                        <h5 class="card-title"><?php echo $item['Modelo'];?></h5>
                        <p class="card-text">Descripción</p>

                        <div class="text-center">
                            <button class="btn btn-primary" 
                            name="btnAccion" 
                            value="Agregar" 
                            type="submit"
                            >Ver detalles
                            </button>
                        </div>

                        
                    </div>
                </div>
                
</div>