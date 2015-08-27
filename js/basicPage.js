function showANDhideMenu(div){
    var parent = div.parentNode;
    var link = parent.getElementsByTagName("a")
   if(link[0].style.display != "block" || link[0].style.display == void 0){
       var display = "block";
   }else{
       var display = "none";
   }
    for(var i=0; i<link.length; i++){
        link[i].style.display = display;
    }
}

function issetSport(select){
    if(select.value == "other"){
        document.getElementById("sport_insteadOfSelect").style.display = "block";
    }else{
        document.getElementById("sport_insteadOfSelect").style.display = "none";
    }
}
