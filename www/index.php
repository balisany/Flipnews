<!DOCTYPE html>
<html lang="en">
  <head ><title>Index</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <link href="css/main.css" rel="stylesheet">  
  
  </head>  
  <body>  
	<div id='results'>
			<div id="toppanel">
				
				<select name="antall" id="antall_lvin">
					<option value="3">3</option>
					<option value="5">5</option>
					<option value="10">10</option>
				</select> 
					<input type="submit" id="vislvin" value="Lvinopress" />
				
			</div>
	 	</div>
	
	 
		<div id='results2'>
			<div id="toppanel">
				<select name="antall" id="antall_nrt">
					<option value="3">3</option>
					<option value="5">5</option>
					<option value="10">10</option>
				</select> 
					<input type="submit" id="visnrt" value="Vis NRT" />
			
				
			</div>
			
			
		</div>
		<div id='results3'>
		<div id="toppanel" >
			<select name="antall" id="antall_rudaw">
				<option value="3">3</option>
				<option value="5">5</option>
				<option value="10">10</option>
			</select> 
				<input type="submit" id="visrudaw" value="Vis Rudaw" />

			
		</div>
			
		</div>
		
		<div id='results4'>
				<div id="toppanel" >
				<select name="antall" id="antall_awene">
					<option value="3">3</option>
					<option value="5">5</option>
					<option value="10">10</option>
				</select> 
						<input type="submit" id="visawene" value="Vis Awene" />
		
					
				</div>
					
				</div>
				
		<div id='results5'>
				<div id="toppanel" >
				<select name="antall" id="antall_peyamner">
					<option value="3">3</option>
					<option value="5">5</option>
					<option value="10">10</option>
				</select> 
						<input type="submit" id="vispeyamner" value="Vis Peyamner" />
		
					
				</div>
					
				</div>
		

    <script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>  
    
    // Calls YQL Web service, parses results, and outputs results 
     
    YUI().use('node', 'event', 'yql', function(Y) {  
        Y.one("#vislvin").on('click',function() {
         var antall = Y.one('#antall_lvin').get('value') || '5';
          var stories = "<div><ul>"; 
          		var urlpath = "http://lvinpress.com/newdesign/";
               var news_url = "http://lvinpress.com/newdesign/Hewal.aspx?Cor=1";  
               var yql_query = "select * from html where url='" + news_url + "'";  
       		yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count="+antall+")";  
               
               Y.YQL(yql_query, function(response) {  
                 if(response.query.results){  
                   var paras = response.query.results.div;  
                   paras.forEach(function(node,index) {  
                   		stories +="<li>	<form method='post' action='demo.php'>";
                   		stories += "<input type='hidden' name='link' value='" + urlpath + node.font.a.href + "'>";
                   		stories += "<input type='hidden' name='imagesrc' value='" + urlpath+node.font.img.src + "'>";
                   		stories +="<img  src='"+ urlpath+node.font.img.src+"'/>";
                   		stories += "<button type='submit' name='lvinpress'>";
                        stories +=node.font.a.content;  
                    	stories += "</button>";  
//                    	stories +="<span id='date'>"+node.font.span+"</span></form>";
                      	stories += "</form></li>";
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
    
    
     Y.one("#visnrt").on('click',function() {
     var antall = Y.one('#antall_nrt').get('value') || '5';   
     	var stories = "<div><ul>"; 
     	          		var urlpath = "http://nrttv.com/";
     	               var news_url = "http://lvinpress.com/newdesign/Hewal.aspx?Cor=1";  
     	               var yql_query = "select * from html where url='http://nrttv.com' and xpath='//td[@class=\"td-slider\"]//div/div'|truncate(count="+antall+")";  
     	       		//yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
     	               
     	               Y.YQL(yql_query, function(response) {  
     	                 if(response.query.results){  
     	                   var paras = response.query.results.div;  
     	                   paras.forEach(function(node,index) {  
     	                   		
     	                   		stories +="<li>	<form method='post' action='demo.php'>";
     	                   		stories += "<input type='hidden' name='link' value='" + urlpath + node.a.href + "'>";
     	                   		stories +="<img  src='"+ urlpath+node.img.src+"'/>";
     	                   		stories += "<button type='submit' name='nrttv'>";
     	                   		stories += node.a.content;  
     	                   		stories += "</button>";  
     	//                   		stories +="<span id='date'></span></form></li>";
     							stories += "</form></li>";
     	                   		                      
     	                  });  
     	       
     	                 } else{  
     	            stories += "Sorry, could not find any headlines for the url " + news_url + ". Please try another one.";  
     	          }  
     	          stories += "</ul></div>";  
     	          Y.one('#results2').append(stories);  
     	          stories = "";  
     	      });   
     	
     });
    
    
    Y.one("#visrudaw").on('click',function() { 
    var antall = Y.one('#antall_rudaw').get('value') || '5';  
    	var stories = "<div><ul>"; 
    	          		var urlpath = "http://nrttv.com/";
    	               var news_url = "http://rudaw.net/sorani/rss?type=top";  
    	               var yql_query = "select * from rss where url='http://rudaw.net/sorani/rss?type=top'|truncate(count="+antall+")";  
    	       		//yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
    	               
    	               Y.YQL(yql_query, function(response) {  
    	                 if(response.query.results){  
    	                   var paras = response.query.results.item;  
    	                   paras.forEach(function(node,index) {  
    	                   		
    	                   		stories +="<li>	<form method='post' action='demo.php'>";
    	                   		stories += "<input type='hidden' name='link' value='" + node.link + "'>";
    	                   		//stories +="<img  src='"+ urlpath+node.img.src+"'/>";
    	                   		stories += "<button type='submit' name='rudaw'>";
    	                   		stories +=node.title;  
    	                   		stories += "</button>";  
    	//                   		stories +="<span id='date'></span></form></li>";
    							stories += "</form></li>";
    	                   		                      
    	                  });  
    	       
    	                 } else{  
    	            stories += "Sorry, could not find any headlines for the url " + news_url + ". Please try another one.";  
    	          }  
    	          stories += "</ul></div>";  
    	          Y.one('#results3').append(stories);  
    	          stories = "";  
    	      });   
    	
    });
    
    
    Y.one("#visawene").on('click',function() {
    var antall = Y.one('#antall_awene').get('value') || '5';   
    	var stories = "<div><ul>"; 
    	          		var urlpath = "http://nrttv.com/";
    	               var news_url = "http://awene.com";  
    	               var yql_query = "select * from rss where url='http://awene.com/rss.xml'|truncate(count="+antall+")";  
    	       		//yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
    	               
    	               Y.YQL(yql_query, function(response) {  
    	                 if(response.query.results){  
    	                   var paras = response.query.results.item;  
    	                   paras.forEach(function(node,index) {  
    	                   		
    	                   		stories +="<li>	<form method='post' action='demo.php'>";
    	                   		stories += "<input type='hidden' name='link' value='" + node.link + "'>";
    	                   		//stories +="<img  src='"+ urlpath+node.img.src+"'/>";
    	                   		stories += "<button type='submit' name='awene'>";
    	                   		stories += node.title;  
    	                   		stories += "</button>";  
    	//                   		stories +="<span id='date'></span></form></li>";
    							stories += "</form></li>";
    	                   		                      
    	                  });  
    	       
    	                 } else{  
    	            stories += "Sorry, could not find any headlines for the url " + news_url + ". Please try another one.";  
    	          }  
    	          stories += "</ul></div>";  
    	          Y.one('#results4').append(stories);  
    	          stories = "";  
    	      });   
    	
    });

	Y.one("#vispeyamner").on('click',function() {
	var antall = Y.one('#antall_peyamner').get('value') || '5';   
		var stories = "<div><ul>"; 
		          		var urlpath = "http://nrttv.com/";
		               var news_url = "http://peyamner.com";  
		               var yql_query = "select * from rss where url='http://www.peyamner.com/rss.aspx'|truncate(count="+antall+")";  
		       		//yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
		               
		               Y.YQL(yql_query, function(response) {  
		                 if(response.query.results){  
		                   var paras = response.query.results.item;  
		                   paras.forEach(function(node,index) { 
		                   		stories +="<li>	<form method='post' action='demo.php'>";
		                   		stories += "<input type='hidden' name='link' value='" + node.link.content+ "'>";
		                   		//stories +="<img  src='"+ urlpath+node.img.src+"'/>";
		                   		stories += "<button type='submit' name='peyamner'>";
		                   		stories += node.title;  
		                   		stories += "</button>";  
		//                   		stories +="<span id='date'></span></form></li>";
								stories += "</form></li>";
		                   		                      
		                  });  
		       
		                 } else{  
		            stories += "Sorry, could not find any headlines for the url " + news_url + ". Please try another one.";  
		          }  
		          stories += "</ul></div>";  
		          Y.one('#results5').append(stories);  
		          stories = "";  
		      });   
		});  
    });
      
       </script>  
    
    