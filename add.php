<?php
if(isset($_POST['submit'])){
	$products=simplexml_load_file('products.xml');
	$product=$products->addChild('product');
	$product->addAttribute('id',$_POST['id']);
	$product->addChild('name',$_POST['name']);
	$product->addChild('price',$_POST['price']);
	file_put_contents('products.xml',$products->asXML());
	header('Location:index.php');
}
?>
<html>
	<head> <title>Add product</title></head>
	<body>
		<form method="post" action="">
			Product Id: <input type="text" name="id"> <br><br>
            Name: <input type="text" name="name"> <br><br>
            Price: <input type="text" name="price"> <br><br>
            <input type="submit" name="submit" id="submit" value="Submit">
            <br><br>
		</form>
	</body>
</html>