<?php require_once(dirname(__FILE__) . '/include/config.inc.php');

$cid = empty($cid) ? 2 : intval($cid);
// $lang = empty($lang) ? '0' : intval($lang);
$lang = '0';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<title>东源县电子商务公共服务中心</title>
	<link rel="shortcut icon" id="favicon" href="/favicon.png" />
	<link rel="stylesheet" href="css/home.css" />
	<link rel="stylesheet" href="css/main.css?v=17.24" />
	<link rel="stylesheet" href="css/animation.css" />
	<link rel="stylesheet" href="css/mystyle.css" />
	<script src="js/echarts.js" type="text/javascript" charset="utf-8"></script>
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

		/* 首页头部四张大图 */
		<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=76 or id=77 or id=78 or id=79)");
		$i = 1;
		while ($row = $dosql->GetArray()) {
		?>.img<?php echo $i; ?> {
			width: 1440px;
			height: 600px;
		}


		.img<?php echo $i; ?>img {
			background-color: #ccc;
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		<?php
			$i++;
		}
		?>

		/* 入驻企业 */
		<?php
		$dopage->GetPage("SELECT * FROM `pmw_company` WHERE isExamine = 1");
		$i = 1;
		$oneWidth = 250;
		$num = $dopage->total;

		$totalWidth = $num * $oneWidth;
		?>@-webkit-keyframes companymove {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		@-moz-keyframes companymove {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		@-ms-keyframes companymove {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		@keyframes companymove {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		.companylist {
			-webkit-animation: <?php echo $num * 4 . 's'  ?> companymove infinite linear;
			-moz-animation: <?php echo $num * 4 . 's'  ?> companymove infinite linear;
			-ms-animation: <?php echo $num * 4 . 's'  ?> companymove infinite linear;
			animation: <?php echo $num * 4 . 's'  ?> companymove infinite linear;
			left: <?php echo '-' . $totalWidth . 'px' ?>;
			width: <?php echo $totalWidth * 2 . 'px' ?>;

			position: absolute;

			top: 0;

			height: 300px;
		}


		/* 特色产品 */
		<?php
		$dopage->GetPage("SELECT * FROM `pmw_product` WHERE isExamine = 1");
		$i = 1;
		$oneWidth = 250;
		$num = $dopage->total;

		$totalWidth = $num * $oneWidth;
		?>@-webkit-keyframes move {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		@-moz-keyframes move {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		@-ms-keyframes move {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		@keyframes move {
			0% {
				left: 0;
			}

			100% {
				left: <?php echo '-' . $totalWidth . 'px' ?>;
			}
		}

		.list {
			-webkit-animation: <?php echo $num * 4 . 's'  ?> move infinite linear;
			-moz-animation: <?php echo $num * 4 . 's'  ?> move infinite linear;
			-ms-animation: <?php echo $num * 4 . 's'  ?> move infinite linear;
			animation: <?php echo $num * 4 . 's'  ?> move infinite linear;
			left: <?php echo '-' . $totalWidth . 'px' ?>;
			width: <?php echo $totalWidth * 2 . 'px' ?>;

			position: absolute;
			top: 0;
			height: 300px;
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


		<?php
		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE (id=76 or id=77 or id=78 or id=79)");
		$i = 1;
		while ($row = $dosql->GetArray()) {
		?>
			$('.img<?php echo $i ?>').attr("src", '<?php echo $row['picurl']; ?>');
		<?php
			$i++;
		} ?>

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
				</ul>
			</nav>
		</div>
	</header>


	<div class="banner">
		<div class="inner">
			<div class="innerwrapper">
				<div class="img"><img class="img1" src=""></img></div>
			</div>
			<div class="innerwrapper">
				<div class="img"><img class="img2" src=""></img></div>
			</div>
			<div class="innerwrapper">
				<div class="img"><img class="img3" src=""></img></div>
			</div>
			<div class="innerwrapper">
				<div class="img"><img class="img4" src=""></img></div>
			</div>
			<div class="innerwrapper">
				<div class="img"><img class="img1" src=""></img></div>
			</div>
		</div>
	</div>

	<div class="page1">
		<div class="notice">
			<div class="page1_head">
				<span class="page1_head_title">通知公告</span>
				<!-- <a class="page1_more" href="">查看更多</a> -->
				<?php
				$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=20) AND delstate='' AND checkinfo=true   ORDER BY orderid DESC";

				$dopage->GetPage($sql, 6);
				if ($dopage->totalpage > 1) {

					echo "<a class='page1_more' href='news.php?cid=20'>查看更多>></a>";
				}	?>
			</div>
			<ul class="page1_bodyUL">
				<?php

				while ($row = $dosql->GetArray()) {
					$clid = $row['classid'];
					if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
					else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
					else $gourl = $row['linkurl'];
				?>
					<li>
						<h2 class="desc"><a href="<?php echo $gourl; ?>">
								<?php if ($row['description'] != '')
									echo ReStrLen($row['description'], 20);
								else
									echo '网站资料更新中...'; ?></a></h2>
						<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：
							<?php echo $row['hits']; ?> 次</p>
					</li>
				<?php }


				?>

			</ul>

		</div>

		<div class="centre">
			<div class="page1_head">
				<span class="page1_head_title">中心动态</span>
				<?php
				$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=21) AND delstate='' AND checkinfo=true   ORDER BY orderid DESC";

				$dopage->GetPage($sql, 6);
				if ($dopage->totalpage > 1) {

					echo "<a class='page1_more' href='news.php?cid=21'>查看更多>></a>";
				}	?> </div>
			<ul class="page1_bodyUL">
				<?php

				while ($row = $dosql->GetArray()) {
					$clid = $row['classid'];
					if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
					else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
					else $gourl = $row['linkurl'];
				?>
					<li>
						<h2 class="desc"><a href="<?php echo $gourl; ?>">
								<?php if ($row['description'] != '')
									echo ReStrLen($row['description'], 20);
								else
									echo '网站资料更新中...'; ?></a></h2>
						<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：
							<?php echo $row['hits']; ?> 次</p>
					</li>
				<?php
				}
				?>
			</ul>
		</div>


		<div class="company">
			<div class="page1_head">
				<span class="page1_head_title">企业动态</span>
				<?php
				$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=22) AND delstate='' AND checkinfo=true   ORDER BY orderid DESC";
				$dopage->GetPage($sql, 6);
				if ($dopage->totalpage > 1) {
					echo "<a class='page1_more' href='news.php?cid=22'>查看更多>></a>";
				}	?> </div>
			<ul class="page1_bodyUL">
				<?php

				while ($row = $dosql->GetArray()) {
					$clid = $row['classid'];
					if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
					else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
					else $gourl = $row['linkurl'];
				?>

					<li>
						<h2 class="desc"><a href="<?php echo $gourl; ?>">
								<?php if ($row['description'] != '')
									echo ReStrLen($row['description'], 20);
								else
									echo '网站资料更新中...'; ?></a></h2>
						<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：
							<?php echo $row['hits']; ?> 次</p>
					</li>
				<?php
				}
				?>
		</div>
	</div>


	<div class="page2">
		<div class="page2_box">
			<div class="mainTitle">
				<h1 class="titleBox">站点信息</h1>
			</div>
			<div class="sitiInfo" id="sitiInfo">
			</div>
		</div>
	</div>


	<div class="page3">
		<div class="page3_box">
			<div class="mainTitle">
				<h1 class="titleBox">电商扶持</h1>
			</div>
			<div class="onlineRetailers">
				<div class="page3_head">
					<span class="page3_head_title">电商资讯</span>
					<!-- <a class="page1_more" href="">查看更多</a> -->
					<?php
					$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=23) AND delstate='' AND checkinfo=true   ORDER BY orderid DESC";

					$dopage->GetPage($sql, 6);
					if ($dopage->totalpage > 1) {

						echo "<a class='page3_more' href='news.php?cid=20'>查看更多>></a>";
					}	?>
				</div>
				<ul class="page3_bodyUL">
					<?php

					while ($row = $dosql->GetArray()) {
						$clid = $row['classid'];
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
						else if ($cfg_isreurl == 'Y') $gourl = 'newsshow-' . $row['classid'] . '-' . $row['id'] . '-1.html';
						else $gourl = $row['linkurl'];
					?>

						<li>
							<h2 class="desc"><a href="<?php echo $gourl; ?>">
									<?php if ($row['description'] != '')
										echo ReStrLen($row['description'], 20);
									else
										echo '网站资料更新中...'; ?></a></h2>
							<p class="info">时间：<?php echo GetDateTime($row['posttime']); ?><u>•</u>点击：
								<?php echo $row['hits']; ?> 次</p>
						</li>
					<?php
					}
					?>

				</ul>
			</div>

			<div class="EServer">
				<div class="page3_head">
					<span class="page3_head_title">电商服务</span>
				</div>
				<ul>
					<li>
						<div class="main3R1">
							<a href="fixednewsshow.php?id=1" class="main3RBtn">
								什么是电商
							</a>
						</div>
						<div class="main3R1">
							<a href="" class="main3RBtn">
								电商的好处
							</a>
						</div>
					</li>

					<li>
						<div class="main3R1">
							<a href="" class="main3RBtn">
								电商培训
							</a>
						</div>
						<div class="main3R1">
							<a href="" class="main3RBtn">
								企业展示
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class=" page4">
		<div class="page4_box">
			<div class="mainTitle">
				<h1 class="titleBox">入驻企业</h1>
			</div>
			<div class="product">
				<div class="product_box">
					<ul class="companylist" id="companylist">
						<?php
						for ($j = 0; $j < 2; $j++) {
							$dopage->GetPage("SELECT * FROM `pmw_company` WHERE isExamine = 1");
							while ($row = $dosql->GetArray()) {
						?>
								<li><a href=<?php echo $row['linkurl'] ?> title="<?php echo $row['name'] ?>"><img src="<?php echo $row['picurl'] ?>"></img></a>
									<p><?php echo $row['name'] ?></p>
								</li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>

			<div class="companyApplyInfo">
				<div class="companyApplyInfo_head">
					<span class="companyApplyInfo_title">企业申请动态</span>
					<?php
					$sql = "SELECT * FROM `pmw_company` ORDER BY id DESC";
					$dopage->GetPage($sql, 6);
					if ($dopage->totalpage > 1) {

						echo "<a class='companyApply_more' href='news.php?cid=20'>查看更多>></a>";
					} ?>
				</div>

				<ul class="companyApplyInfoUL">

					<?php while ($row = $dosql->GetArray()) {
						if ($row['isExamine']  == 1) {

					?>
							<li>
								<p class="applysuccess"><?php echo ReStrLen($row['name'] . '入驻申请已经通过', 20); ?></p>
							</li>
						<?php
						} else if ($row['isExamine']  == 0) {
						?>
							<li>
								<p class="applying"><?php echo ReStrLen($row['name'] . '正在申请入驻', 20); ?></p>
							</li>
					<?php
						}
					}

					?>
				</ul>
			</div>


			<div class="companyApplyServer">
				<div class="companyApplyServer_head">
					<span class="companyApplyServer_title">企业服务</span>
				</div>
				<ul>
					<li>
						<div class="main3R2">
							<a href="" class="main3RBtn">
								企业须知
							</a>
						</div>
						<div class="main3R2">
							<a href="" class="main3RBtn">
								申请入驻
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>


	<div class="page5">
		<div class="page5_box">
			<div class="mainTitle">
				<h1 class="titleBox">特色产品</h1>
			</div>
			<div class="product">
				<div class="product_box">
					<ul class="list" id="list">
						<?php
						for ($j = 0; $j < 2; $j++) {
							$dopage->GetPage("SELECT * FROM `pmw_product` WHERE isExamine = 1");
							while ($row = $dosql->GetArray()) {
						?>
								<li><a href=<?php echo $row['linkurl'] ?> title="<?php echo $row['title'] ?>"><img src="<?php echo $row['picurl'] ?>"></img></a>
									<p><?php echo $row['describe'] ?></p>
								</li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="footer">
		<div class="footer_box">
			<div class="footerC">
				<a href="">第一个网址</a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="">第二个网址</a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="">第三个网址</a>
			</div>
			<div class="footerC">
				<span>© 2020 东源县电子商务公共服务中心. </span>
				<span>粤ICP备16070611号</span>
			</div>
		</div>
	</div>


	<!-- <div class="index_cy"></div> -->
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
	<script type="text/javascript">
		var myChart = echarts.init(document.getElementById("sitiInfo"));
		$.get('js/map.geojson', function(geoJson) {

			myChart.hideLoading();

			echarts.registerMap('map', geoJson);

			myChart.setOption(option = {
				title: {
					text: '东源站点情况',
					subtext: '数据来源上报系统',
				},
				tooltip: {
					trigger: 'item',
					formatter: '{b}<br/>{c}'
				},
				toolbox: {
					show: true,
					orient: 'vertical',
					left: 'right',
					top: 'center',
					feature: {
						dataView: {
							readOnly: false
						},
						restore: {},
						saveAsImage: {}
					}
				},
				series: [{
					name: '东源县站点情况',
					type: 'map',
					mapType: 'map', // 自定义扩展图表类型
					label: {
						show: true
					},
					data: [{
							name: '仙塘镇',
							value: 20057.34
						},
						{
							name: '灯塔镇',
							value: 15477.48
						},
						{
							name: '骆湖镇',
							value: 31686.1
						},
						{
							name: '船塘镇',
							value: 6992.6
						},
						{
							name: '顺天镇',
							value: 44045.49
						},
						{
							name: '上莞镇',
							value: 40689.64
						},
						{
							name: '曾田镇',
							value: 37659.78
						},
						{
							name: '柳城镇',
							value: 45180.97
						},
						{
							name: '义合镇',
							value: 55204.26
						},

					],
				}]
			});
		});
	</script>
</body>

</html>