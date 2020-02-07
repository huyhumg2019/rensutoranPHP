<?php
session_start();
require_once('./dbConfig.php');
$link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if($link==null){
die("接続に失敗しました：".mysqli_connect_error());
}
mysqli_set_charset($link,"utf8");
$roomNo=$_SESSION['reserve']['roomno'];
$sql="SELECT room_name from room where room_no ={$roomNo}";
$result =mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$roomName=$row['room_name'];

$reserveDay=$_SESSION['reserve']['day'];
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
					<article>
				<section>
				<from action="./reserveInsert.php" method="post">
				<h2>ご予約（最終確認)</h2>
				<p>予約内容をご確認後、よろしければ予約確定ボタンを押してください。<br></p>
				<h3>予約情報</h3>
				<table class="input">
				<tr><th>お部屋名</th><td><?php echo $roomName;?></td> </tr>
				<tr><th>宿泊日</th><td><?php echo $reserveDay;?></td></tr>
				</table>
				<h3>代表者情報</h3>
			
				<table class="input">
				
				<tr>
				<th>代表者氏名 </th>
				<td><input type="text" name="dname" value=""></td>
				</tr>
				<tr>
				<th>連絡先電話番号 </th>
				<td><input type="text" name="dtelno" value=""></td>
				</tr>
				<tr>
				<th>メールアドレス </th>
				<td><input type="text" name="dmail" value=""></td>
				</tr>
				</table><br>
				<h3>予約詳細情報</h3>
				<table class="input">
				<tr>
				<th>宿泊人数</th>
				<td><input type="text" name="reserveNumber" value=""></td>
				</tr>
				<tr>
				<th>チェックイン予定時間</th>
				<td><select name="checkin">
				<option value="">時間を選択 </option>
				<option value="15:00">15:00 </option>
				<option value="16:00">16:00 </option>
				<option value="17:00">17:00</option>
				<option value="18:00">18:00</option>
				<option value="19:00">19:00</option>
				</select></td>
				</tr>
				<tr>
				<th>連絡事頂</th>
				<td><textarea name="message" cols="40" rows="4"></textarea></td>
				
				</tr>
				</table>
				<br>
				<p>まだ予約は確定しておりません。次の画面で確定させてください。</p>
				<input class="submit_a" type="submit" value="予約確認">
				<input class="submit_a" type="submit" value="前の画面に戻る" onclick="history.back();">
				</form>
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
	mysql_free_result($result);
	mysql_close($link);
	?>
	</body>
	</html>