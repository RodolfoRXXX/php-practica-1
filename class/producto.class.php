<?php
	require 'class/conexion.class.php';

	class Producto {

		public  $idProducto   = null;
		private $Nombre 	  = null;
		private $Precio 	  = null;
		private $Marca 		  = null;
		private $Categoria    = null;
		private $Presentacion = null;
		public  $Stock 		  = null;
		private $Imagen 	  = null;


		function __construct($id = null, $n = null, $p = null, $m = null, $c = null, $d = null, $s = null, $i = null){
			$this->idProducto 	= $id;
			$this->Nombre 		= $n;
			$this->Precio 		= $p;
			$this->Marca 		= $m;
			$this->Categoria 	= $c;
			$this->Presentacion = $d;
			$this->Stock 		= $s;
			$this->Imagen 		= $i;
		}

		//Método estático para obtener listado de productos
		static function obtenerProductos( $cantidad = 6, $destacado = -1, $idProducto = 0 ){
			$parametros = array(
									'engineDb'=>'mysql',
									'server'  =>'localhost',
									'nameDb'  =>'comercioit',
									'user'    =>'root',
									'password'=>''
								);
			$conexion = new Conexion( $parametros );

			$sql = 'SELECT P.idProducto, P.Nombre, P.Precio, M.Nombre AS Marca, C.Nombre AS Categoria, P.Presentacion, P.Stock, P.Imagen FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca INNER JOIN categorias AS C ON C.idCategoria = P.Categoria';
			if($destacado != -1){
				$sql .= " WHERE P.Destacado = ".(int)$destacado;
			}
			if($idProducto != 0){
				$sql .= " WHERE P.IdProducto = ".(int)$idProducto;
			}
				$sql .= " LIMIT 0, ".$cantidad;
				$productos = $conexion->query( $sql );
			    	return $productos->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Producto", array("id", "n", "p", "m", "c", "d", "s", "i"));

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
		function productoPorId($id){
			$parametros = array(
				'engineDb'=>'mysql',
				'server'  =>'localhost',
				'nameDb'  =>'comercioit',
				'user'    =>'root',
				'password'=>''
			);
			$conexion = new Conexion( $parametros );

			$sql = "SELECT P.idProducto, P.Nombre, P.Precio, M.Nombre AS Marca, C.Nombre AS Categoria, P.Presentacion, P.Stock, P.Imagen FROM productos AS P INNER JOIN marcas AS M ON M.idMarca = P.Marca INNER JOIN categorias AS C ON C.idCategoria = P.Categoria WHERE P.idProducto = :id";

			$stmt = $conexion->prepare($sql);

			$stmt->execute(array(':id'=>$id));
			return $stmt->fetch(PDO::FETCH_OBJ);

		}

	}
?>