
  
<html>  
  <head><title>Show content</title>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">      
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/contentstyle.css" rel="stylesheet">
    
    <script src="http://code.jquery.com/jquery-latest.min.js"
            type="text/javascript"></script>
    
   <style type='text/css'>    
  	    
   </style>  
    <script type='text/javascript'>  
		
    </script>  
  </head>  
  <body>

    <div id='results'>
    
    </div>  
    
    <div id="slides">
        
    </div>

        
    <script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>  
    <script>  
    // Calls YQL Web service, parses results, and outputs results  
    YUI().use('node', 'event', 'yql', function(Y) {  
          var stories = "<div>";
          var sliders = "";
          		var src = '<?php echo $_POST['link']; ?>';
          		var kurdishsrc ='&#1587;&#1607;&#8204;&#1585;&#1670;&#1575;&#1608;&#1607;&#8204;';
          	   var urlpath = "http://lvinpress.com/newdesign/";
          	   var urlpath2 = "http://nrttv.com/";
               <?php if(isset($_POST['lvinpress'])){ ?>
               var yql_query = "select * from html where url='<?php echo $_POST['link']; ?>' and xpath='//td[@class=\"td-details-dreje\"]'";  
             
              
               Y.YQL(yql_query, function(response) {  
                 if(response.query.results){  
                   var paras = response.query.results.td; 
                   var no_items=paras.length; 
                   		stories +="<h1>" +paras.h3 + "</h1>";
                   		stories +="<span id='date'>"+paras.div.span[0].content+"</span>";
                   		stories +="<p>";
                   		stories += "<img src='"+ urlpath + paras.img.src + "'/>";
                   		if (paras.hasOwnProperty('p')) {
                   		$.each(paras.p, function(i,nr){
                   			if(nr.hasOwnProperty('content')){
                   				if(nr.content !='text-align: right;'){
                   					stories += nr.content + "<br />";
                   				}		
                   			}
                   			else{
                   				if(nr !='[object Object]' || nr !='text-align: right;' || nr !=','){
                   				stories += nr+ "<br />";
                   				}
                   			}
                   			if(nr.hasOwnProperty('img')){
                   				stories += "<img src='"+ urlpath + nr.img.src + "'/>";
                   			}
                   		});
                   		stories += "<a id='linksrc' href='"+src+"'>Lvinpress:  "+ kurdishsrc+"</a>";
                   		stories +="</p>";	
                   		}
       				
                 } 
                  <?php } ?>
                  
                  <?php if(isset($_POST['nrttv'])){ ?>
                    var yql_query = "select * from html where url='<?php echo $_POST['link']; ?>' and xpath='//td[@class=\"td-dynamic-right\"]//table/tr'";  
                  
                    Y.YQL(yql_query, function(response) {  
                      if(response.query.results){  
                        var paras = response.query.results.tr; 
                        var no_items=paras.length; 
                        		stories +="<h1>" +paras[0].td.h3+ "</h1>";
                        		stories +="<span id='date'>"+paras[1].td[2].p+"</span>";
                        		stories +="<p>";
                        		stories += "<img src='"+ urlpath2 + paras[0].td.img.src + "'/>";
                        		stories += paras[2].td.p.content+ "<br />";
                        		stories += "<a id='linksrc' href='"+src+"'>NRT:  "+ kurdishsrc+"</a>";
//                        		if(paras[2].td.p.hasOwnProperty('a')){
//                        			stories +=  "asf<br />";
//                        			}
//                        		
//                        		if (paras.hasOwnProperty('p')) {
//                        		$.each(paras.p, function(i,nr){
//                        			if(nr.hasOwnProperty('content')){
//                        				stories += nr.content + "<br />";		
//                        			}
//                        			else{
//                        				stories += nr+ "<br />";
//                        			}
//                        			if(nr.hasOwnProperty('img')){
//                        				stories += "<img src='"+ urlpath + nr.img.src + "'/>";
//                        			}
//                        		});
                        		//stories +=" </p>";
                        		if(no_items==5){
	                        		if(paras[4].td.class=="td-details"){
	                        				
	                        				for (var i = 0; i < paras[4].td.a.length-1; i++) {
													sliders += "<img src='"+ urlpath2 + paras[4].td.a[i].href + "'/>";
												}
	                        				
	                        			}
	                        		}
                        		
                        		
                  			
                      } 
                       <?php } ?>
                 
                 else{  
            stories += "Sorry, could not find any headlines for the url . Please try another one.";  
          }  
          
          stories += "</div>";
          Y.one('#results').append(stories);  
          Y.one('#slides').append(sliders);

      });   
    });         
    </script> 
      	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      	<script  type="text/javascript">
      		$('#slides').load('google.no');
      	
      	
      	</script>
  