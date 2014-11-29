////Global Variables

var apiURLS = [];
var html = "";
////config vars

apiURLS.push("http://api.usatoday.com/open/articles/topnews/nfl?encoding=json&api_key=xcahfx6sh6367vx4zq9unfgk");
apiURLS.push("");

var theCount = 0;

////Functions

$(document).ready(function(){
    console.log("ready");
    
    loadAPIdata(apiURLS);

});


function loadAPIdata(apiURLS){
    console.log("loadAPIdata");
    
    for (var i=0; i < apiURLS.length; i++) {
        theCount = i;
        $.ajax({
            type: "GET",
            dataType: "json",
            cache: false,
            url: apiURLS[i],
            success: parseData
           
        });
    }
    
        function parseData(json){
            console.log(json);
            console.log(theCount);  
    
        if (theCount == 1){
            console.log("if");
    
    
        $("#story-results");
                 $.each(json.stories,function(i,data){
                    //inside loop code
                    console.log(i);
                    html += '<p class="story-ff">' + 'FANTASY FOOTBALL';
                    html += '<h2 class="story-title"><a href="' + data.link + '">'+  data.title +'</a></h2>';
                    html += '<p class="story-date">'+ data.pubDate +'</p>';
                    html += '<p class="story-description">'+ data.description + '<a href="' + data.link + '" class="story-link"> Read</a></p>' ;
                    
                    
                    });
                console.log(html);
                //after loop code
                $("#story-results").append(html);
    
        }

    }
}
