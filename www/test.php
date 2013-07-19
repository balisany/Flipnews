<html>

<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
</head>

<body>
		
		
			<form id="foo">
			    <label for="bar">A bar</label>
			    <input id="bar" name="bar" type="text" value="" />
			    <input type="submit" value="Send" />
			</form>
			  <!-- the result of the search will be rendered inside this div -->
			  <div id="result"></div>
		<script type="text/javascript">
			/* attach a submit handler to the form */
			$("#foo").submit(function(event) {
			
			  /* stop form from submitting normally */
			  event.preventDefault();
			
			  /*clear result div*/
			   $("#result").append('');
			
			  /* get some values from elements on the page: */
			   var values = $(this).serialize();
			
			  /* Send the data using post and put the results in a div */
			    $.ajax({
			      url: "test2.php",
			      type: "post",
			      data: values,
			      success: function(data){
			        	alert(data.id);
			           $("#result").html('submitted successfully');
			      },
			      error:function(){
			          alert("failure");
			          $("#result").html('there is error while submit');
			      }   
			    }); 
			});
		</script>
		
			
</body>


</html>
