<?php
session_start();
require_once('./dbConfig.php');
$link=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if($link==null){
die("接続に失敗しました".mysqli_connect_error());
}
mysqli_set_charset($link,"utf8");

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <title> NGUYEN HUU HUY PENSION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="stylecss.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div id="container">
	<header id="header">
		<div id="pr">
			<p>部活・サークル等のグループ利用に最適！アットホームなペンション！</p>
		</div>
			<h1><a href="./index.php"><img src="images/logo.jpg" alt=""></a></h1>
		<div id="contact">
			<h2>ご予約／お間い合わせ</h2>
			<span class="tel">0120-180-423</span>
		</div>
	</header>


	<nav id="menu">
		<ul>
			<li><a href="./index.php">ホーム</a></li>
			<li><a href="./roomList.php">お部屋紹介</a></li>
			<li><a href="./reserveDay.php">ご予約</a></li>
		</ul>
	</nav>


	<div id="icatch">
		<img src="images/main_visual.jpg" alt="">
	</div>


	<div id="contens">
		<main id="main">
			<article>
			<?php	$reserveDt =$_POST['reserveDay']; ?>
				<section>
				<h2>空室検索</h2>
				<?php	
				$reserveDt =$_POST['reserveDay']; 
				$_SESSION['reserve']['day']=$reserveDt;
				$sql ="SELECT room_name,type_name,dayfee,main_image,room_no 
				from room,room_type where room.type_id =room_type.type_id 
				and room.room_no NOT IN (SELECT room_no FROM reserve WHERE date(reserve_date) ='{$reserveDt}')";
				$result =  mysqli_query($link,$sql);
				?>
				<h3> <?php echo $reserveDt?>  の空室一覧</h3>
				<p><?php 
				 if(mysqli_num_rows($result)!=null){
				 echo mysqli_num_rows($result); }else{
				echo "申し訳ございません。" ;}
				
				?>部屋の空室があります</p>
				<table>
				<th>お部屋名称</th>
				<th>お部屋タイプ</th>
				<th>一泊料金<br>(部屋単位)</th>
				<th colspan="2">お部屋イメージ</th>
				
				<?php 
			
			
				while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo "<tr>";
				echo "<td>{$row['room_name']}</td>";
				echo "<td>{$row['type_name']}</td>";
				$dayfee =number_format($row['dayfee']);
				echo "<td class='number'>&yen;{$dayfee}</td>";
				echo "<td><img class='small' src='./images/{$row['main_image']}'></td>";
					echo "<td> <a href='./reserveDetail.php?rno={$row['room_no']}' >選択</a></td>";
				echo "</tr>";
				}
				?>
				</table>
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
	Copyright  NGUYEN HUU HUY PENSION All Rights Reserved
	</footer>
	</div>
	<?php
	mysqli_free_result($result);
	mysqli_close($link);
	?>
	</body>
	</html>