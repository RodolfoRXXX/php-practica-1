<?php
	class Producto {
		
		public $idProducto = null;
		public $Nombre = null;
		public $Precio = null;
		public $Marca = null;
		public $Imagen = null;

		function __construct($id, $n, $p, $m, $i){
			$this->idProducto = $id;
			$this->Nombre = $n;
			$this->Precio = $p;
			$this->Marca = $m;
			$this->Imagen = $i;
		}

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
						<a class="now-get get-cart" href="?page=producto&amp;id=<?php echo $this->idProducto ?>">VER MÁS</a> 
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<?php
		}
	}
?>