<!DOCTYPE html>
<html lang="hu">

<body>

	<?php
	session_start();
	echo file_get_contents("header.html");


	require_once("dbcontroller.php");
	include_once("dbeleres.php");
	$db_handle = new DBController();

	if (!empty($_GET["action"])) {
		switch ($_GET["action"]) {
			case "add":
				if (!empty($_POST["quantity"])) {
					$productByCode = $db_handle->runQuery("SELECT * FROM Products WHERE ProductCode='" . $_GET["ProductCode"] . "'");
					$itemArray = array($productByCode[0]["ProductCode"] => array('ProductID' => $productByCode[0]["ProductID"], 'ProductName' => $productByCode[0]["ProductName"], 'ProductCode' => $productByCode[0]["ProductCode"], 'quantity' => $_POST["quantity"], 'ProductPrice' => $productByCode[0]["ProductPrice"], 'ProductPhoto' => $productByCode[0]["ProductPhoto"]));

					if (!empty($_SESSION["cart_item"])) {
						if (in_array($productByCode[0]["ProductCode"], array_keys($_SESSION["cart_item"]))) {
							foreach ($_SESSION["cart_item"] as $k => $v) {
								if ($productByCode[0]["ProductCode"] == $k) {
									if (empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
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
						if ($_GET["ProductCode"] == $k)
							unset($_SESSION["cart_item"][$k]);
						if (empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
					}
				}
				break;

			case "buy":

				//max PurchaseNumber lekéredéze
	
				$purchase_array = $db_handle->runQuery("SELECT MAX(PurchaseNumber) FROM Purchases");

				print_r($purchase_array);



				/*
				foreach ($_SESSION["cart_item"] as $item){
				$item_price = $item["quantity"]*$item["ProductPrice"];
				//adatbázisba írás a cart_item SESSION sorai alapján
				$timestamp = date('Y-m-d H:i:s');
				include 'buy_muv.php';
				}	
				*/
				break;

			case "empty":
				unset($_SESSION["cart_item"]);
				break;
		}
	}
	?>


	<div id="shopping-cart">

		<?php //UserID lekérdezése. Ha be van jelentkezve visszaadja a UserID-t
		

		if (isset($_SESSION["UserID"])) {
			//ha be vagyunk lépve 
			$user_array = $db_handle->runQuery("SELECT * FROM Users WHERE UserID='" . $_SESSION['UserID'] . "'");
			//if (!empty($user_array)) { 
			foreach ($user_array as $key => $value) {
				?>
				<div class="txt-heading">
					<?php echo $user_array[$key]["UserName"]; ?> - Kosár
				</div>
				<?php
			}

		} else {
			?>
			<div class="txt-heading">
				Nincs bejelentkezve - Kosár</div>
			<?php
		}
		?>

		<?php
		if (isset($_SESSION["cart_item"])) {
			$total_quantity = 0;
			$total_price = 0;
			?>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<a id="btnEmpty" href="termekek.php?action=empty">Kosár ürítése</a>

				<tbody>
					<tr>
						<th style="text-align:left;">Terméknév</th>
						<th style="text-align:left;">Termékkód</th>
						<th style="text-align:rigth;" width="5%">Mennyiség</th>
						<th style="text-align:right;" width="10%">Egységár</th>
						<th style="text-align:right;" width="10%">Összesen</th>
						<th style="text-align:center;" width="5%">Eltávolítás</th>
					</tr>
					<?php
					foreach ($_SESSION["cart_item"] as $item) {
						$item_price = $item["quantity"] * $item["ProductPrice"];
						?>
						<tr>
							<td><img src="<?php echo $item["ProductPhoto"]; ?>" class="cart-item-image" /><?php echo $item["ProductName"]; ?></td>
							<td>
								<?php echo $item["ProductCode"]; ?>
							</td>
							<td style="text-align:right;">
								<?php echo $item["quantity"]; ?>
							</td>
							<td style="text-align:right;">
								<?php echo $item["ProductPrice"]; ?>. Ft
							</td>
							<td style="text-align:right;">
								<?php echo number_format($item_price, 2); ?>.
							</td>
							<td style="text-align:center;"><a
									href="termekek.php?action=remove&ProductCode=<?php echo $item["ProductCode"]; ?>"
									class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
						</tr>
						<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["ProductPrice"] * $item["quantity"]);
					}
					?>

					<tr>
						<td colspan="2" align="right">Total:</td>
						<td align="right">
							<?php echo $total_quantity; ?>
						</td>
						<td align="right" colspan="2"><strong>
								<?php echo number_format($total_price, 2); ?> . Ft
							</strong></td>
						<td><a id="btnBuy" href="termekek.php?action=buy">Vásárlás</a></td>
					</tr>
				</tbody>
			</table>

			<?php
		} else {
			?>
			<div class="no-records">Üres a kosara</div>
			<?php
		}
		?>
	</div>
		<div id="product-grid">
			<div class="txt-heading">Termékek</div>
			<?php
			$product_array = $db_handle->runQuery("SELECT * FROM Products WHERE ProductStatus ORDER BY ProductID ASC");
			if (!empty($product_array)) {
				foreach ($product_array as $key => $value) {
					?>

					<div class="product-item">
						<form method="post"
							action="termekek.php?action=add&ProductCode=<?php echo $product_array[$key]["ProductCode"]; ?>">
							<div><img src="<?php echo $product_array[$key]["ProductPhoto"]; ?>" class="product-image"></div>
							<div class="product-tile-footer">
								<div class="product-title">
									<?php echo $product_array[$key]["ProductName"]; ?>
								</div>
								<div class="product-price">
									<?php echo $product_array[$key]["ProductPrice"] . " Ft"; ?>
								</div>
								<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1"
										size="2" /><input type="submit" value="Kosárhoz adás" class="btnAddAction" />
								</div>
							</div>
						</form>
					</div>
					<?php
				}
			}
			?>
		</div>
		<!--- js script for menu --->
		<script>
			var menuItems = document.getElementById("menuItems");

			menuItems.style.maxHeight = "0px";

			function menuToggle() {
				if (menuItems.style.maxHeight == "0px") {
					menuItems.style.maxHeight = "500px"
				}
				else {
					menuItems.style.maxHeight = "0px"
				}
			}
		</script>
		<?php
		echo file_get_contents("footer.html");
		?>
</body>

</html>