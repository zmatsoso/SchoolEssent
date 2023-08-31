$('#educ_timetable_days').live('pageshow', function(event) {
get_edu_name();

});

function get_edu_name(){

var educ_no = getUrlVars()["id"];
var edu_name = getUrlVars()["educ_name"];

var zP2E = (edu_name).split('%20');
localStorage.setItem("educ_name", zP2E[1] + ' ' + zP2E[2]);

$('#first_heading1').text(zP2E[1] + ' ' + zP2E[2] +'?');

if(zP2E[1]==undefined){
localStorage.setItem("educ_name", zP2E[0]);
$('#first_heading1').text(zP2E[0] +'?');

}

var school_code = localStorage.getItem("school_code");
var educ_name;

localStorage.setItem("educ_no", educ_no);

$('#educ_tt_days li').remove();

$('#educ_tt_days').append('<li><a href="load_edu_table.html?id='+ educ_no + '"><img src="images/help-icon.png" width="128" height="128"><h3>Continue</h3><p>Load Educator Timetable</p></a></li>');

$('#educ_tt_days').listview('refresh');	
	
}




function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
