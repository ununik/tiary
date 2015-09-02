function onload(){
    organisator(document.getElementById("eventOrganisatorCheckbox"));
}
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
function organisator(checkbox){
    var organisator = document.getElementById("eventOrganisator");

    if(checkbox.checked == 1){
        organisator.style.display = "none";
    }else{
        organisator.style.display = "block";
    }
}
function getUnseenNotices(){
    if(document.getElementById('notice').style.display == "none"){
    ajaxCall('controllers/log/header/ajaxNotice.php', function(xhr) {
        document.getElementById('notice').innerHTML = xhr.responseText;
        document.getElementById('notice').style.display = "block";
    })
    } else{
        document.getElementById('notice').style.display = "none";
    }
}
function seenNotice(id){
    ajaxCall('controllers/log/header/seenNotice.php?id=' + id, function(xhr) {

    })
}
