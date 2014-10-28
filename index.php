<?php
/**
 * Created by PhpStorm.
 * User: Fedde
 * Date: 28-10-14
 * Time: 17:51
 */

require 'libs/Database.php';
require 'vendor/autoload.php';


$db = new Database('classicmodels');
$db->query('SELECT productLine as name, textDescription as text FROM productlines');
$productlines = $db->getAll();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="http://bootswatch.com/darkly/bootstrap.min.css">
    <style>
		dt {
			font-size: 2em;
		}

    </style>
</head>
<body>
	<div class="container">
		<?php foreach($productlines as $productline) : ?>
		
			<?php

				$db->query("SELECT * FROM products WHERE productLine = '$productline->name'");
				$products = $db->getAll();

			?>

		<dt><?= $productline->name ?></dt>
		<dd><?= $productline->text ?></dd>
			<ul>
				<?php foreach($products as $product): ?>
					<li><?= $product->productName ?></li>
				<?php endforeach;?>				
			</ul>
  
		<?php endforeach; ?>
	


	</div>
	
</body>
</html>

