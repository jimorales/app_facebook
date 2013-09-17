<link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/dios.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/animate.css" type="text/css" />

<header>
	<figure class="logo"> <img src="<?php echo $baseUrl; ?>/assets/images/logo-velez.png" alt="Logo Vélez" title="Vélez"> </figure>
	<p>Con Vélez, elige un mensaje <br>
	  para regalarle <strong>TIEMPO</strong> a los que mas quieres.</p>
	<div id="tiempo">Banco de Tiempo Velez</div>
	<div id="relog"> <span><?=$time?></span>
	  <div class="clr"></div>
	  <span class="horas">HORAS</span> </div>
</header>
<section class="home">
	<div id="bg-inter-face">
		<h3>Tiempo para mi: </h3>
		<div id="tabwrap">      
			<ul id="tabs">
			  <li class="current"><a href="#amigo">AMIG@</a></li>
			  <li><a href="#novio">NOVI@</a></li>
			  <li><a href="#trabajo">TRABAJ@</a></li>
			  <li><a href="#familia">FAMILIA</a></li>
			</ul>
			<div id="content">
			<div id="amigo" class="current  animated fadeInLeft">
				<div id="content_1" class="content ">  <!--inicio scrooll -->				  
					<?php foreach ($messages_cat1 as $value1) : ?>
						<article class="arenas">
							<p><?=$value1['strContent']?></p> 
							<div class="tiempo">
							  <span onclick="publish_message('<?=$value1['strContent']?>', '<?=$value1['intTimeDiscount']?>', '<?=$value1['intID']?>')">Compartir</span>
							  <h4><?=$value1['intTimeDiscount']?></h4>
							</div>						
						</article>
					<?php endforeach; ?>				  
				</div> <!-- fin scrooll -->
			</div>
			<div id="novio" class="animated fadeInLeft">
				<div id="content_2" class="content ">  <!--inicio scrooll -->
				  <?php foreach ($messages_cat2 as $value1) : ?>
						<article class="arenas">
							<p><?=$value1['strContent']?></p> 
							<div class="tiempo">
							  <span onclick="publish_message('<?=$value1['strContent']?>', '<?=$value1['intTimeDiscount']?>', '<?=$value1['intID']?>')">Compartir</span>
							  <h4><?=$value1['intTimeDiscount']?></h4>
							</div>						
						</article>
					<?php endforeach; ?>	
				</div> <!-- fin scrooll -->
			</div>
			<div id="trabajo" class="animated fadeInLeft">
				<div id="content_3" class="content ">  <!--inicio scrooll -->
					<?php foreach ($messages_cat3 as $value1) : ?>
						<article class="arenas">
							<p><?=$value1['strContent']?></p> 
							<div class="tiempo">
							  <span onclick="publish_message('<?=$value1['strContent']?>', '<?=$value1['intTimeDiscount']?>', '<?=$value1['intID']?>')">Compartir</span>
							  <h4><?=$value1['intTimeDiscount']?></h4>
							</div>						
						</article>
					<?php endforeach; ?>	      
				</div> <!-- fin scrooll -->
			</div>
			<div id="familia" class="animated fadeInLeft">
				<div id="content_4" class="content ">  <!--inicio scrooll -->
					  <?php foreach ($messages_cat4 as $value1) : ?>
						<article class="arenas">
							<p><?=$value1['strContent']?></p> 
							<div class="tiempo">
							  <span onclick="publish_message('<?=$value1['strContent']?>', '<?=$value1['intTimeDiscount']?>', '<?=$value1['intID']?>')">Compartir</span>
							  <h4><?=$value1['intTimeDiscount']?></h4>
							</div>						
						</article>
					<?php endforeach; ?>	
				</div> <!-- fin scrooll -->
			</div>
			</div>
		</div>
    </div>
    <div id="arena"> <img src="<?php echo $baseUrl; ?>/assets/images/bg-arena-left.png" alt="Arena"> </div>
    <div class="clr"></div>
    <footer>
      <p><a href="#">Politicas de privacidad</a> | <a href="javascript:;" id="term_show2">Términos y condiciones</a> | Todos los derechos reservados 2013</p>
    </footer>
</section>	

<script>
	window.fbAsyncInit = function() {
		FB.init({ appId  : '1424024264489838', status : true, cookie : true, xfbml  : true });
		FB.Canvas.setAutoGrow();	
		FB.login(function(data){    	
			if(data.authResponse){
			}
		},{ scope: 'email,user_likes,user_location,user_birthday,publish_actions,publish_stream' });
	}
	function publish_message(contentMessage, amountTime, idMsj){			
		FB.ui({
			method: 'apprequests',
			max_recipients: 1,
			message: "Escoge un amigo de la lista para compartir el mensaje."
		},function(response){
			if(response){				
				var friend = response.to[0];				
				FB.ui({
				  method: 'feed',
				  to: friend,
				  link: 'http://www.velez.com.co/es/',
				  picture: 'https://smzonecontrol1.com/facebookapps/velez/tiemposvelez/assets/images/logo_velez.png',
				  name: 'Mensaje de amor y amistad de Velez',
				  //caption: 'Mensaje compartido de Velez',
				  description: contentMessage
				}, function(publish){
					if (publish){
						discountTime(friend, amountTime, idMsj);
						$('#share_success').html('Felicidades, tu mensaje ha sido compartido en el muro de tu amigo.');							
						$('#share_success').toggle('slow');
					}else{
						console.log('No publicado');							
						$('#share_success').html('Hubo un error al publicar tu mensaje, intenta nuevamente');
						$('#share_success').toggle('slow');
					}
				});
			}
		});			
	}	
	function changeTime(newtime){
		$('#currentTime').html(newtime);
	}
	function discountTime(idFriend, amountTime, idMsj){
		/*console.log(idFriend);
		console.log(amountTime);*/		
		$.ajax({
			url   	  : baseUrl + '/time',
			type 	  : "POST",
			dataType : 'json',
			data 	  : { 
				data : amountTime, 
				idMessage : idMsj,			
				strIdFacebookFriend : idFriend			
			},
			success  : function( data ){				
				changeTime(data.n); 
			}
		});		
	}

</script>
<script src="<?php echo $baseUrl; ?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="<?php echo $baseUrl; ?>/assets/js/script.js"></script>
<script>
		(function($){
			$(window).load(function(){
				$("#content_1, #content_2, #content_3, #content_4").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
			});
		})(jQuery);
</script>