<?php
include('config.php');
	try {
		$dbh = new PDO($dbh);
		$dbh->exec("CREATE TABLE content(
			id INTEGER PRIMARY KEY,
			content text
			)"
		);

		$content = '

<div class="item">
<h1 class="title">D100</h1>
<div class="content"><a href="http://213.229.118.8:8000/Channel1-64MP3">d100 1</a>
<a href="http://213.229.118.8:8000/Channel3-64MP3">d100 3</a>
<a href="http://213.229.118.8:8000/Channel4-64MP3">d100 4</a></div>
</div>
<div class="item">
<h1 class="title">DBC</h1>
<div class="content">mp3
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch1">dbc1</a>
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch2">dbc2</a>
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch3">dbc3</a>
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch4">dbc4</a>
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch5">dbc5</a>
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch6">dbc6</a>
<a href="http://rtspoversea.dbc.hk/dbc_mp3_ch7">dbc7</a>
<br />
aac
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch1">dbc1</a>
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch2">dbc2</a>
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch3">dbc3</a>
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch4">dbc4</a>
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch5">dbc5</a>
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch6">dbc6</a>
<a href="http://rtspoversea.dbc.hk/dbc_aac_ch7">dbc7</a></div>
</div>

<div class="item">
<h1 class="title">广东电台</h1>
<div class="content"><a href="http://ctt.tttv.tv:8000/fm914">广东新闻电台fm91.4</a>
<a href="http://ctt.tttv.tv:8000/fm974">广东珠江经济台fm97.4</a>
<a href="http://ctt.tttv.tv:8000/hifi">广东dab hifi频道</a>
<a href="http://ctt.tttv.tv:8000/fm993">广东音乐之声fm99.3</a>
<a href="http://ctt.tttv.tv:8000/fm1052">广东羊城交通广播fm105.2</a>
<a href="http://ctt.tttv.tv:8000/fm936">广东电台南方生活广播fm93.6</a>
<br />
<a href="http://ctt.rgd.com.cn:8000/fm914">广东新闻电台fm91.4</a>
<a href="http://ctt.rgd.com.cn:8000/fm974">广东珠江经济台fm97.4</a>
<a href="http://ctt.rgd.com.cn:8000/hifi">广东dab hifi频道</a>
<a href="http://ctt.rgd.com.cn:8000/fm993">广东音乐之声fm99.3</a>
<a href="http://ctt.rgd.com.cn:8000/fm1052">广东羊城交通广播fm105.2</a>
<a href="http://ctt.rgd.com.cn:8000/fm936">广东电台南方生活广播fm93.6</a></div>
</div>


		';
		$stmt = $dbh->prepare("insert into content (content) values(:content)");
		$data = array(
			':content' => $content
		);
		echo $stmt->execute($data);

		$stmt = $dbh->prepare('select content from content order by id desc limit 1');
		$stmt->execute();
		$items = $stmt->fetchAll();

		$dbh = NULL;

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Radio</title>
<style>
body{font-size:2em; }
</style>
</head>
<body>
<div id="container">

<?php echo $items[0]['content']?>

</div>
</body>
</html>