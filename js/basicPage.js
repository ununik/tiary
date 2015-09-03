function onload(){
    organisator();
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
function organisatorFCE(){
    organisator();
}
function organisator(){
    var checkbox = document.getElementById("eventOrganisatorCheckbox")
    var organisator = document.getElementById("eventOrganisator");
    var eventEnrollSystem = document.getElementById("eventEnrollSystem");


    if(checkbox.checked == 1){
        organisator.style.display = "none";
        eventEnrollSystem.style.display = "block";
        organisator.value = "";
    }else{
        eventEnrollSystem.value = "0";
        organisator.style.display = "block";
        eventEnrollSystem.style.display = "none";
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
