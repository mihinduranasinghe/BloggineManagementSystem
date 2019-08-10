


$(document).ready(function(){
                  
    var div_box = "<div id='load-screenn'><div id='loadingg'></div></div>";
     $("body").prepend(div_box);
    $('#load-screenn').delay(700).fadeOut(800,function(){
        $(this).remove();
    });
    
    
                  
});
  


function loadUsersOnline(){
    
    $.get("funtions.php?onlineUsers=result", function(data){
        
        $(".usersonline").text(data);
        
        
        
    });
    
}

setInterval(function(){
    
   loadUsersOnline();
    
},500);
    
loadUsersOnline();

