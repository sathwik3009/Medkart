<?php
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "pms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$id2=$_SESSION['user_id'];
$query="SELECT * FROM buyer WHERE Buyer_ID='$id2'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
$contact = $row['Buyer_Contact'];
$address = $row['Buyer_Address'];
$bname= $row['Buyer_Name'];
}
$rand=rand(1,100);
$sno=$_GET['SNO'];
$mid=$_GET['MID'];
$mname=$_GET['MName'];
$mquantity=$_GET['MQ'];
$saledate=$_GET['date'];
$paymode=$_GET['PAYMODE'];
$days=$_GET['DAYS'];
$amt=$_GET['AMT'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="ui secondary menu navbar" style="padding:3px;">
		  <a class="ui item">
		  <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
		  <div class="right menu">
		    <a href="customer.php" class="ui item">
		    <h4>Home</h4>
		    </a>
		    <a href="adminsearch.php" class="ui item">
		    <h4>Search Info</h4>
		    </a>
		      <a href="logout.php" class="ui item">
		      <h4>Logout</h4>
		      </a>
		  </div>
		  </div>
		<div class="new">
		<div class="invoice-box" id="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
								<h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
								</td>

								<td>
									Invoice : <?php echo "$rand" ?><br />
									Created: <?php echo  date("d/m/Y") ;?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									MedKart<br />
									phno:0000000000<br />
									Guindy,Chennai
								</td>

								<td>
									<?php echo "$bname" ?><br />
									<?php echo "$contact" ?><br />
									<?php echo "$address" ?><br />
								</td>

							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>Payment Mode</td>


				</tr>

				<tr class="details">
					<td><?php echo "$paymode" ?><br /></td>

				</tr

				<tr class="heading">
					<td>Medicine</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Total</td>
					<td><?php echo "$amt" ?></td>
				</tr>
				<tr class="item last">
					<td>Tax</td>
					<td>8 %</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>RS<?php echo "$amt" ?>\-<br /></td>
				</tr>
			</table>
		</div>
	</div>
  <script>
  function generatePDF(){
    const element =document.getElementById("invoice-box");

    html2pdf()
    .from(element)
    .save();
  }
  </script>
	<center>
    <button class="ui secondary button" onclick="generatePDF()">Download</button>
	</center>

</body>
</html>
