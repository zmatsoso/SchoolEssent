$('#class_timetable_days').live('pageshow', function(event) {

get_tt_days_five();
});

function get_tt_days_five() {

var class_code = getUrlVars()["id"];
$('#first_heading3').text(class_code+"?");


localStorage.setItem("class_code", class_code);
	
$('#tt_days li').remove();

$('#tt_days').append('<li><a href="load_class_table.html?id='+ class_code + '"><img src="images/help-icon.png" width="128" height="128"><h3>Continue</h3><p>Load Class Timetable</p></a></li>');
		

	$('#tt_days').listview('refresh');	

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
