function setDatumFromCalendar(datum){
    document.getElementById('date').value = datum;
    issetCalendar()
}
function calendar(mesic, rok){
    var div = document.getElementById("calendar_js")
    var mesicJmeno = ['leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec'];
    var date = new Date();
    if(mesic == "N"){
        var month = date.getMonth();
    } else {
        month = mesic
    }
    if(rok == "N"){
        var year = date.getFullYear();
    } else {
        year = rok
    }


    var yearP = year;
    if(month == 0){
       var monthP = 11;
           yearP = year-1;
    }else {
        var monthP = month - 1;
    }

    var yearN = year;

    if(month == 11){
        var monthN = 0;
        yearN = year + 1;
    }else {
        var monthN = month + 1;
    }

    //pocet dnu v mesici





    var title = "<div onclick='issetCalendar()' class='calendar_js_close'>x</div><div class='calendar_js_month'><span onclick='calendar(" + monthP + ", " + yearP + ")'>" + mesicJmeno[monthP] + " < </span>" + mesicJmeno[month] + " " + year + "<span  onclick='calendar(" + monthN + ", " + yearN + ")'> > " + mesicJmeno[monthN] + "</span></div>";

    var calendar = "<table class='calendar_js_table'><th>Po</th><th>Út</th><th>St</th><th>Čt</th><th>Pá</th><th>So</th><th>Ne</th><tr>"
    var row = 0;
    for(row = 0; row < firstDayInMonth(month, year)-1; row++)
    {
        calendar += "<td class='calendar_js_table_noDay'></td>";
    }
    var date_month = 0;
    var datum = 0;
    for(var i=1; i<= daysInMonth(month+1, year); i++){
        date_month = month+1
        datum = i + ". " + date_month + ". " + year;
        calendar += "<td class='calendar_js_table_activeDay' title=\"" + datum + "\"><div onclick='setDatumFromCalendar(\"" + datum +"\")'>" + i + "</div></td>";
        row++;
        if(row == 7){
            calendar += "</tr><tr>";
            row = 0;
        }

    }
    if(row > 0) {
        for (row; row < 7; row++) {
            calendar += "<td class='calendar_js_table_noDay'></td>";
        }
    }

    calendar += "</tr></table>"

    div.innerHTML = title + calendar;

}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}
function firstDayInMonth(month, year) {
    return new Date(year, month, 1).getDay();
}

function issetCalendar(){
    var div = document.getElementById("calendar_js")

    if(div.innerHTML == ""){
        div.style.display = "block";
        document.getElementById('blackBackground').style.display = "block";
        calendar("N", "N")
    }else{
        div.innerHTML = ""
        div.style.display = "none";
        if(document.getElementById("intimCalendarNew").innerHTML=="") {
            document.getElementById('blackBackground').style.display = "none";
        }
    }
}

