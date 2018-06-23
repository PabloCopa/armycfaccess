<?php
include 'inc/header.php';

$productos = new ProductosFront($con);
?>


	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?include 'inc/left_menu.php';?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                                                <? foreach($productos->getListFront() as $prod){
                                                    $ruta = 'files_site/productos/'.$prod['id_producto'].'/';
                                                    $imagenes = obtener_archivos($ruta); 
                                                    ?>
                                                    <div class="col-sm-4">
                                                            <div class="product-image-wrapper">
                                                                    <div class="single-products">
                                                                                    <div class="productinfo text-center" style="width:256px; height: 440px" >
                                                                                            <img src="<?=$imagenes['0']?>" alt="" />
                                                                                            <h2><?=$prod['precio']?> $</h2>
                                                                                            <p><a href="productos_detalle.php?id=<?=$prod['id_producto']?>"><?=$prod['nombre']?></a></p>
                                                                                            <a href=href="javascript:comprar(<?=$prod['id_producto']?>,1)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                    </div>
                                                                                    <div class="product-overlay">
                                                                                            <div class="overlay-content">
                                                                                                    <h2><?=$prod['precio']?></h2>
                                                                                                    <p><a href="productos_detalle.php?id=<?=$prod['id_producto']?>"><?=$prod['nombre']?></a></p>
                                                                                                    <a href="javascript:comprar(<?=$prod['id_producto']?>,1)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                            </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="choose">
                                                                            <ul class="nav nav-pills nav-justified">
                                                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                <?}?>
						
						
					</div><!--features_items-->
					
					
					
				</div>
			</div>
		</div>
	</section>

<?php
include 'inc/footer.php';
?>
