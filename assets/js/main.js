function init(){
	/*	if( $('form').is('form') ){
		$('form').parsley({ showErrors: false });
	}*/

		
	/*$("#term").click(function(e){
		e.preventDefault();
		e.stopPropagation();
		$.ajax({
		  url: baseUrl+"/term",
		  success: function(data){		
		  	console.log( data );
		  	$.modal.defaults.closeClass = "close";
		  	$.modal(data, {	close:true });
		  	$("#content_1").mCustomScrollbar({});
		  }
		});
	});	*/
}

function submit( e ){	
	$(".message").hide();
	//if( $('form').parsley('validate') )
	if(($('#name').val()!='')&&($('#mail').val()!='')&&($('#department').val()!='')&&($('#address').val()!='')&&($('#phone').val()!='')&&($('#lastname').val()!='')&&($('#identification').val()!='')&&($('#city').val()!='')&&($('#telephone').val()!='')&&($('#term').is(':checked')))
	{
		$.ajax({
			 url   	  : baseUrl + '/save'
			,type 	  : "POST"
			,dataType : 'json'
			,data 	  : $("form").serialize()
			,success  : function( data ){
				console.log(data.n);
				if( parseInt(data.n) != ''){
					window.location.href = baseUrl+"/publish/"+parseInt(data.n);
				}else{
					window.location.href = baseUrl+"/register";
				}
			}
		});
	}else{		
		$(".message").show('slow');
	}
	e.preventDefault();
	e.stopPropagation();
}

function getCitys(e){
	var value = $(this).val();	
	if( $.trim( value ) != 0 ){
		$.ajax({
			 url   	  : baseUrl + '/getcitys'
			,type 	  : "POST"
			,dataType : 'json'
			,data 	  : { data : value }
			,success  : function( data ){				
				$("select[name='intCity'] option:gt(0)").remove();
				$.each(data, function( i , v){
					$("select[name='intCity']").append("<option value='"+v.intId+"'>"+v.strNombre+"</option>");
				})				
			}
		});
	}else{
		$("select[naame='intCity'] option:gt(0)").remove();
	}
}

$(document).on('ready', init);
$(document).on('click', 'button.submit', submit);
$(document).on('change', "select[name='intDepartment']", getCitys);