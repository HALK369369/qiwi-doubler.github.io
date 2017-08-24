<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$prof_data = $db->FetchArray();
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/images/icons/favicon.png" />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/normalize.css" />
    <link rel="stylesheet" href="/css/foundation.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/animate.min.css" />
    <link rel="stylesheet" href="/css/morphext.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <link rel="stylesheet" href="/css/slicknav.css">
    <link rel="stylesheet" href="/style.css" />
    <script src="/js/vendor/modernizr.js"></script>
  </head>
<body> 
<header class="alt-1">
<div class="message">
<div class="row">
<div class="small-12 columns">
<div class="message-intro">
<span class="message-line"></span>
<p>...</p>
<span class="message-line"></span>
</div>

<h1><span id="js-rotating">ИНВЕСТИЦИИОННЫЙ ФОНД № 1 В РОССИИ</span></h1>

<?if(!isset($_SESSION['login'])):?>

<div data-wow-delay="0.2s"  class="wow zoomIn hostingfeatures"> 
 
<a href="/login" class="small radius button">Авторизация</a>

<a href="/signup" class="small radius button">Регистрация</a>

</div>

<?endif?>

<?
if (isset($_SESSION['login'])) {
 ?>
	
<a href="/account" class="small radius button">Аккаунт</a>
<a href="/account/exit" class="small radius button">Выйти</a>
           
<? } ?>

</div>

</div>

</div>
<div class="top">

  <div class="row">

  <div class="small-12 large-3 medium-3 columns">

   <div class="logo">

   <a href="http://ikey.su/" title=""><img src="/images/logo.png" alt="" title="ИНВЕСТИЦИОННЫЙ ФОНД №1 В РОССИИ"/></a>

   </div>

</div>

    <nav class="desktop-menu">
         <ul class="sf-menu">
         <li class="current-menu-item">

         <li><a href="/">Главная</a></li>
		 
		 <li><a href="/news">Новости</a></li>

		 <li><a href="/about">О Проекте</a></li>
		 
         <li><a href="/fac">F.A.Q.</a></li>

		 <li><a href="/reviews">Отзывы</a></li>
		 
		 <li><a href="/rules">Правила</a></li>
		 
         <li><a href="/contacts">Контакты</a></li>
	 
    </ul>	
  </nav>  
  <nav class="mobile-menu">

    <ul>

    <li><a href="/">Главная</a></li>

         </li>

		 <li><a href="/news">Новости</a></li>
		 
		 <li><a href="/about">О Проекте</a></li>
		 
         <li><a href="/fac">F.A.Q.</a></li>

		 <li><a href="/reviews">Отзывы</a></li>
		 
		 <li><a href="/rules">Правила</a></li>
		 
         <li><a href="/contacts">Контакты</a></li>

</ul>

  </nav>
  </div>

  </div>

  </div>

</header>