function onload(){

    organisator();
    categoriesEnroll();

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
function issetTemperatur(){
    var select = document.getElementById("intim_calendar_temperature");
    if(select.value == "other"){
        document.getElementById("intim_calendar_other").style.display = "block";
    }else{
        document.getElementById("intim_calendar_other").style.display = "none";

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
function categoriesEnroll(){
    var checkbox = document.getElementById("eventCategoryCheckbox")
    var categories = document.getElementById("categories");

    if(checkbox.checked == 1){
        categories.style.display = "block";
    }else{
        categories.style.display = "none";
    }
}
function intimBlood(){
    var checkbox = document.getElementById("menstruace")
    var select = document.getElementById("menstruace_select");
    var ovulation = document.getElementById('ovulationDiv');

    if(checkbox.checked == 1){
        menstruace_select.style.display = "block";
        ovulation.style.display = "none";
    }else{
        menstruace_select.style.display = "none";
        ovulation.style.display = "block";
    }
}
function getUnseenNotices(){
    if(document.getElementById('notice').style.display != "block"){
    ajaxCall('controllers/log/header/ajaxNotice.php', function(xhr) {
        document.getElementById('notice').innerHTML = xhr.responseText;
        document.getElementById('notice').style.display = "block";
        document.getElementById('blackBackground').style.display = "block";
    })
    } else{
        document.getElementById('notice').style.display = "none";
        document.getElementById('blackBackground').style.display = "none";
    }
}
function seenNotice(id){
    ajaxCall('controllers/log/header/seenNotice.php?id=' + id, function(xhr) {

    })
}

function intimCalendarNew(timestamp){
    ajaxCall('controllers/log/intim/new.php?timestamp='+timestamp, function(xhr) {
        document.getElementById('intimCalendarNew').innerHTML = xhr.responseText;
        document.getElementById('intimCalendarNew').style.display = "block";
        document.getElementById('blackBackground').style.display = "block";
    })

}
function intimCalendarUpdate(id){
    ajaxCall('controllers/log/intim/update.php?id='+id, function(xhr) {
        document.getElementById('intimCalendarNew').innerHTML = xhr.responseText;
        document.getElementById('intimCalendarNew').style.display = "block";
        document.getElementById('blackBackground').style.display = "block";
    })

}

function saveIntim(){
    var date = document.getElementById('date').value;
    var temperature = document.getElementById('intim_calendar_temperature').value;
    var temperature2 = document.getElementById('intim_calendar_other').value;
    var menstruace = document.getElementById('menstruace')
    if(menstruace.checked == true){
        menstruace = 1
    }else{
        menstruace = 0
    }
    var menstruace2 = document.getElementById('menstruace_select').value;
    var factors = document.getElementById('factors').value;
    var phlegm = document.getElementById('phlegm').value;
    var suppository = document.getElementById('suppository').value;
    var comment = document.getElementById('comment').value;
    var ovulation = document.getElementById('ovulation')
    if(ovulation.checked == true){
        ovulation = 1
    }else{
        ovulation = 0
    }

    ajaxCall('controllers/log/intim/new.php?date='+ date +'&temperatureSelect='+ temperature +'&temperatureINPUT='+ temperature2 +'&menstruace=' + menstruace+ '&blood='+ menstruace2 + '&factors='+factors+'&phlegm='+phlegm+'&suppository='+suppository+'&comment='+comment+'&ovulation='+ovulation, function(xhr) {
        document.getElementById('intimCalendarNew').innerHTML = xhr.responseText;
        if(document.getElementById('savedData').value == 0) {
            document.getElementById('intimCalendarNew').style.display = "block";
            document.getElementById('blackBackground').style.display = "block";
        } else{
            document.getElementById('grayBackground').style.display = "block";
            location.reload();
        }

    })
}

function updateIntim(id){

    var date = document.getElementById('date').value;
    var temperature = document.getElementById('intim_calendar_temperature').value;
    var temperature2 = document.getElementById('intim_calendar_other').value;
    var menstruace = document.getElementById('menstruace')
    if(menstruace.checked == true){
        menstruace = 1
    }else{
        menstruace = 0
    }
    var menstruace2 = document.getElementById('menstruace_select').value;
    var factors = document.getElementById('factors').value;
    var phlegm = document.getElementById('phlegm').value;
    var suppository = document.getElementById('suppository').value;
    var comment = document.getElementById('comment').value;
    var ovulation = document.getElementById('ovulation')
    if(ovulation.checked == true){
        ovulation = 1
    }else{
        ovulation = 0
    }

    ajaxCall('controllers/log/intim/update.php?id='+id+'&date='+ date +'&temperatureSelect='+ temperature +'&temperatureINPUT='+ temperature2 +'&menstruace=' + menstruace+ '&blood='+ menstruace2 + '&factors='+factors+'&phlegm='+phlegm+'&suppository='+suppository+'&comment='+comment+'&ovulation='+ovulation, function(xhr) {
        document.getElementById('intimCalendarNew').innerHTML = xhr.responseText;
        if(document.getElementById('savedData').value == 0) {
            document.getElementById('intimCalendarNew').style.display = "block";
            document.getElementById('blackBackground').style.display = "block";
        } else{
            document.getElementById('grayBackground').style.display = "block";
            location.reload();
        }

    })
}

function intime_close(){
    document.getElementById('intimCalendarNew').innerHTML = "";
    document.getElementById('intimCalendarNew').style.display = "none";
    document.getElementById('blackBackground').style.display = "none";
}
