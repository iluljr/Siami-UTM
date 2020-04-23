<!DOCTYPE html>
<html lang="en">

<head>
        <title>Website Camilan Goreng Dua Putra</title>
        <link href="<?php echo base_url('asset/css/bootstrap.css')?>" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url() ?>asset/js/js/jquery.min.js"></script>
         <!-- Custom Theme files -->
        <link href="<?php echo base_url('asset/css/style1.css')?>" rel='stylesheet' type='text/css' />
         <!-- Custom Theme files -->
         <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="<?php echo base_url() ?>asset/js/js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo base_url('asset/js/js/easing.js')?>"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
         <!---- start-smoth-scrolling---->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        </script>
        <!----webfonts--->
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
        <!---//webfonts--->
        <!----start-top-nav-script---->
        <script>
            $(function() {
                var pull        = $('#pull');
                    menu        = $('nav ul');
                    menuHeight  = menu.height();
                $(pull).on('click', function(e) {
                    e.preventDefault();
                    menu.slideToggle();
                });
                $(window).resize(function(){
                    var w = $(window).width();
                    if(w > 320 && menu.is(':hidden')) {
                        menu.removeAttr('style');
                    }
                });
            });
        </script>
        <!----//End-top-nav-script---->
    </head>
    <body>
    <!----container---->
        <div class="container">
    <!----top-header---->
            <div class="top-header">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo base_url('asset/images/logo.png')?>" title="barndlogo" /></a>
                </div>
                <div class="top-header-info">
                    <div class="top-contact-info">
                        <ul class="unstyled-list list-inline">
                            <li><span class="phone"> </span>---- No Telepon -----</li>
                            <li><span class="mail"> </span><a href="#">----- Email -----</a></li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                    <div class="cart-details">
                        <div class="add-to-cart">
                            <ul class="unstyled-list list-inline">
                                <li><span class="cart"> </span>
                                    <ul class="cart-sub">
                                        <li><p>0 Products</p></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="login-rigister">
                            <ul class="unstyled-list list-inline">
                                <li><a class="login" href="<?= base_url('auth')?>">Login</a></li>
                                <li><a class="rigister" href="<?= base_url('auth/regis')?>">REGISTER <span> </span></a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!----//top-header---->
            <!---top-header-nav---->
            <div class="top-header-nav"> 
            <!----start-top-nav---->
             <nav class="top-nav main-menu">
                    <ul class="top-nav">
                        <li><a href="#">PRODUK </a><span> </span></li>
                        <li><a href="<?= base_url('auth'); ?>">PESANAN SAYA</a><span> </span></li>
                        <li><a href="#">TENTANG KAMI</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <a href="#" id="pull"><img src="<?php echo base_url('asset/images/nav-icon.png')?>" title="menu" /></a>
              </nav>
              <!----End-top-nav---->
              <!---top-header-search-box--->
              <div class="top-header-search-box">
                <form>
                    <input type="text" placeholder="Search" required / maxlength="22">
                    <input type="submit" value=" " >
                </form>
              </div>
              <!---top-header-search-box--->
                        <div class="clearfix"> </div>
            </div>
        </div>
<!-- ***** Header Area End ***** -->