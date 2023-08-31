var class_code;
$('#select_class_page').live('pageshow', function(event) {
	
	get_class_list();
});

function get_class_list() {
	
	 var school_code = getUrlVars()["id"];
	localStorage.setItem("school_code", school_code);
	
	$.getJSON(serviceURL + 'get_class_list.php?school_code='+school_code, function(data) {
	
	$('#class_select li').remove();
	educators = data.items;
	
		$.each(educators, function(index, educator) {
		
		$('#class_select').append('<li><a href="select_class_days.html?id='+ educator.SubGrade + '"><img src="images/Admissions_48.png" width="auto" height="auto">' + educator.SubGrade + '</a></li>');

			});
	});
	$('#class_select').listview('refresh');
	
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
