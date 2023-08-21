<?php
$products = simplexml_load_file('products.xml');
if(isset($_POST['save'])){
	foreach($products->product as $product){
		if($product['id']==$_POST['id']){
			$product->name = $_POST['name'];
			$product->price = $_POST['price'];
			break;
		}
	}
	file_put_contents('products.xml', $products->asXML());
	header('location:index.php');
}

foreach($products->product as $product){
	if($product['id']==$_GET['id']){
		$id = $product['id'];
		$name = $product->name;
		$price = $product->price;
		break;
	}
}
?>

<form method="post">
	Id   <input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"></br></br>
	Name  <input type="text" name="name" value="<?php echo $name; ?>"></br></br>
	price  <input type="text" name="price" value="<?php echo $price; ?>"></br></br>
	<input type="submit" value="Save" name="save">
</form>
