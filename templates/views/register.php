	<header>			
		<figure class="logo">
			<img src="<?php echo $baseUrl; ?>/assets/images/logo-velez.png" alt="Logo Vélez" title="Vélez">
		</figure>
		<h1>COMPLETAR REGISTRO</h1>
		<p class="registro">¡Solo por registrarte, <strong>PARTICIPAS</strong> en la entrega <br>
	de <strong>2 REGALOS</strong> que hacen parte  <br>
	de esta gran sorpresa que tiene Vélez para ti!</p>
				
	</header>	
	<form id="frm-register" class="inline">			
		<input type="hidden" value="<?php echo $id; ?>" name="strIdFacebook">		
	<section class="registro-left">
		<div class="datos">
			<label for="name">Nombre:</label>
			<input type="text" id="name" name="strName" data-required="true" tabindex="1">
		</div>
		<div class="datos">
			<label for="mail">Mail:</label>
			<input type="text" id="mail" name="strMail" data-required="true" data-type="email" tabindex="3">
		</div>
		<div class="datos">
			<label for="department" class="relative">	
			Departamento:	</label>	
			<input type="text" id="department" name="strDepartment" data-required="true" tabindex="4">				
		</div>
		<div class="datos">
			<label for="address">Dirección:</label>
			<input type="text" id="address" name="strAddress" data-required="true" tabindex="7">			
		</div>
		<div class="datos">
			<label for="phone">Celular:</label>
			<input type="text" id="phone" name="strPhone" data-required="true" data-type="digits" tabindex="9">			
		</div>
		<div class="datos">
			<div class="message"> 
				Debe llenar todos los campos correctamente.				
			</div>		
		</div>
	</section>	
	<section class="registro-left right">
		<div class="datos">
			<label for="lastname">Apellidos:</label>
			<input type="text" id="lastname" name="strLastname" data-required="true" tabindex="2">		
		</div>
		<div class="datos">
			<label for="identification">Cedula:</label>
			<input type="text" id="identification" name="strIdentification" data-required="true" data-type="digits" tabindex="4">
		</div>
		<div class="datos">
			<label for="datebirth">Fecha de Nacimiento:</label>
			<div class="my-select2">
				<div class="fecha">
					<select id="day" name="intDay" data-required="true" class="styled" tabindex="6">
						<option value="0">Día</option>
						<?php for($i=1;$i<=31;$i++){ 
							if($i<=9){
							?>
								<option value="<?='0'.$i?>"><?='0'.$i?></option>
							<? }else{ ?>
								<option value="<?=$i?>"><?=$i?></option>
						<?php } 
						} ?>
					</select>
				</div>
				<div class="fecha">
					<select id="month" name="intMonth" data-required="true" class="styled" tabindex="6">
						<option value="0">Mes</option>
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
				</div>
				<div class="fecha margin">
					<select id="year" name="intYear" data-required="true" class="styled" tabindex="6">
						<option value="0">Año</option>
						<?php for($i=1960;$i<=2000;$i++){ ?>
							<option value="<?=$i?>"><?=$i?></option>
						<?php } ?>
					</select> 
				</div>
			</div>
			<?/*			
			<select id="year" name="intYear" data-required="true" class="option" tabindex="6">
				<option value="0">Año</option>
				<?php for($i=1960;$i<=2000;$i++){ ?>
					<option value="<?=$i?>"><?=$i?></option>
				<?php } ?>
			</select> 
			<input type="text" id="date_birth" name="dtDateBirth" tabindex="6">*/?>
		</div>
		
		<div class="datos">
			<label for="city" class="relative">Ciudad:</label>
			<input type="text" id="city" name="strCity" data-required="true" tabindex="6">								
		</div>		
		<div class="datos">
			<label for="telephone">* Teléfono:</label>
			<input type="text" id="telephone" name="strTelephone" data-required="true" data-type="digits" tabindex="8">			
		</div>			
		<div class="datos">
			<input type="checkbox" class="styled" id="term" name="intTerm" data-required="true" value="1" tabindex="10">	
			<a href="#" class="acepto" id="term_show">Acepto términos y condiciones</a>				
			<button type="button" class="submit">Registrarme</button>			
		</div>
	</section>			
	</form>
	<footer>
      <p class="center"><a href="#">Politicas de privacidad</a> | <a href="#" id="term_show2">Términos y condiciones</a> | Todos los derechos reservados 2013</p>
    </footer>
</section>	
<script type="text/javascript">
	$(window).load(function(){
		var me = JSON.parse(localStorage.me);
		$("#mail").val( me.email );
		$("#name").val( me.first_name );
		$("#lastname").val( me.last_name );
		dateBirth = me.birthday;
		if(dateBirth){
			var dB= dateBirth.split("/");		
			$('#day option[value="'+dB[1]+'"]').prop('selected',true);
			$("#selectintDay").html(dB[1]);	
			$('#month option[value="'+dB[0]+'"]').prop('selected',true);		
			var mes = $('#month>option:selected').text();;
			$("#selectintMonth").html(mes);
			$('#year option[value="'+dB[2]+'"]').prop('selected',true);
			$("#selectintYear").html(dB[2]);
		}
		str = me.location.name;
		var n=str.split(", ");
		$("#city").val(n[0]);
		$("#department").val(n[1]);
	})
</script>