<?php
$products=simplexml_load_file('products.xml');
/* foreach($products->product as $product){
	$id=$product['id'];
	$name=$product->name;
	$price=$product->price;
	echo "name: ".$name." price: ".$price."<br>";
} */
echo "No of products ".count($products)."<br>";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach($products->product as $product){
		if($product['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($products->product[$index]);
	file_put_contents('products.xml',$products->asXML());
	header("location:index.php");
}
?>
<a href="add.php">Add New Product</a>
<table border=2>
<tr>
	<th>id</th>
	<th>name</th>
	<th>price</th>
	<th>Action</th>
</tr>
<?php foreach($products->product as $product){ ?>
<tr>
	<td><?php echo $product['id'] ?></td>
	<td><?php echo $product->name ?></td>
	<td><?php echo $product->price ?></td>
	<td>
		<a href="index.php?id=<?php echo $product['id']?>" >Delete</a>
		<a href="edit.php?id=<?php echo $product['id'] ?>"> Edit </a>
	</td>
</tr>
<?php } ?>
</table>