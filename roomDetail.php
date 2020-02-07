<?php 
$rno=htmlspecialchars($_GET["rno"]);
$link = mysqli_connect("localhost","root","","nguyenhuuhuy");
if($link ==null){
die("接続に失敗しました:".mysqli_connect_error());
}
mysqli_set_charset($link,"utf8");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset ="UTF-8">
	<link rel="stylesheet" href="stylecss.css">
	<title>NGUYEN HUU HUY PENSION </title>
</head>
<body>
<div id="container">
	<header id="header">
		<div id="pr">
			<p>部活・サークル等のグループ利用に際して！アットホームなペンション！</p>
		</div>
		
		<h1><a href="index.php"><img src="images/logo.jpg" alt=""></a></h1>
		
		<div id="contact">
			<h2>ご予約／お問い合わせ</h2>
			<span class="tel">0120-180-423</span>
		</div>
	</header>
	<nav id ="menu">
		<ul>
			<li><a href="index.php">ホーム</a></li>
			<li><a href="roomList.php">お部屋紹介</a></li>
			<li><a href="index.php">ご予約</a></li>
		</ul>
	</nav>


	<div id="contens">
	<?php
	$sql ="SELECT room_name,information,main_image,image1,image2,image3,type_name,dayfee,amenity 
	FROM room,room_type WHERE room.type_id=room_type.type_id AND room.room_no ={$rno}";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	?>
	
		<main id ="main">
			<article>
				<section>
					<h2>お部屋の詳細</h2>
					<h3>『<?php echo $row['room_name'];?>』</h3>
					<p>
					<?php echo $row ['information'];?>
					</p>
					<table>
						<tr>
							<td><img class="middle" src="./images/<?php echo $row ['main_image'];?>"></td>
							<td><img class="middle" src="./images/<?php echo $row ['image1'];?>"></td>
						</tr>
						<tr>
							<td><img class="middle" src="./images/<?php echo $row ['image2'];?>"></td>
							<td><img class="middle" src="./images/<?php echo $row ['image3'];?>"></td>
						</tr>
					</table>
					<br>
					<table>
						<th>お部屋タイプ</th>
						<th>一泊料金<br>（部屋単位）</th>
						<th>アメニティ</th>
						<tr>
							<td><?php echo $row ['type_name'];?></td>
							<td class="number">&yen;<?php echo number_format($row ['dayfee']);?></td>
							<td><?php echo $row ['amenity'];?></td>
						</tr>
					</table>
					<br>
				</section>
			</article>
		</main>



		<aside id="side">
			<section>
				<h2>ご予約</h2>
				<ul>
					<li><a href="./reserveDay.php">宿泊日入力</a></li>
				</ul>
			</section>
			<section>
				<h2>お部屋紹介</h2>
				<?php include("./sideList.php");
			
			?>
			</section>
		</aside>



		<div id="pageTop">
			<a href="#top">ページのトップへ戻る</a>
		</div>
	</div>
	
	<footer id="footer"> 
	CopyrightNGUYEN HUU HUY All Rights Reserved
	</footer>
	</div>
	<?php
	mysqli_free_result($result);
	mysqli_close($link);
	?>
</body>
</html>