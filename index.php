<?php require_once(dirname(__FILE__) . '/include/config.inc.php');

$cid = empty($cid) ? 2 : intval($cid);
$lang = empty($lang) ? '0' : intval($lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<?php echo GetHeader(2, $cid); ?>
	<link rel="shortcut icon" id="favicon" href="/favicon.png" />
	<link rel="stylesheet" href="css/home.css" />
	<link rel="stylesheet" href="css/main.css?v=17.24" />
	<link rel="stylesheet" href="css/animation.css" />
	<style type="text/css">
		#intro {


			padding: 0;
			margin: 0;
			height: 0 !important;
			width: 0;
			overflow: hidden !important;
		}

		#intro .logo {
			float: left;
			margin: 0 10px 10px 0;
		}

		h1,
		h2,
		h3,
		h4,
		p,
		li {
			font-family: microsoft yahei;
		}

		@media screen and (min-width:600px) {
			<?php
			$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=76 or id=77 or id=78 or id=79)");
			$i = 1;
			while ($row = $dosql->GetArray()) {
			?>.slide<?php echo $i; ?> {
				background-image: url(<?php echo $row['picurl']; ?>);
			}

			<?php
				$i++;
			}
			?>
		}


		@media screen and (max-width:600px) {
			<?php
			$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=46 or id=47 or id=48 or id=49)");
			$i = 1;
			while ($row = $dosql->GetArray()) {
			?>.slide<?php echo $i; ?> {
				background-image: url(<?php echo $row['picurl']; ?>);
			}

			<?php
				$i++;
			}
			?>
		}

		@media screen and (min-width:600px) {
			<?php
			$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=11 or id=12 or id=14 or id=16 or id=17 or id=45 or id=45)");
			$i = 2;
			while ($row = $dosql->GetArray()) {
			?>.page<?php echo $i; ?> {
				background-image: url(<?php echo $row['picurl']; ?>);
			}

			<?php
				$i++;
			}
			?>
		}

		@media screen and (max-width:600px) {
			<?php
			$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=50 or id=51 or id=52 or id=53 or id=54 or id=55 or id=56)");
			$i = 2;
			while ($row = $dosql->GetArray()) {
			?>.page<?php echo $i; ?> {
				background-image: url(<?php echo $row['picurl']; ?>);
			}

			<?php
				$i++;
			}
			?>
		}


		@media screen and (min-width:1050px) {
			#index_x {
				display: none
			}
		}
	</style>
</head>
<script src="js/jquery-1.11.1.min.js"></script>
<script>
	$(document).ready(function() {
		$("#index_x").click(function() {
			$("#menu").hide();
		});
		$("#index_xs").click(function() {
			$("#menu").show();
		});
	});
</script>

<body>
	<header id="header">
		<div class="container clearfix">
			<h1 id="logo"> <?php

							$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=75");
							while ($row = $dosql->GetArray()) {
							?><a href="index.php"><img alt="logo图片" src="<?php echo $row['picurl']; ?>" /></a><?php
																											}
																												?></h1>
			<nav>
				<a class="icon_menu" id="index_xs"><img src="img/caidan.png"></a>
				<ul id="menu">

					<li data-menuanchor="page1" class="active"><a data-name="home" href="#page1"><span>首页</span></a></li>
					<?php echo GetNav(); ?>
					<li style=" width:100%;float:right" id="index_x"><img src="img/close.png" style="padding-right:15px; float:right; margin-top:10px"></li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- <div class="firstPage">
<p> 这里显示一些东西</p>

</div> -->

	<div class="page-container">
		<section class="section page1"">
			<div class=" rbslider-container">
			<div class="home-news">
				<span>NEWS:</span>
				<ul>
					<?php
					$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=2 OR parentstr LIKE '%,2,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
					$dopage->GetPage($sql, 5);
					while ($row = $dosql->GetArray()) {
						$clid = $row['classid'];
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
						else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
						else $gourl = $row['linkurl'];
					?>
						<li onclick="location='<?php echo $gourl; ?>'"><a href="<?php echo $gourl; ?>"><?php echo ReStrLen($row['title'], 20); ?></a></li>
					<?php
					}
					?>
				</ul>
				<a onclick="location='news.php'" href="news.php" class="more">more</a>
			</div>
			<div class="rbslider-wrapper">
				<div class="rbslider-slide slide1">
					<div class="slide-content slide-content-1">
						<?php

						$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=75");
						while ($row = $dosql->GetArray()) {
						?>
							<h2><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title1']; ?><b><?php echo $row['title2']; ?></b></a></h2>
							<p class="intro"><?php echo $row['content']; ?></p>

						<?php
						}
						?>
					</div>
				</div>
				<div class="rbslider-slide slide2">
					<div class="slide-content slide-content-2">
						<?php

						$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=3");
						while ($row = $dosql->GetArray()) {
						?>
							<h2><?php echo $row['title1']; ?></h2>
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title2']; ?></a></h3>
							<p class="intro"><?php echo $row['content']; ?></p>
						<?php
						}
						?>
					</div>
				</div>
				<div class="rbslider-slide slide3">
					<div class="slide-content slide-content-3">
						<div class="content-box">
							<?php

							$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=4");
							while ($row = $dosql->GetArray()) {
							?>
								<h2><?php echo $row['title1']; ?><b><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title2']; ?></a></b></h2>
								<p class="intro"><?php echo $row['title3']; ?><br /><?php echo $row['content']; ?></p>
							<?php
							}
							?>
						</div>
					</div>
					<div class="background-box"></div>
				</div>
				<div class="rbslider-slide slide4">
					<div class="slide-content slide-content-4">
						<?php

						$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=5");
						while ($row = $dosql->GetArray()) {
						?>
							<h2><?php echo $row['title1']; ?></h2>
							<h3><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title2']; ?></a></h3>
							<p class="intro"><?php echo $row['content']; ?></p>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<!-- <a class="move-down"></a> -->
			<div class="rbslider-pagination"></div>
	</div>
	</section>




	<section class="section page2">
		<div class="section-content-container">
			<div class="section-inner-wrap">
				<ul class="news-list-centre clearfix">
					<?php
					$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
					$dopage->GetPage($sql, 4);
					while ($row = $dosql->GetArray()) {
						$clid = $row['classid'];
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
						else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
						else $gourl = $row['linkurl'];
					?>
						<?php if ($lang == '0') { ?>
							<li class="clearfix">
								<div class="news-img">
									<a title="<?php echo $row['title']; ?>" href="<?php echo $gourl; ?>" class="img">
										<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>" /> </a>
									<div class="bl"></div>
								</div>
								<p class="date"><?php echo MyDate('d', $row['posttime']); ?><span><?php echo MyDate('m', $row['posttime']); ?></span></p>
								<h2 class="desc"><a href="<?php echo $gourl; ?>"><?php
																					if ($row['description'] != '')
																						echo ReStrLen($row['description'], 25);
																					else
																						echo '网站资料更新中...';
																					?></a></h2>
								<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> 次</p>

								<a href="<?php echo $gourl; ?>" class="more">查看详情>></a>
							</li>
						<?php } else { ?>
							<li class="clearfix">
								<div class="news-img">
									<a title="<?php echo $row['title2']; ?>" href="<?php echo $gourl; ?>&lang=1" class="img">
										<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title2']; ?>" /> </a>
									<div class="bl"></div>
								</div>
								<p class="date"><?php echo MyDate('d', $row['posttime']); ?><span><?php echo MyDate('m', $row['posttime']); ?></span></p>

								<h2><a href="<?php echo $gourl; ?>&lang=1"><?php echo $row['title2']; ?></a></h2>
								<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> 次</p>
								<p class="desc"><?php
												if ($row['description2'] != '')
													echo ReStrLen($row['description2'], 26);
												else
													echo '网站资料更新中...';
												?></p>
								<a href="<?php echo $gourl; ?>&lang=1" class="more">details >></a>
							</li>
					<?php
						}
					}
					?>
				</ul>
				<?php if ($dopage->GetList_Sum() > 1) {
					echo "<div class = 'getmore'><a href='news.php?cid=20'>查看更多>></a></div>";
				}	?>


			</div>
		</div>
	</section>




	<section class="section page3" style="background-position:center bottom;">
		<div class="section-content-container">
			<div class="section-inner-wrap">

				<ul class="news-list clearfix">
					<?php
					$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
					$dopage->GetPage($sql, 6);
					while ($row = $dosql->GetArray()) {
						$clid = $row['classid'];
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
						else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
						else $gourl = $row['linkurl'];
					?>
						<?php if ($lang == '0') { ?>
							<li class="clearfix">
								<div class="news-img">
									<a title="<?php echo $row['title']; ?>" href="<?php echo $gourl; ?>" class="img">
										<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>" /> </a>
									<div class="bl"></div>
								</div>

								<h2><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></h2>
								<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> 次</p>
								<p class="desc"><?php
												if ($row['description'] != '')
													echo ReStrLen($row['description'], 26);
												else
													echo '网站资料更新中...';
												?></p>
								<a href="<?php echo $gourl; ?>" class="more">查看详情>></a>
								<p class="date"><?php echo MyDate('d', $row['posttime']); ?><span><?php echo MyDate('m', $row['posttime']); ?></span></p>
							</li>
						<?php } else { ?>
							<li class="clearfix">
								<div class="news-img">
									<a title="<?php echo $row['title2']; ?>" href="<?php echo $gourl; ?>&lang=1" class="img">
										<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title2']; ?>" /> </a>
									<div class="bl"></div>
								</div>

								<h2><a href="<?php echo $gourl; ?>&lang=1"><?php echo $row['title2']; ?></a></h2>
								<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> 次</p>
								<p class="desc"><?php
												if ($row['description2'] != '')
													echo ReStrLen($row['description2'], 26);
												else
													echo '网站资料更新中...';
												?></p>
								<a href="<?php echo $gourl; ?>&lang=1" class="more">details >></a>
								<p class="date"><?php echo MyDate('d', $row['posttime']); ?><span><?php echo MyDate('m', $row['posttime']); ?></span></p>
							</li>
					<?php
						}
					}
					?>
				</ul>
				<?php if ($dopage->GetList_Sum() > 1) {
					echo "<div class = 'getmore'><a href='news.php?cid=21'>查看更多>></a></div>";
				}	?>
			</div>
		</div>
	</section>



	<section class="section page4" style="background-position:center bottom;">
		<div class="section-content-container">
			<div class="section-inner-wrap">
				<ul class="news-list-company clearfix">
					<?php
					$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
					$dopage->GetPage($sql, 6);
					while ($row = $dosql->GetArray()) {
						$clid = $row['classid'];
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
						else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
						else $gourl = $row['linkurl'];
					?>
						<?php if ($lang == '0') { ?>
							<li class="clearfix">
								<div class="news-img">
									<a title="<?php echo $row['title']; ?>" href="<?php echo $gourl; ?>" class="img">
										<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>" /> </a>
									<div class="bl"></div>
								</div>

								<h2><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></h2>
								<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> 次</p>
								<p class="desc"><?php
												if ($row['description'] != '')
													echo ReStrLen($row['description'], 26);
												else
													echo '网站资料更新中...';
												?></p>
								<a href="<?php echo $gourl; ?>" class="more">查看详情>></a>
								<p class="date"><?php echo MyDate('d', $row['posttime']); ?><span><?php echo MyDate('m', $row['posttime']); ?></span></p>
							</li>
						<?php } else { ?>
							<li class="clearfix">
								<div class="news-img">
									<a title="<?php echo $row['title2']; ?>" href="<?php echo $gourl; ?>&lang=1" class="img">
										<img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title2']; ?>" /> </a>
									<div class="bl"></div>
								</div>

								<h2><a href="<?php echo $gourl; ?>&lang=1"><?php echo $row['title2']; ?></a></h2>
								<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：<?php echo $row['hits']; ?> 次</p>
								<p class="desc"><?php
												if ($row['description2'] != '')
													echo ReStrLen($row['description2'], 26);
												else
													echo '网站资料更新中...';
												?></p>
								<a href="<?php echo $gourl; ?>&lang=1" class="more">details >></a>
								<p class="date"><?php echo MyDate('d', $row['posttime']); ?><span><?php echo MyDate('m', $row['posttime']); ?></span></p>
							</li>
					<?php
						}
					}
					?>
				</ul>
				<?php if ($dopage->GetList_Sum() > 1) {
					echo "<div class = 'getmore'><a href='news.php?cid=22'>查看更多>></a></div>";
				}	?>
			</div>
		</div>
	</section>


	<section class="section page5 white">
		<div class="section-content-container rbslider-item-list-container">
			<div class="section-inner-wrap">
				<!-- <div class="section-content"> -->
				<ul class="partner-list-sitiinfo clearfix">
					<?php
					$sql = "SELECT * FROM `pmw_sitiimg` WHERE  isShow = '1'";
					$dopage->GetPage($sql, 10);
					// $dopage->GetPage("SELECT * FROM `pmw_sitiimg` WHERE  isShow = '1'");
					while ($row = $dosql->GetArray()) {
					?>
						<li>
							<div class="con">
								<div class="img"><img alt="<?php echo $row['title']; ?>" src="<?php echo $row['picurl']; ?>" /></div>

								<h4><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title']; ?></a></h4>
								<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title']; ?></a></p>

							</div>

							<div class="ck"></div>
						</li>
					<?php
					}
					?>
				</ul>
				<!-- </div> -->
				<?php if ($dopage->GetList_Sum() > 1) {
					echo "<div class = 'getmore-siti'><a href='news.php?cid=23'>查看更多>></a></div>";
				}	?>
			</div>


		</div>

	</section>

	<section class="section page6">
		<div class="section-content-container marketing-content">
			<hgroup>
				<?php
				$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=68");
				while ($row = $dosql->GetArray()) {
				?>
					<h2><?php echo $row['title1']; ?></h2>
					<h3><?php echo $row['title2']; ?></h3>
				<?php
				}
				?>
			</hgroup>
			<div class="section-content">
				<ul class="marketing_list clearfix">
					<?php
					$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=69 or id=70 or id=71 or id=72 or id=73 or id=74)");
					while ($row = $dosql->GetArray()) {
					?>
						<li>
							<div class="icon">
								<div class="circular l"></div>
								<div class="circular r"></div>
								<span><img style="margin-top:30px" alt="<?php echo $row['title1']; ?>" src="<?php echo $row['picurl']; ?>" /></span>
							</div>
							<h4><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title1']; ?></a></h4>
							<p class="text">
								<a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title2']; ?><br><?php echo $row['title3']; ?></a></p>
						</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</section>

	<section class="section page7">
		<div class="section-content-container">
			<hgroup>
				<?php
				$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=67");
				while ($row = $dosql->GetArray()) {
				?>
					<h2><?php echo $row['title1']; ?></h2>
					<h3><?php echo $row['title2']; ?></h3>
				<?php
				}
				?>
			</hgroup>
			<div class="section-content">
				<ul class="partner-list clearfix">
					<?php
					$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=57 or id=58 or id=59 or id=60 or id=61 or id=62 or id=63 or id=64 or id=65 or id=66)");
					while ($row = $dosql->GetArray()) {
					?>
						<li>
							<div class="con">
								<div class="img"><img alt="<?php echo $row['title1']; ?>" src="<?php echo $row['picurl']; ?>" /></div>
								<h4><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title1']; ?></a></h4>
								<p><a href="<?php echo $row['linkurl']; ?>"><?php echo $row['title2']; ?></a></p>
							</div>
							<div class="ck"></div>
						</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</section>

	<section class="section page8">
		<div class="home-contact">
			<ul class="clearfix">

				<li class="center">
					<h2><a href="tel:<?php echo $cfg_hotline; ?>" class="联系电话"><?php echo $cfg_hotline; ?></a></h2>
					<p>
						<?php
						$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=43");
						while ($row = $dosql->GetArray()) {
						?>
							<?php echo $row['content']; ?>
						<?php
						}
						?>
					</p>
				</li>

				<li class="line"></li>
			</ul>
			<div class="clear"></div>

			<div class="kh">
				<h2><?php echo $cfg_copyright; ?></h2>
				<p style="color: #666; font-size:14px"><a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $cfg_icp; ?></a></p>
			</div>
		</div>
	</section>

	</div>
	<div id="panel">
		<ul class="icons">
			<li class="up" title="上一页"></li>
			<li class="qq"></li>
			<li class="tel"></li>
			<li class="wx"></li>
			<li class="down" title="下一页"></li>
		</ul>
		<ul class="info">
			<li class="qq">
				<p>在线沟通，请点我<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $cfg_qqcode; ?>&site=qq&menu=yes" target="_blank">在线咨询</a></p>
			</li>
			<li class="tel">
				<p>咨询热线：<br><?php echo $cfg_hotline; ?><br>客服qq：<br><?php echo $cfg_qqcode; ?></p>
			</li>
			<li class="wx">
				<div class="img"><?php

									$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=10");
									while ($row = $dosql->GetArray()) {
									?><img src="<?php echo $row['picurl']; ?>" /><?php
																				}
																					?></div>
			</li>
		</ul>
	</div>
	<div class="index_cy"></div>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript">
		$("header nav .icon_menu").click(function() {
			$(this).siblings("ul").toggleClass("show");
		});
		$("#panel .icons li").not(".up,.down").mouseenter(function() {
			$("#panel .info").addClass('hover');
			$("#panel .info li").hide();
			$("#panel .info li." + $(this).attr('class')).show();
		});
		$("#panel").mouseleave(function() {
			$("#panel .info").removeClass('hover');
		})
		$(".icons .up").click(function() {
			$.fn.ronbongpage.moveSectionUp();
		});
		$(".icons .down").click(function() {
			$.fn.ronbongpage.moveSectionDown();
		});
		$(".index_cy").click(function() {
			$("#panel").toggle();
			$(".index_cy").addClass('index_cy2');
			$(".index_cy2").removeClass('index_cy');
		});
	</script>
	<?php echo $cfg_countcode; ?>
	<script type="text/javascript" src="js/home.js"></script>
</body>

</html>