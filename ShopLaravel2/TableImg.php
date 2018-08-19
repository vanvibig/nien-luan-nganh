<?php $conn = mysqli_connect('localhost', 'root', '', 'db_c4') or die('khong the ket noi');	?>

<!DOCTYPE html>
<html>
<head>
	<title> Table IMG </title>
	<meta charset="utf-8">
</head>
<body>
	<h3>Bảng IMG</h3>
	<br>
<?php
// link anh 
	$imgname1 = "avt.jpg";
	$imgname2 = "avt1.jpg";
//mở file ảnh để đọc với chế độ đọc binary  
	$fh1 = fopen($imgname1, "rb");  
	$imgData1 = fread($fh1, filesize($imgname1));  
	fclose($fh1);
	
	$fh2 = fopen($imgname2, "rb");  
	$imgData2 = fread($fh2, filesize($imgname2));  
	fclose($fh2);
	
	//chèn nội dung file ảnh vào table imgData  
	$sql1 = "INSERT INTO tbImg (imgData) VALUES(""," .mysql_real_escape_string($imgData1, $conn) . ")";  
	mysqli_query($conn,$sql1);  
	
	$sql2 = "INSERT INTO tbImg (imgData) VALUES(""," .mysql_real_escape_string($imgData2, $conn) . ")";  
	mysqli_query($conn,$sql2); 

	
?>	
	<table border="1">
		<tr>
			<th>ID</th>
			<th>IMG</th>
		</tr>
		<?php
			$result = mysqli_query($conn, 'select * from tbImg');
			while ($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row['ID']; ?></td>
					<td><?php echo $row['imgData']; ?></td>
				</tr>
			<?php } 
		?>
	</table>
</body>
</html>