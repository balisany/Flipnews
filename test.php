<html>


<body>
<b>Stories: </b> <input type='text' size='15' id='story' value='world'/><br/><br/>  
<button id='get_stories'>Get Stories</button>  
<div id='results'>asg sldkjg sdlkjhl ksjdhl kdfjlkh fdklhj</div>  
<script src="http://yui.yahooapis.com/3.8.0/build/yui/yui-min.js"></script>  
<script>  
// Calls YQL Web service, parses results, and outputs results  
YUI().use('node', 'event', 'yql', function(Y) {  
  Y.one("#get_stories").on('click',function() {  
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
});         
</script>  

</body>


</html>