<!DOCTYPE html>
<html>

	<head>
		

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">		
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!--  jQuery -->
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>

	<body>
		
	<div class="container" id="navigationbar">

		<div class="col-md-10">
		 
                   
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                                
                        <!-- Modal content-->
                        <div class="modal-dialog modal-md">
	    				    <div style="color:white;background-color:#008CBA" class="modal-content">
		    				    <div class="modal-header">
		    					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    					<h4 style="color:white" class="modal-title" id="myModalLabel">Enter the email to send the report to</h4>
		    				    </div>

		    				    <div class="modal-body">
		    					Email Address: 
		    					<input type="hidden" value="" name="last_id" id="recovery-email" class="form-control" autocomplete="off">	   
		    					<input type="email" name="email_add" id="recovery-email" class="form-control" autocomplete="off">	   
		    				    </div>

		    				    <div class="modal-footer">
		    					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		    					<button type="submit" class="btn btn-custom" name="send">Send</button>
		    				    </div>
	    				    </div>
    			        </div>
                              
                    </div>
        	<!-- END OF MODAL POPUP -->
					</div>
			
					<div class="jumbotron" align="center">
					<br>

					<form action="tst.php" method="POST">
						<input type="text" id="firstname" name="firstname">
						<input type="text" id="surname" name="surname">

					 	<button type="button" name="save" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="store_data('firstname', 'surname')">Save</button>
					</form>

					</div>	


					<p id="screen"></p>		
		</div>


		<script type="text/javascript">
			function store_data(a1, a2){
				var a1 = document.getElementById(a1);
				var a2 = document.getElementById(a2);

				//Create our XMLHttpRequest object
				var hr = new XMLHttpRequest();
				//Create some variables we need to send to our PHP file
				var url = "process_data.php";
				var first_name = a1.value;
				var surname = a2.value;

				var vars = "firstname="+first_name+"&surname="+surname;
				
				hr.open("POST", url, true);
				//Set content type header information for sending url encoded variables in the request
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				//Access the onreadystatechange event for the XMLHttpRequest object
				hr.onreadystatechange = function() {
					if (hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						document.getElementById("screen").innerHTML = return_data;
					}
				}

				//Send the data to PHP now... and wait for response to update the status div
				hr.send(vars);//Actually execute the request
				document.getElementById("screen").innerHTML = "processing...";
			}
		</script>

	</body>
</html>

