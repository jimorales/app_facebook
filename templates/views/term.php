<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Vélez Pre Home / Home</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="assets/fonts/stylesheet.css" type="text/css" />
<link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
<link href="assets/css/lightbox.css" rel="stylesheet" />
<script src="assets/js/modernizr-2.5.3.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery.js"><\/script>')</script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script> 
</head>
<body>
 <div class="bg-inter-face-lightbox"> 
  <div class="close">
    <img src="assets/images/icono/close.png" alt="Close">
  </div>    
        <div id="content_1" class="content terminos "><!--inicio scrooll --> 
        <H1>Todo el contenido AKA</H1>       
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan erat id tortor iaculis commodo. Duis a purus vestibulum, adipiscing elit et, rutrum libero. Duis pulvinar interdum massa, at dapibus magna laoreet vitae. Quisque lacinia bibendum odio ac dapibus. Sed dignissim ipsum non elit eleifend, ut interdum velit tempus. Suspendisse massa </p>
            <h2>Heading h2</h2>
          <p>tortor, faucibus ac pretium et, rutrum sed quam. Nullam et turpis rutrum, aliquam libero eget, semper neque. Integer at nisi a erat pretium euismod. Duis ac nibh ultricies, luctus dolor in, bibendum felis. Nulla sed ligula cursus, fermentum leo eu, bibendum magna.</p>
          <p>tortor, faucibus ac pretium et, rutrum sed quam. Nullam et turpis rutrum, aliquam libero eget, semper neque. Integer at nisi a erat pretium euismod. Duis ac nibh ultricies, luctus dolor in, bibendum felis. Nulla sed ligula cursus, fermentum leo eu, bibendum magna.</p>    
		<h4>Heading h3</h4>            
		<ul>
			<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan erat id tortor iaculis commodo. Duis a purus vestibulum</li>
			<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan erat id tortor iaculis commodo. Duis a purus vestibulum</li>
		</ul>
		<ol>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan erat id tortor iaculis commodo. Duis a purus vestibulum</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan erat id tortor iaculis commodo. Duis a purus vestibulum</li>
		</ol>
        </div> <!-- fin scrooll -->
      </div>	
	<script>
		(function($){
			$(window).load(function(){
				$("#content_1").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
				$(".close").click(function(){
					parent.jQuery.fancybox.close();
				}); 
			});
		})(jQuery);
	</script>
</body>
</html>
