<head>
<link href="style.css" rel="stylesheet">
</head>
<?php
session_start();
//error_reporting(0); // Disable all errors.
require_once('config.php');
?>
<?php
include ('menu.php');
if (isset($_POST["More"]))
    AddorRemove(1);
if (isset($_POST["Less"]))
    AddorRemove(-1);

    $strItems = $_SESSION["strItems"];
    $strNumberItems = $_SESSION["strNumberItems"];
    $arrItems = explode (" ", $strItems);
    $arrNumberItems = explode (" ", $strNumberItems);
    $intSize = sizeof($arrItems);
    $intItemTotal = 0;
    $intTotal = 0;
?>
            <table width="960px">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
<?php
    for ($intCount = 1; $intCount < $intSize; $intCount++) {
        $intItem = $arrItems[$intCount];
        $intNumberItem = $arrNumberItems[$intCount];
        if ($intNumberItem > 0) {
            $dbProductRecords = $connection->query("SELECT * FROM Products WHERE ProductID='$intItem'")
                or die("Problem reading table: " . $mysqli->error);
            $arrProductRecords = $dbProductRecords->fetch_array();
						$intId  = $arrProductRecords["ProductID"];
						$strName = $arrProductRecords["name"];
						$strDescription = $arrProductRecords["description"];
						$strImage = $arrProductRecords["image"];
						$intCost = $arrProductRecords["price"];
            $intItemTotal = $intNumberItem * $intCost;
            $intTotal += $intItemTotal;
?>
<tr>
		<td style="text-align:center">
		<img src="<?php echo "$strImage"; ?>" style="width: 100px; height: 100px;"> <strong><?php echo "$strName" ?></strong> </td>
		<td style="text-align:center">
		<?php echo "$intNumberItem"; ?>
		</td>
		<td style="text-align:center"><strong>$<?php echo "$intCost"; ?></strong></td>
		<td style="text-align:center"><strong>$<?php echo "$intItemTotal"; ?></strong></td>
		<td style="text-align:center">
			<form action='cart.php' method='post'>
			<input type='hidden' name='intPage' value='<?php echo "$intPage" ?>'/>
			<input type='hidden' name='intId' value='<?php echo "$intId" ?>'/>
			<input type='submit' name='More' value='+'/>
			<input type='submit' name='Less' value='-'/></form>
		</td>
</tr>
<?php
        }
    }
		?>
		<tr>
				<td>   </td>
				<td>   </td>
				<td>   </td>
				<td style="text-align:center"><h3>Total</h3></td>
				<td style="text-align:center"><h3><strong>$<?php echo "$intTotal"; ?></strong></h3></td>
		</tr>
</table>
</div>
</div>
<?php

function AddorRemove($intAmount) {
    $intId = $_POST["intId"];
    $strItems = $_SESSION["strItems"];
    $strNumberItems = $_SESSION["strNumberItems"];
    $arrItems = explode (" ", $strItems);
    $arrNumberItems = explode (" ", $strNumberItems);
    $intKey = array_search($intId, $arrItems);
    if ($intKey == true)
        $arrNumberItems[$intKey] += $intAmount;
    else {
        $arrItems[] = $intId;
        $arrNumberItems[] = 1;
    }
    $strItems = implode (" ", $arrItems);
    $strNumberItems = implode (" ", $arrNumberItems);
    $_SESSION["strItems"] = $strItems;
    $_SESSION["strNumberItems"] = $strNumberItems;
}
?>