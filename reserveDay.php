<?php
session_start();
if(isset($_SESSION['reserve'])){
unset($_SESSION['reserve']);
}
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
				<section>
				<h2>空室検索</h2>
				<h3>宿泊予定日入力</h3>
				<form method="post"action="reserveRoomList.php">
				<table>
				<tr>
				<th>宿泊予定日</th>
				<td><input type="date" name="reserveDay" value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" required></td>
				</tr>
				</table>
				<input class="submit_a" type="submit" value="空室検索">
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
	</body>
	</html>