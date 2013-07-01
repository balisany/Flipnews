<html>
    <head>
    	 <link href="css/contentstyle.css" rel="stylesheet">
    
    
     <style>
     

     </style>
     <script src="" type="text/javascript">
     </script>
           </head>
    <body>
    	<div id='result'></div>
        <div id='container'></div>
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
     <script type="text/javascript" src="script.js"></script>
    	<script type="text/javascript">
    	var kurdishsrc ='&#1587;&#1607;&#8204;&#1585;&#1670;&#1575;&#1608;&#1607;&#8204;';
    	<?php 
    		if(isset($_POST['nrttv'])){
    	 ?>
 		requestCrossDomain('<?php echo $_POST['link']; ?>','//td[@class=\'td-dynamic-right\']', function(results) {  
 			   $('#container').html(results);
 			  
 			    
			 	$('#result').append('<h1>'+$("td.td-details-dreje h3").text()+'</h1>');
			 	$('#result').append('<span id="date">'+$('.td-extra-info p').text()+'</span><br />');
			 	$('#result').append($('img').first());
			 	$('.td-extra-info p').remove();
			 
			 	$('.td-dynamic-right p').each(function () {
			 		$('#result').append(this);
			 	});
			 	$("td.td-details-dreje h3").remove();
			 	$('table.page-contents').remove();
			 	$('img').each(function() {
			 		 var src = $(this).attr("src");
			 		 $('img').attr("src", function() {
			 		     return "http://nrttv.com/" + src;
			 		 });
			 	});
			 	$('#result').append("<a id='linksrc' href='<?php echo $_POST['link']; ?>'> "+ kurdishsrc+": NRT</a>");
			 	$('#container').remove();
			  });
 		
      // var img = $('.img-dreje').attr('src');
       <?php } ?>
       
           	<?php 
           		if(isset($_POST['lvinpress'])){
           	 ?>
        		requestCrossDomain('<?php echo $_POST['link']; ?>','//td[@class=\'td-details-dreje\']', function(results) {  
        			   $('#container').html(results);
       // 			   $('.page-contents').remove();
       // 			   $('.ul-like').remove();
       				
       			 	
       			 	$('#result').append('<h1>'+$("h3").text()+'</h1>');
       			 	var lo = $('td.td-details-dreje div span').first();
       			 	$('#result').append('<span id="date">'+lo.text()+'</span><br />');
       			 	if($('img').length !=0)
       			 	{
       			 	$('#result').append($('img').first());
       			 	}
       			 	$('.td-details-dreje p').each(function () {
       			 		if((this).innerHTML != '&nbsp;'){
       			 		$('#result').append(this);
       			 		}
       			 	});
       			 	$('td.td-details-dreje h3').remove();
       			 	$('td.td-details-dreje div').remove();
       			 	$('td.td-details-dreje table').remove();
       				$('img').each(function() {
       					 var src = $(this).attr("src");
       					 $(this).attr("src", function() {
       					     return "http://lvinpress.com/newdesign/" + src;
       					 });
       			 	});
        			  });
        		
             // var img = $('.img-dreje').attr('src');
              <?php } ?>
       
       	<?php 
           		if(isset($_POST['rudaw'])){
           	 ?>
        		requestCrossDomain('<?php echo $_POST['link']; ?>','//div[@class=\'mainColumn\']', function(results) {  
        			   $('#container').html(results);
        			   $('.commentsHolder.margBot20').remove();
        			   $('.subPageSecondCol').remove();
        			   $('.subPageSecondCol').remove();
        			   $('.specialContent .question').remove();
       				   $('#result').append('<h1>'+$(".articleTitle").text()+'</h1>');
       				   $('#result').append('<span id="date">'+$('span.newsDate').text()+'</span><br />');
       				   $('#result').append($('img#articleBigImage'));
       				   $('.galleryImageHeight').find('iframe').appendTo('#result');
       			 	   $(".articleTitle").remove();
       			 	   $('.imageDesc').remove();
       			 	   if($('#printableArea > div > p').length!=0){
       			 	   		$('#printableArea > div > p').each(function () {
       			 	   			$('#result').append('<p>'+(this).innerHTML+'</p>');
       			 	   		});
       			 	   	}
       			 	   else if($('#printableArea > p').length!=0){
       			 	   		$('#printableArea > p').each(function () {
       			 	   			$('#result').append('<p>'+(this).innerHTML+'</p>');
       			 	   		});
       			 	   	}
       			 	   	else {
       			 	   		$('#printableArea > p').each(function () {
       			 	   			$('#result').append('<p>'+(this).innerHTML+'</p>');
       			 	   		});
       			 	   	}
					   $('#container').remove();
        			  });
        		
             // var img = $('.img-dreje').attr('src');
              <?php } ?>
      
     </script>
    
</html>