<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Velez for Leathers Lovers</title>                

        <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/style.css" type="text/css" />
        <?/*<link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/main.css" type="text/css" />*/?>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/fonts/stylesheet.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/jquery.mCustomScrollbar.css" type="text/css" />        
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/jquery.fancybox.css" type="text/css" />		         		
		
        <script src="<?php echo $baseUrl; ?>/assets/js/form.js"></script>                        
        <script src="<?php echo $baseUrl; ?>/assets/js/modernizr.js"></script>        
        <script> var baseUrl = "<?php echo $baseUrl; ?>"; </script>
        <script type="text/javascript">
            (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/es_LA/all.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $baseUrl; ?>/assets/js/jquery.js"><\/script>')</script>
        <script src="<?php echo $baseUrl; ?>/assets/js/jquery-migrate.js"></script>
		<script src="<?php echo $baseUrl; ?>/assets/js/jquery.fancybox.js"></script>			
    </head>
    <body>
		<div class="wrapper-app-velez">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->                  
			<?php echo $content; ?>
		</div>
		<a href="http://www.smdigital.com.co/index_desktop.php" target="_blank" class="by" title="SMDigital">
			<img src="<?php echo $baseUrl; ?>/assets/images/icono/by-sm-digital.png" alt="SMDigital">
		</a>	
		<script src="<?php echo $baseUrl; ?>/assets/js/main.js"></script>	
        <?/*       
        <script src="<?php echo $baseUrl; ?>/assets/js/CustomScrollbar.concat.min.js"></script>        
        <script src="<?php echo $baseUrl; ?>/assets/js/jquery.simplemodal.1.4.3.min.js"></script>                
        <script src="<?php echo $baseUrl; ?>/assets/js/plugins.js"></script>*/?>
		<script>
			$(document).ready(function() {
				$("#term_show, #term_show2").click(function() {
					$.fancybox.open({
						href : '<?php echo $baseUrl; ?>/term',
						type : 'iframe',
						padding : 5
					});
				});
			});
		</script>
    </body>
</html>
