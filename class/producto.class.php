<?php

	class Producto {

		public $idProducto   = null;
		public $Nombre 	  	 = null;
		public $Precio 	  	 = null;
		public $Marca 		 = null;
		public $Categoria    = null;
		public $Presentacion = null;
		public $Stock 		 = null;
		public $Imagen 	  	 = null;


		function __construct($id = null, $nombre = null, $precio = null, $marca = null, $cat = null, $pres = null, $stock = null, $imagen = null){
			$this->setId($id);
			$this->setNombre($nombre);
			$this->setPrecio($precio);
			$this->setMarca($marca);
			$this->setCategoria($cat);
			$this->setPresentacion($pres);
			$this->setStock($stock);
			$this->setImagen($imagen);
		}

		//SETTERS Y GETTERS
			public function setId($id){
				if(is_numeric($id)){
					$this->idProducto = (int)$id;
				} else{
					$this->idProducto = null;
				}
			}
			public function setNombre($nombre){
				if(isset($nombre)){
					$this->Nombre = trim($nombre);
				} else{
					$this->Nombre = null;
				}
			}
			public function setPrecio($precio){
				if(is_numeric($precio)){
					$this->Precio = (float)$precio;
				} else{
					$this->Precio = null;
				}
			}
			public function setMarca($marca){
				if(isset($marca)){
					$this->Marca = trim($marca);
				} else{
					$this->Marca = null;
				}
			}
			public function setCategoria($categoria){
				if(isset($categoria)){
					$this->Categoria= trim($categoria);
				} else{
					$this->Categoria = null;
				}
			}
			public function setPresentacion($presentacion){
				if(isset($presentacion)){
					$this->Presentacion= trim($presentacion);
				} else{
					$this->Presentacion = null;
				}
			}
			public function setStock($stock){
				if(is_numeric($stock)){
					$this->Stock = (int)$stock;
				} else{
					$this->Stock = null;
				}
			}
			public function setImagen($imagen){
				if(isset($imagen)){
					$this->Imagen = (string)$imagen;
				} else{
					$this->Imagen = null;
				}
			}

			public function getId(){
				return $this->idProducto;
			}
			public function getNombre(){
				return $this->Nombre;
			}
			public function getPrecio(){
				return $this->Precio;
			}
			public function getMarca(){
				return $this->Marca;
			}
			public function getCategoria(){
				return $this->Categoria;
			}
			public function getPresentacion(){
				return $this->Presentacion;
			}
			public function getStock(){
				return $this->Stock;
			}
			public function getImagen(){
				return $this->Imagen;
			}

		//Método estático para obtener listado de productos
			static function obtenerProductos( $pdo, $cantidad = 6, $destacado = -1 ){

				$sql = 'SELECT P.idProducto, P.Nombre, P.Precio, M.Nombre AS Marca, C.Nombre AS Categoria, P.Presentacion, P.Stock, P.Imagen FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca INNER JOIN categorias AS C ON C.idCategoria = P.Categoria';
				if($destacado != -1){
					$sql .= " WHERE P.Destacado = :destacado";
				}
					$sql .= " LIMIT 0, :cantidad";

					$stmt = $pdo->prepare( $sql );
					$stmt->bindValue(':destacado', $destacado, PDO::PARAM_INT);
					$stmt->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
					$stmt->execute();
						$productos = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Producto", array("id", "n", "p", "m", "c", "d", "s", "i"));
						return $productos;

			}

		//Método para mostrar un producto por grilla
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
							<a class="now-get get-cart" href="?page=producto&amp;id=<?php echo $this->idProducto ?>">VER MAS</a> 
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<?php
			}

		//Método para mostrar un producto particular
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
							<a class="now-get get-cart-in" href="?page=carrito&amp;agregarId=<?php echo $this->idProducto ?>">AGREGAR AL CARRITO</a> 
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

		//Método para buscar un producto por ID
			static function buscarPorId($id, $pdo){

				$sql = "SELECT P.idProducto, P.Nombre, P.Precio, M.Nombre AS Marca, C.Nombre AS Categoria, P.Presentacion, P.Stock, P.Imagen FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca INNER JOIN categorias AS C ON C.idCategoria = P.Categoria WHERE P.idProducto = :id";

				$stmt = $pdo->prepare($sql);

				$stmt->execute(array(':id'=>$id));
				return $stmt->fetch(PDO::FETCH_OBJ);

			}

	}
?>