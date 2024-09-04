<?php
$host="localhost";
$user= "root";
$pass="root";
$db="test-db";
$conn= new mysqli($host,$user,$pass,$db);
if($conn->error){
    die("Connect refused!");
}
$sql = "select * from products";
$result = $conn->query($sql);
$products = [];
while ($row = $result->fetch_assoc()){
    $products[]= $row;
}
?>
@extends("layout")
@section("main")
<div class="container">
            <div class="row">
                <?php foreach($products as $item):  ?>
                <div class="col-3">
                <div class="card mb-3 mt-3">
  <img src="<?php echo $item["thumbnail"]; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $item["name"] ; ?></h5>
    <p>Price: $<?php echo $item["price"];?></p>
    <p class="card-text"><?php echo substr($item["description"],0,1000); ?></p>
    <a href="product.php?id=<?php echo $item["id"]; ?>" class="btn btn-primary">Buy</a>
  </div>
</div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
@endsection