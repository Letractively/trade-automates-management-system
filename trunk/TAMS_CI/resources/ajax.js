

// Functon to Show out Busy Div
function showBusy(){
	$('#busy').show('slow');
}

// function to process form response
function processForm(html){

		$('#errors').hide('slow');
		
		window.setTimeout( function(){
		 	
			$('#busy').hide('slow');
			
			if(parseFloat(html)){
		 		$('#ajaxform').after('Thank you for submitting');
		 		$('#ajaxform').hide('slow');
		 	}else{
		 		$('#errors').html(html).show('slow');
		 	}
		 	
		 }, 3000);
	
}


$(document).ready(function() {

	// $.AJAX Example Request
	$('#ajaxform').submit(function(eve){
		eve.preventDefault();
		
		$.ajax({
			url: "/jquery/ajaxprocess",
			type: "POST",
			dataType: "html",
			data: $('#ajaxform').serialize(),
			beforeSend: function(){
				showBusy();
			},	
		  	success: function(html) {
		    	processForm(html);
		 	}
		});

	});	


	// $.POST Example Request
	$('#myform').submit(function(eve){
		eve.preventDefault();
		
		// Hide Errors incase its open
		$('#errors').hide('slow');
		
		var firstN = $('#first_name').val();
		var lastN = $('#last_name').val();
		
		$.post('/jquery/processform/',{
			first_name: firstN, last_name: lastN},
		 function(html){
		 	if(parseFloat(html)){
		 		$('#myform').after('Thank you for submitting');
		 		$('#myform').hide('slow');
		 	}else{
		 		$('#errors').html(html).show('slow');
		 	}
		});	
	});

	
	// $>GET <a>	
	$('a.nav').live('click', function(eve){
		eve.preventDefault();
		//var taskText = document.getElementById("task").getAttribute("href");
		$.get($(this).attr("href"), function(html){
				//$('#task').after('Load Complete See Below');
				//$('#task').text('success').hide();
				$('#content').html(html).show('slow');
		});
		
	});
	
	// $>GET Logout	
	$('#login').live('click', function(eve){
		//eve.preventDefault();
		$.get($(this).attr("href"), function(html){
				$('#login').text('Вийти');
				//$('#task').text('success').hide();
				//$('#hidden').text(html).show('slow');
		});
		
	});
	
	// $>GET Logout	
	$('#logout').live('click', function(eve){
		//eve.preventDefault();
		$.get($(this).attr("href"), function(html){
				$('#logout').text('Увійти');
				//$('#task').text('success').hide();
				//$('#hidden').text(html).show('slow');
		});
		
	});
	
	
});

