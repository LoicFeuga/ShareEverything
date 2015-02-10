	function getMessage(){

		var room = $("#room a label").html();
		$.ajax({
			type: "POST",
			url: "./php/action.php?action=get_message",
			data: {
				room: room
			},
			success: function(r) {
				var result = eval(r);
				$(".tchat").html(result[0]);
				
			}
		});    
		
	}


	var timer = setInterval(getMessage, 1000);

$(document).ready(function(){




	$("#send").click(function(){
		var message = $("#message").val();
		$("#message").val("");

		var pseudo = $("#pseudo a label").html();
		var room = $("#room a label").html();
			$.ajax({
				type: "POST",
				url: "./php/action.php?action=send_message",
				data: {
					message: message,
					pseudo: pseudo,
					room: room
				},
				success: function(r) {
					var result = eval(r);
					
					
				}
			});    
	});


});

	window.onbeforeunload = closeIt;
	
		//Fonction appelé au moment de fermer la page
		function closeIt()
		{
			alert("On passe");
			// On peut aussi appeler un script avec => location.href="http://monsite.fr/script.php"
		}
