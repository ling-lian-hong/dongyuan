<?php
require_once(dirname(__FILE__) . '/include/config.inc.php');

//初始化参数检测正确性
$id  = empty($id)  ? 0 : intval($id);
$lang = '0';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="renderer" content="webkit" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />

    <title>公共服务中心</title>
    <link rel="shortcut icon" id="favicon" href="/favicon.png" />

    <link rel="stylesheet" href="css/main.css?v=17.24" />
    <link rel="stylesheet" href="css/animation.css" />
</head>

<body class="details-page open">
    <?php

    //检测文档正确性
    $r = $dosql->GetOne("SELECT * FROM `#@__fixednews` WHERE targetid=$id");
    if (@$r) {
        $row = $dosql->GetOne("SELECT * FROM `#@__fixednews` WHERE targetid=$id");
    ?>
        <div id="main-container">
            <div class="inner-wrap">
                <article>
                    <h1><?php echo $row['title']; ?></h1>            
                    <p class="info">更新时间：<?php echo $row['createTime']; ?></p>
                    <div class="content"><?php
                                            if ($row['content'] != '')
                                                echo GetContPage($row['content']);
                                            else
                                                echo '网站资料更新中...';
                                            ?></div>
                </article>
            </div>

        </div>
        <?php
    }
        ?>
        <aside class="main">        
            <nav class="aside-container">

                <ul>
                    <li><a href="index.php">网站首页</a></li>
                    <li><a class="cur" href="news.php"><?php echo GetCatName(2); ?></a></li>
                </ul>

            </nav>
        
        <footer>
            <?php echo $cfg_author; ?><br />
            <?php echo $cfg_copyright; ?>
        </footer>
        </aside>
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
       
</body>

</html>