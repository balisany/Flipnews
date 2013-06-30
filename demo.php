<html>
    <head>
    	 <link href="css/contentstyle.css" rel="stylesheet">
    
    
     <style>
     

     </style>
     <script src="" type="text/javascript">
     </script>
           </head>
    <body>
        <div id='container'></div>
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
     <script type="text/javascript" src="script.js"></script>
    	<script type="text/javascript">
    
 		requestCrossDomain('http://www.nrttv.com/dreje.aspx?jimare=31282', function(results) {  
 			   $('#container').html(results);
 			   $('.page-contents').remove();
 			   $('.ul-like').remove();
 			  var src = $('img.img-dreje').attr("src");  
 			   $('img.img-dreje').attr("src", function() {
 			       return "http://www.nrttv.com/" + src;
 			   });
 			});
 		
      // var img = $('.img-dreje').attr('src');
       
     </script>
    
</html>