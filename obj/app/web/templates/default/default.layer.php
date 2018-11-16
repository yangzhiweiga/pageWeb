<!DOCTYPE HTML>
<!--
	Twenty 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title><?=$this->data['title'];?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <script src="<?= $this->res('css/ie/html5shiv.js') ?>"></script>
    <script src="<?= $this->res('js/jquery.min.js') ?>"></script>
    <script src="<?= $this->res('js/jquery.dropotron.min.js') ?>"></script>
    <script src="<?= $this->res('js/skel.min.js') ?>"></script>
    <script src="<?= $this->res('js/skel-layers.min.js') ?>"></script>
    <script src="<?= $this->res('js/init.js') ?>"></script>
    <link rel="stylesheet" href="<?= $this->res('css/skel.css') ?>"/>
    <link rel="stylesheet" href="<?= $this->res('css/style.css').'?=t'.time() ?>"/>
    <link rel="stylesheet" href="<?= $this->res('css/style-noscript.css') ?>"/>

    <link rel="stylesheet" href="<?= $this->res('css/ie/v8.css').'?=t'.time() ?>"/>
    <link rel="stylesheet" href="<?= $this->res('css/ie/v9.css').'?=t'.time() ?>"/>
</head>
<body class="index loading">
<!-- Header -->
<header id="header" class="alt">
    <h1 id="logo"><a href="index.tpl.php">悦涵 <span>成长时光</span></a></h1>
    <nav id="nav">
        <ul>
            <?php foreach($this->data['nav_list'] as $nav):?>
            <?php if(empty($nav['pid'])):?>
                    <li class="current"><a href="<?=$nav['url'];?>"><?=$nav['name'];?></a></li>
                <?php else:?>
                                <li class="submenu">
                                    <a href="<?=$nav['url'];?>"><?=$nav['name'];?></a>
                                    <ul>
                                        <?php foreach($nav['pid'] as $n):?>
                                        <li><a href="<?=$n['url'];?>"><?=$n['name'];?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
    </nav>
</header>
<?php echo empty($content) ? "" : $content ?>
<!-- Footer -->
<footer id="footer">

    <ul class="icons">
        <li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
        <li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
        <li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
    </ul>

    <span class="copyright">&copy; Untitled. All rights reserved.Collect from <a href="http://www.cssmoban.com/"
                                                                                 title="网站模板" target="_blank">网站模板</a>  Design: <a
            href="#">HTML5 UP</a>.</span>

</footer>
<script src="<?php echo $this->res('libs/jquery/1.11.1/jquery.min.js') ?>"></script>
<script src="<?php echo $this->res('libs/bootstrap/3.3.5/js/bootstrap.min.js') ?>"></script>
</body>
</html>
