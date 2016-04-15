<?=Html::doctype('html5')?>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Holy Grail Layout</title>
		<!-- CSS -->
		<?=Asset::css('holy_grail.css')?>
	</head>

<body class="hg">  

<style>
	body {margin: 0;}
	.title { background-color:#FCC; font-size:180%; padding: 20px 0; text-align: center;}
	.menu { background-color:#CDD; padding: 10px;}
	.ads { background-color:#DDC; padding: 10px;}
	.content { background-color:#FFF; padding: 10px 20px;}
	.footer { background-color:#CFC; padding: 10px 0; text-align: center;}
</style>
  
  <header class="hg__header">
  	<div class="title">
  		Title
  	</div>
  </header>
  <main class="hg__main">
  	<div class="content">
  		The CSS Grid Layout Module, although still in Editor's Draft, is nearing finalisation. We can now enable it in a number of browsers for testing and help figure out any bugs it may have.<br>
			The CSS Grid Layout is really complex, even more so than Flexbox. It has 17 new properties and introduces a lot of new concepts around the way we write css. So, in an attempt to wrap my head around this new specification and figure out how it works, I used it to create the Holy Grail Layout.
  	</div>
  </main>
  <aside class="hg__left">
  	<div class="menu">
  		Menu
  	</div>
  </aside>
  <aside class="hg__right">
  	<div class="ads">
  		Ads
  	</div>
  </aside>
  <footer class="hg__footer">
		<div class="footer">
  		Footer
  	</div>
  </footer>
</body>
</html>