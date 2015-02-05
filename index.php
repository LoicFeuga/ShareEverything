<?php include 'php/header.php'; ?>

<div class="container">
	<div class="row">	
		<div id="displayCreate" class="col-lg-12">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"></span>
				<input type="text" id="twPseudo" class="form-control" placeholder="Your pseudo " aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"></span>
				<input type="text" id="twRoomName" class="form-control" placeholder="Room name" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon2"></span>
				<input type="text" id="twRoomDescription" class="form-control" placeholder="Room description" aria-describedby="basic-addon2">
			</div>
			<div id="btnCreate"class="btn btn-info" >Create</div>
		</div>

		<div id="displayJoin" class="col-lg-12">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"></span>
				<input type="text" id="twJPseudo" class="form-control" placeholder="Your pseudo " aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"></span>
				<input type="text" id="twJRoomName" class="form-control" placeholder="Room name" aria-describedby="basic-addon1">
			</div> 	
			<div id="btnJoin" class="btn btn-info">Join</div>
		</div> 
</div>




<!-- Inclusion des pages jquery 
<script src="https://code.jquery.com/jquery.min.js"></script>-->

		<!-- En local-->

		<script src="js/jquery/jquery.js"></script>
	
	<!-- Inclusion des pages JavaScript -->
	<script src="js/index.js"></script>

</body>

</html>
