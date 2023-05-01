<?php
//session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["darab"])) {
				$ProductID = $db_handle->runQuery("SELECT * FROM products WHERE ProductID='" . $_GET["ProductID"] . "'");
				$itemArray = array($ProductID[0]["ProductID"] => array('ProductName' => $ProductID[0]["ProductName"], 'ProductID' => $ProductID[0]["ProductID"], 'darab' => $_POST["darab"], 'ProductPrice' => $ProductID[0]["ProductPrice"], 'ProductPhoto' => $ProductID[0]["ProductPhoto"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($ProductID[0]["ProductID"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($ProductID[0]["ProductID"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["darab"])) {
									$_SESSION["cart_item"][$k]["darab"] = 0;
								}
								$_SESSION["cart_item"][$k]["darab"] += $_POST["darab"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["ProductID"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>


<div id="shopping-cart">
	<div class="txt-heading">Shopping Cart</div>

	<a id="btnEmpty" href="termekek.php?action=empty">Empty Cart</a>
	<?php
	if (isset($_SESSION["cart_item"])) {
		$total_darab = 0;
		$total_ProductPrice = 0;
		?>
		<table class="tbl-cart" cellpadding="10" cellspacing="1">
			<tbody>
				<tr>
					<th style="text-align:left;">Név</th>
					<th style="text-align:left;">Azonosító</th>
					<th style="text-align:right;" width="5%">darab</th>
					<th style="text-align:right;" width="10%">darab egységár</th>
					<th style="text-align:right;" width="10%">ár</th>
					<th style="text-align:center;" width="5%">eltávolítás</th>
				</tr>
				<?php
				foreach ($_SESSION["cart_item"] as $item) {
					$item_ProductPrice = $item["darab"] * $item["ProductPrice"];
					?>
					<tr>
						<td><img src="<?php echo $item["ProductPhoto"]; ?>" class="cart-item-image" /><?php echo $item["ProductName"]; ?></td>
						<td>
							<?php echo $item["ProductID"]; ?>
						</td>
						<td style="text-align:right;">
							<?php echo $item["darab"]; ?>
						</td>
						<td style="text-align:right;">
							<?php echo "$ " . $item["ProductPrice"]; ?>
						</td>
						<td style="text-align:right;">
							<?php echo "$ " . number_format($item_ProductPrice, 2); ?>
						</td>
						<td style="text-align:center;"><a
								href="termekek.php?action=remove&ProductID=<?php echo $item["ProductID"]; ?>"
								class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
					</tr>
					<?php
					$total_darab += $item["darab"];
					$total_ProductPrice += ($item["ProductPrice"] * $item["darab"]);
				}
				?>

				<tr>
					<td colspan="2" align="right">Total:</td>
					<td align="right">
						<?php echo $total_darab; ?>
					</td>
					<td align="right" colspan="2"><strong>
							<?php echo "$ " . number_format($total_ProductPrice, 2); ?>
						</strong></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<?php
	} else {
		?>
		<div class="no-records">Your Cart is Empty</div>
	<?php
	}
	?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY ProductID ASC");
	if (!empty($product_array)) {
		foreach ($product_array as $key => $value) {
			?>
			<div class="product-item">
				<form method="post" action="termekek.php?action=add&ProductID=<?php echo $product_array[$key]["ProductID"]; ?>">
					<div class="product-image"><img src="<?php echo $product_array[$key]["ProductPhoto"]; ?>"></div>
					<div class="product-tile-footer">
						<div class="product-title">
							<?php echo $product_array[$key]["ProductName"]; ?>
						</div>
						<div class="product-ProductPrice">
							<?php echo "$" . $product_array[$key]["ProductPrice"]; ?>
						</div>
						<div class="cart-action"><input type="text" class="product-darab" ProductName="darab" value="1"
								size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
					</div>
				</form>
			</div>
			<?php
		}
	}
	?>
</div>