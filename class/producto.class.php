<?php
	class Producto {
		
		private $idProducto   = null;
		private $Nombre 	  = null;
		private $Precio 	  = null;
		private $Marca 		  = null;
		private $Categoria    = null;
		private $Presentacion = null;
		private $Stock 		  = null;
		private $Imagen 	  = null;


		function __construct($id, $n, $p, $m, $c, $d, $s, $i){
			$this->idProducto 	= $id;
			$this->Nombre 		= $n;
			$this->Precio 		= $p;
			$this->Marca 		= $m;
			$this->Categoria 	= $c;
			$this->Presentacion = $d;
			$this->Stock 		= $s;
			$this->Imagen 		= $i;
		}

		//Método que muestra el producto en la grilla
		function mostrarProducto($nuevo = false){ ?>
			<div class="col-sm-4 col-md-4 chain-grid">
				<a href="?page=producto&amp;id=<?php echo $this->idProducto ?>"><img class="img-responsive chain" src="images/uploads/<?php echo $this->Imagen ?>" alt=" " /></a>
				
				<?php if($nuevo) echo '<span class="star"></span>'; ?>
				
				<div class="grid-chain-bottom">
					<h6><a href="?page=producto&amp;id=<?php echo $this->idProducto ?>"><?php echo $this->Nombre . " - " . $this->Marca ?></a></h6>
					<div class="star-price">
						<div class="dolor-grid"> 
							<span class="actual">$<?php echo $this->Precio ?></span>
						</div>
						<a class="now-get get-cart" href="?page=producto&amp;id=<?php echo $this->idProducto ?>">Agregar al carrito</a> 
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php
		}

		//Método que muestra el producto en una página aparte
		function vistaProducto(){ ?>
			<div class="single_grid">
				<div class="grid images_3_of_2">
					<ul id="etalage">
						<li>
							<img class="etalage_thumb_image" src="images/productos/<?php echo $this->Imagen ?>" class="img-responsive" />
						</li>
					</ul>
					<div class="clearfix"></div>		
				</div>
				<div class="desc1 span_3_of_2">
					<h4><?php echo $this->Nombre ?></h4>
					<div class="cart-b">
						<div class="left-n ">$<?php echo $this->Precio ?></div>
						<a class="now-get get-cart-in" href="#">COMPRAR</a> 
						<div class="clearfix"></div>
					</div>
					<h6><?php echo $this->Stock ?> unid. en stock</h6>
					<p><?php echo $this->Categoria ?> | <?php echo $this->Presentacion ?></p>
					<div class="share">
						<h5>Compartir Producto:</h5>
						<ul class="share_nav">
							<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
							<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
							<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
							<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php	
		}
	}
?>