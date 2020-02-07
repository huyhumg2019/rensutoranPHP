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
					<h2><img class="small" src="images/new.jpg"><br>更新情報</h2>
					<dl class="information">
						<dt>1991/12/27</dt>
						<dd>
							サイトオープンしました。
						</dd>
					</dl>
				</section>
				<section>
					<h2><img class="small" src="images/about.png"><br> NGUYEN HUU HUY PENSION　について</h2>
					<h3>にこやか笑顔でお出迎え</h3>
					<p>
						少人数で営業している当ペンションですが、スタッフー同心掛けているのは、
						<br>にこやかな笑顔で接客対応することです！
					</p>
					<h3>大人数でワイワイと</h3>
					<p>
						部活やサークル、仲の良いお友達同士などと、
						<br>大人数でわいわいしながら過ごすのに最適な環境づくりを目指してています！
					</p>
					<h3>観光スポットに恵まれた好立地</h3>
					<p>
						ゲレンデ、テニスコート、各種レクリエーション施設へアクセスは抜群です！
						<br>また、温泉地の中心街からも近いため、観光にも最適です！
					</p>
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