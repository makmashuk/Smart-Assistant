var pm = 0, py = 0, nm = 0, ny = 0;
var d = new Date();
var month, year;
function x() {


    var month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    month = d.getMonth();  //0-11
    year = d.getFullYear(); //2014
    var day = d.getDay();
    var first_date = month_name[month] + " " + 1 + " " + year;
    //September 1 2014
    var tmp = new Date(first_date).toDateString();
    //Mon Sep 01 2014 ...
    var first_day = tmp.substring(0, 3);    //Mon
    var day_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var day_no = day_name.indexOf(first_day);   //1
    var days = new Date(year, month + 1, 0).getDate();    //30
    //Tue Sep 30 2014 ...
    var calendar = get_calendar(day_no, days);
    document.getElementById("header").innerHTML = month_name[month] + " " + year;
    document.getElementById("calendar-dates").innerHTML = "";
    document.getElementById("calendar-dates").appendChild(calendar);
    document.getElementById("test").innerHTML = d.getDate() + "/" + d.getMonth() + "/" + d.getFullYear();

}
function f(val, id) {
    var allDivTd = document.getElementById("calendar-dates").getElementsByTagName("td");
    for (var i = 0; i < allDivTd.length; i++) {
        var td = allDivTd[i];
        td.setAttribute("class", "");
    }
    document.getElementById(id).setAttribute("class", "clicked");
    //alert(c);
}
function doubleClicked(val, id) {

    window.location.href = "?view_record&day=" + val + "&month=" + month + "&year=" + year;
    //alert(window.location.href);//http://localhost/myWorks/webtechfinalprojectwithmvc/?view_cal
}
function get_calendar(day_no, days) {
    var n = 0;
    var d2 = new Date();
    var table = document.createElement('table');
    var tr = document.createElement('tr');

    //row for the day letters
    var dayss = "SMTWTFS";
    for (var c = 0; c <= 6; c++) {
        var td = document.createElement('td');
        td.innerHTML = dayss[c];
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        tr.appendChild(td);
        n++;
        //tr.id="aa";
    }
    table.appendChild(tr);

    //create 2nd row blanks
    tr = document.createElement('tr');
    var c;
    for (c = 0; c <= 6; c++) {
        if (c == day_no) {
            break;
        }
        var td = document.createElement('td');
        td.innerHTML = "";
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        tr.appendChild(td);
        n++;
    }
    //non blanks
    var count = 1;
    for (; c <= 6; c++) {
        var td = document.createElement('td');
        td.innerHTML = count;

        count++;
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        if (d2.getDate() == td.innerHTML) {
            td.setAttribute("id", "today");
        }
        tr.appendChild(td);
        n++;
    }
    table.appendChild(tr);

    //rest of the date rows
    for (var r = 3; r <= 7; r++) {
        tr = document.createElement('tr');
        for (var c = 0; c <= 6; c++) {
            if (count > days) {
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            td.innerHTML = count;

            count++;
            td.setAttribute("id", "clicked" + n);
            td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
            td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
            if (d2.getDate() == td.innerHTML) {
                td.setAttribute("id", "today");
            }
            tr.appendChild(td);
            n++;
        }
        table.appendChild(tr);
    }
    return table;
}
function prev() {

    var month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    month -= 1;  //0-11
    if (month == -1) {
        month = 11;
        year--;
    }
    //year = d.getFullYear()+ny; //2014
    var day = d.getDay();
    var first_date = month_name[month] + " " + 1 + " " + year;
    //September 1 2014
    var tmp = new Date(first_date).toDateString();
    //Mon Sep 01 2014 ...
    var first_day = tmp.substring(0, 3);    //Mon
    var day_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var day_no = day_name.indexOf(first_day);   //1
    var days = new Date(year, month + 1, 0).getDate();    //30
    //Tue Sep 30 2014 ...
    var calendar = get_calendar(day_no, days);
    document.getElementById("header").innerHTML = month_name[month] + " " + year;
    document.getElementById("calendar-dates").innerHTML = "";
    document.getElementById("calendar-dates").appendChild(calendar);
    document.getElementById("test").innerHTML = d.getDate() + "/" + d.getMonth() + "/" + d.getFullYear();
    nm++;
    if ((month + nm) % 12 == 0) {
        ny++;

    }
}
function f(val, id) {
    var allDivTd = document.getElementById("calendar-dates").getElementsByTagName("td");
    for (var i = 0; i < allDivTd.length; i++) {
        var td = allDivTd[i];
        td.setAttribute("class", "");
    }
    document.getElementById(id).setAttribute("class", "clicked");
    //alert(c);
}

function get_calendar(day_no, days) {
    var n = 0;
    var d2 = new Date();
    var table = document.createElement('table');
    var tr = document.createElement('tr');

    //row for the day letters
    var dayss = "SMTWTFS";
    for (var c = 0; c <= 6; c++) {
        var td = document.createElement('td');
        td.innerHTML = dayss[c];
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        tr.appendChild(td);
        n++;
        //tr.id="aa";
    }
    table.appendChild(tr);

    //create 2nd row blanks
    tr = document.createElement('tr');
    var c;
    for (c = 0; c <= 6; c++) {
        if (c == day_no) {
            break;
        }
        var td = document.createElement('td');
        td.innerHTML = "";
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        tr.appendChild(td);
        n++;
    }
    //non blanks
    var count = 1;
    for (; c <= 6; c++) {
        var td = document.createElement('td');
        td.innerHTML = count;

        count++;
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        if (d2.getDate() == td.innerHTML) {
            td.setAttribute("id", "today");
        }
        tr.appendChild(td);
        n++;
    }
    table.appendChild(tr);

    //rest of the date rows
    for (var r = 3; r <= 7; r++) {
        tr = document.createElement('tr');
        for (var c = 0; c <= 6; c++) {
            if (count > days) {
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            td.innerHTML = count;

            count++;
            td.setAttribute("id", "clicked" + n);
            td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
            td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
            if (d2.getDate() == td.innerHTML) {
                td.setAttribute("id", "today");
            }
            tr.appendChild(td);
            n++;
        }
        table.appendChild(tr);
    }
    return table;
}
function next() {
    var month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    month += 1;  //0-11
    if (month == 12) {
        month = 0;
        year++;

    }
    // year = d.getFullYear()+ny; //2014
    var day = d.getDay();
    var first_date = month_name[month] + " " + 1 + " " + year;
    //September 1 2014
    var tmp = new Date(first_date).toDateString();
    //Mon Sep 01 2014 ...
    var first_day = tmp.substring(0, 3);    //Mon
    var day_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var day_no = day_name.indexOf(first_day);   //1
    var days = new Date(year, month + 1, 0).getDate();    //30
    //Tue Sep 30 2014 ...
    var calendar = get_calendar(day_no, days);
    document.getElementById("header").innerHTML = month_name[month] + " " + year;
    document.getElementById("calendar-dates").innerHTML = "";
    document.getElementById("calendar-dates").appendChild(calendar);
    document.getElementById("test").innerHTML = d.getDate() + "/" + d.getMonth() + "/" + d.getFullYear();

}
function f(val, id) {
    var allDivTd = document.getElementById("calendar-dates").getElementsByTagName("td");
    for (var i = 0; i < allDivTd.length; i++) {
        var td = allDivTd[i];
        td.setAttribute("class", "");
    }
    document.getElementById(id).setAttribute("class", "clicked");
    //alert(c);
}

function get_calendar(day_no, days) {
    var n = 0;
    var d2 = new Date();
    var table = document.createElement('table');
    var tr = document.createElement('tr');

    //row for the day letters
    var dayss = "SMTWTFS";
    for (var c = 0; c <= 6; c++) {
        var td = document.createElement('td');
        td.innerHTML = dayss[c];
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        tr.appendChild(td);
        n++;
        //tr.id="aa";
    }
    table.appendChild(tr);

    //create 2nd row blanks
    tr = document.createElement('tr');
    var c;
    for (c = 0; c <= 6; c++) {
        if (c == day_no) {
            break;
        }
        var td = document.createElement('td');
        td.innerHTML = "";
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        tr.appendChild(td);
        n++;
    }
    //non blanks
    var count = 1;
    for (; c <= 6; c++) {
        var td = document.createElement('td');
        td.innerHTML = count;

        count++;
        td.setAttribute("id", "clicked" + n);
        td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
        td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
        if (d2.getDate() == td.innerHTML) {
            td.setAttribute("id", "today");
        }
        tr.appendChild(td);
        n++;
    }
    table.appendChild(tr);

    //rest of the date rows
    for (var r = 3; r <= 7; r++) {
        tr = document.createElement('tr');
        for (var c = 0; c <= 6; c++) {
            if (count > days) {
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            td.innerHTML = count;

            count++;
            td.setAttribute("id", "clicked" + n);
            td.setAttribute("onclick", "f('" + td.innerHTML + "','clicked" + n + "')");
            td.setAttribute("ondblclick", "doubleClicked('" + td.innerHTML + "','clicked" + n + "')");
            if (d2.getDate() == td.innerHTML) {
                td.setAttribute("id", "today");
            }
            tr.appendChild(td);
            n++;
        }
        table.appendChild(tr);
    }
    return table;
}