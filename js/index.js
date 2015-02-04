
$(document).ready(function(){
	
	/*
	$("#b").click(function(){
		alert('ok');
	});*/

	$("#createRoom").click(function(){
		$("#displayJoin").css("display","none");
		$("#displayCreate").css("display","block");
	});

	$("#joinRoom").click(function(){
		$("#displayCreate").css("display","none");
		$("#displayJoin").css("display","block");
	});

	$("#btnCreate").click(function(){
		var pseudo = $("#twPseudo").val();
		var room = $("#twRoomName").val();
		var description = $("#twRoomDescription").val();


		$.ajax({
			type: "POST",
			url: "./php/action.php?action=create_room",
			data: {
				pseudo: pseudo,
				room: room,
				description: description
			},
			success: function(r) {
				var result = eval(r);
				document.location="room.php";
						
			}
		});    
		
	});
});