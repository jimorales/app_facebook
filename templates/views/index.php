	<header>
		<span>Para ingresar a</span>
		<figure>
			<img src="<?php echo $baseUrl; ?>/assets/images/logo-velez.png" alt="Logo Vélez" title="Vélez">
		</figure>	
		<div id="flecha">
			<span>hazte fan de nuestra marca <br>
	y síguenos</span>
		</div>		
	</header>
	<section class="pre-home">
		<article>
			<p>Con Vélez, elige un mensaje <br>
	para regalarle <strong>TIEMPO</strong> a los que mas quieres.</p>
		</article>
		<section>
			<a href="#">¿Qué es el concurso y cómo participar?</a>
		</section>
	</section>
	

<script type="text/javascript">
window.fbAsyncInit = function() {	
    FB.init({ appId  : '1424024264489838', status : true, cookie : true, xfbml  : true });
    FB.Canvas.setAutoGrow();	
    FB.login(function(data){    	
        if(data.authResponse){  			
            FB.api('/me/likes/174240536014567', { access_token: data.authResponse.accessToken }, function(response) {                
				if(response.data.length == 1){                	
                    FB.api('/me', function(me){                    	                  		
                    	localStorage.me = JSON.stringify(me);
                    	window.location.href  = baseUrl+"/register";
                    });
                }else { }
            });
        }
    },{ scope: 'email,user_likes,user_location,user_birthday,publish_actions,publish_stream' });
};
</script>