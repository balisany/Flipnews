<!DOCTYPE html>
<html lang="en">
  <head ><title>Index</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       
  
  <style type='text/css'>    
  @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
  @import url(http://fonts.googleapis.com/earlyaccess/amiri.css);
  @import url(http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
  @import url(http://fonts.googleapis.com/earlyaccess/scheherazade.css);
  @import url(http://fonts.googleapis.com/earlyaccess/thabit.css);


     #results{ 
	     width: 45%; 
	     margin-left: 2%; 
	     border: 1px solid gray; 
	     padding: 5px; 
	     height:80%; 
	     overflow: auto; 
	     float: left;
	     margin-right: 15px;
     }  
     
  
       #results2{ 
  	     width: 45%; 
  	     margin-left: 2%; 
  	     border: 1px solid gray; 
  	     padding: 5px; 
  	     height:80%; 
  	     overflow: auto;
       }  
       
     
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
     
     button
     {
     	background: none;
     	border: none;
     	
     }
     
     button >span
     {
     cursor: pointer;
     width: 400px;
     text-align: right;
     vertical-align: text-top;
     font-size: 1.5em;
     color: #666;
     font-family: 'Droid Arabic Naskh', serif;
     letter-spacing: .1em;
     word-wrap: 1.1em;
     text-decoration: none;
     display: block;
     line-height: 1.7em;
     } 		
     
       #results2 > div
       {
       text-align: right;
       vertical-align: text-top;
       font-size: .9em;
       color: #666;
       font-family: 'Droid Arabic Naskh', serif;
       letter-spacing: .1em;
       word-wrap: 1.1em;
       line-height: 1.7em;
       	
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
	   	padding-right: 2px;
	   	vertical-align: middle;
	   	width: 80px;
	   	max-height: 50px;
	   } 
	   
	   #date
	   {
			font-size:.8em;
	 		color: red;
	 		
	 	}
	 	
	
    </style>  
  </head>  
  <body>  
	 	<div id='results'>
	 		
	 	</div>
	 	<div id='results2'>
	 		
	 	</div>
	 	 
    <script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>  
    <script>  
    
    // Calls YQL Web service, parses results, and outputs results  
    YUI().use('node', 'event', 'yql', function(Y) {  
      
          var stories = "<div><ul>"; 
          		var urlpath = "http://lvinpress.com/newdesign/";
               var news_url = "http://lvinpress.com/newdesign/Hewal.aspx?Cor=1";  
               var yql_query = "select * from html where url='" + news_url + "'";  
       		yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
               
               Y.YQL(yql_query, function(response) {  
                 if(response.query.results){  
                   var paras = response.query.results.div;  
                   paras.forEach(function(node,index) {  
                   		stories +="<li>	<form method='post' action='showcontent.php'>";
                   		stories += "<input type='hidden' name='link' value='" + urlpath + node.font.a.href + "'>";
                   		stories +="<img  src='"+ urlpath+node.font.img.src+"'/>";
                   		stories += "<button type='submit' name='lvinpress'>";
                        stories += "<span>"+node.font.a.content+"</span>";  
                    	stories += "</button>";  
                    	stories +="<span id='date'>"+node.font.span+"</span></form></li>";
                     
       //				stories += "<li>"+ node.content + "</li>";
                      
                  });  
       
                 } else{  
            stories += "Sorry, could not find any headlines for the url " + news_url + ". Please try another one.";  
          }  
          stories += "</ul></div>";  
          Y.one('#results').append(stories);  
          stories = "";  
      });   
    });    
    
    
    
    // Calls YQL Web service, parses results, and outputs results  
    YUI().use('node', 'event', 'yql', function(Y) {  
      
          var stories = "<div><ul>"; 
          		var urlpath = "http://nrttv.com/";
               var news_url = "http://lvinpress.com/newdesign/Hewal.aspx?Cor=1";  
               var yql_query = "select * from html where url='http://nrttv.com' and xpath='//td[@class=\"td-slider\"]//div/div'|truncate(count=6)";  
       		//yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
               
               Y.YQL(yql_query, function(response) {  
                 if(response.query.results){  
                   var paras = response.query.results.div;  
                   paras.forEach(function(node,index) {  
                   		
                   		stories +="<li>	<form method='post' action='showcontent.php'>";
                   		stories += "<input type='hidden' name='link' value='" + urlpath + node.a.href + "'>";
                   		stories +="<img  src='"+ urlpath+node.img.src+"'/>";
                   		stories += "<button type='submit' name='nrttv'>";
                   		stories += "<span>"+node.a.content+"</span>";  
                   		stories += "</button>";  
                   		stories +="<span id='date'></span></form></li>";
                   		                      
                  });  
       
                 } else{  
            stories += "Sorry, could not find any headlines for the url " + news_url + ". Please try another one.";  
          }  
          stories += "</ul></div>";  
          Y.one('#results2').append(stories);  
          stories = "";  
      });   
    });  
    
         
    </script>  
    