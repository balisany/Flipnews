<!DOCTYPE html>
<html lang="en">
  <head ><title>Index</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <link href="css/main.css" rel="stylesheet">  
  
  </head>  
  <body>  
	<div id='results'>
			<div id="toppanel">
				<form method="post" action="">
				<select name="antall">
					<option>5</option>
					<option>6</option>
					<option>7</option>
				</select> 
					<input type="submit" name="vislvinpress" value="Vis" />
				</form>
				
			</div>
	 	</div>
	
	 
		<div id='results2'>
			<div id="toppanel">
				<form method="post" action="">
				<select name="antall">
					<option>5</option>
					<option>6</option>
					<option>7</option>
				</select> 
					<input type="submit" name="visnrt" value="Vis" />
				</form>
				
			</div>
			
			
		</div>
		<div id='results3'>
		<div id="toppanel" >
			<form method="post" action="">
			<select name="antall">
				<option>5</option>
				<option>6</option>
				<option>7</option>
			</select> 
				<input type="submit" name="visrudaw" value="Vis" />
			</form>
			
		</div>
			
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
                   		stories +="<li>	<form method='post' action='demo.php'>";
                   		stories += "<input type='hidden' name='link' value='" + urlpath + node.font.a.href + "'>";
                   		stories +="<img  src='"+ urlpath+node.font.img.src+"'/>";
                   		stories += "<button type='submit' name='lvinpress'>";
                        stories += "<span>"+node.font.a.content+"</span>";  
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
                   		
                   		stories +="<li>	<form method='post' action='demo.php'>";
                   		stories += "<input type='hidden' name='link' value='" + urlpath + node.a.href + "'>";
                   		stories +="<img  src='"+ urlpath+node.img.src+"'/>";
                   		stories += "<button type='submit' name='nrttv'>";
                   		stories += "<span>"+node.a.content+"</span>";  
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
    
        // Calls YQL Web service, parses results, and outputs results  
        YUI().use('node', 'event', 'yql', function(Y) {  
          
              var stories = "<div><ul>"; 
              		var urlpath = "http://nrttv.com/";
                   var news_url = "http://rudaw.net/sorani/rss?type=top";  
                   var yql_query = "select * from rss where url='http://rudaw.net/sorani/rss?type=top'|truncate(count=6)";  
           		//yql_query += "and charset='utf-8' and xpath='//table[@id=\"ctl00_Main_GridView1\"]//tr/td/div'|truncate(count=6)";  
                   
                   Y.YQL(yql_query, function(response) {  
                     if(response.query.results){  
                       var paras = response.query.results.item;  
                       paras.forEach(function(node,index) {  
                       		
                       		stories +="<li>	<form method='post' action='demo.php'>";
                       		stories += "<input type='hidden' name='link' value='" + node.link + "'>";
                       		//stories +="<img  src='"+ urlpath+node.img.src+"'/>";
                       		stories += "<button type='submit' name='rudaw'>";
                       		stories += "<span>"+node.title+"</span>";  
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
    
         
    </script>  
    