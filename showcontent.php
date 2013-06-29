
  
<html>  
  <head><title>Show content</title>      
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <style type='text/css'>    
  @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
  @import url(http://fonts.googleapis.com/earlyaccess/amiri.css);
  @import url(http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
  @import url(http://fonts.googleapis.com/earlyaccess/scheherazade.css);
  @import url(http://fonts.googleapis.com/earlyaccess/thabit.css);


      #results{ width: 80%; margin-left: 10%; border: 1px solid gray; padding: 5px; height:80%; overflow: auto; }  
     ul
     {
     	float: right;
     	 direction: rtl;
     	 clear: both;
     	 list-style-type: none;
     }
     
     ul li
     {
     	margin-bottom: 20px;	
     }
     
     ul li a     {
     width: 400px;
     text-align: right;
     vertical-align: text-top;
     font-size: 1.0em;
     color: #666;
     font-family: 'Droid Arabic Naskh', serif;
     letter-spacing: .1em;
     word-wrap: 1.1em;
     text-decoration: none;
     display: block;
     line-height: 1.7em;
     }
     
     p{
     	padding: 10px 20px;
     	text-align: right;
     	vertical-align: text-top;
     	font-size: 1.0em;
     	color: #666;
     	font-family: 'Droid Arabic Naskh', serif;
     	letter-spacing: .1em;
     	word-wrap: 1.1em;
     	text-decoration: none;
     	display: block;
     	line-height: 1.7em;
     	float: right;
     }
     
     h1{
     	padding: 10px 20px;
     	text-align: right;
     	vertical-align: text-top;
     	font-size: 1.2em;
     	color: #666;
     	font-family: 'Droid Arabic Naskh', serif;
     } 		
	    
	  ul li a:hover
	  {
	  	color: blue;   	
	     }
	     
	   img
	   {
	    float: right;
	   	border: none;
	   	padding-left: 20px;
	   	padding-right: 10px;
	   	vertical-align: middle;
	   	max-width: 35%;
	   } 
	   #date{
	   		padding: 0px 20px;
	   		float: right;
			font-size:.8em;
			text-align: right;
	 	 }
	    
    </style>  
    <script type='text/javascript'>  
		
				
    </script>  
  </head>  
  <body>

    <div id='results'></div>  
    <script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>  
    <script>  
    // Calls YQL Web service, parses results, and outputs results  
    YUI().use('node', 'event', 'yql', function(Y) {  
          var stories = "<div>"; 
          	   var urlpath = "http://lvinpress.com/newdesign/";
          	   var urlpath2 = "http://nrttv.com/";
               <?php if(isset($_POST['lvinpress'])){ ?>
               var yql_query = "select * from html where url='<?php echo $_POST['link']; ?>' and xpath='//td[@class=\"td-details-dreje\"]'";  
             
              
               Y.YQL(yql_query, function(response) {  
                 if(response.query.results){  
                   var paras = response.query.results.td; 
                   var no_items=paras.length; 
                   		stories +="<h1>" +paras.h3 + "</h1>";
                   		stories +="<p>";
                   		stories += "<img src='"+ urlpath + paras.img.src + "'/>";
                   		if (paras.hasOwnProperty('p')) {
                   		$.each(paras.p, function(i,nr){
                   			if(nr.hasOwnProperty('content')){
                   				stories += nr.content + "<br />";		
                   			}
                   			else{
                   				stories += nr+ "<br />";
                   			}
                   			if(nr.hasOwnProperty('img')){
                   				stories += "<img src='"+ urlpath + nr.img.src + "'/>";
                   			}
                   		});
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
                        		stories +="</p>";	
                        		
                  			
                      } 
                       <?php } ?>
                 
                 else{  
            stories += "Sorry, could not find any headlines for the url . Please try another one.";  
          }  
          
          stories += "</div>";  
          Y.one('#results').append(stories);  
          stories = "";  

      });   
    });         
    </script>  
  