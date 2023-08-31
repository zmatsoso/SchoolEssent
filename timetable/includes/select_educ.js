$('#select_educ_page').live('pageshow', function(event) {
	
	get_educ_list();
});

function get_educ_list() {
 var school_code = getUrlVars()["id"];
	localStorage.setItem("school_code", school_code);

	
	$.getJSON(serviceURL + 'get_educ_list.php?school_code='+school_code, function(data) {
	
	$('#educ_select li').remove();
	educators = data.items;
	
		$.each(educators, function(index, educator) {
		$('#educ_select').append('<li><a href="select_educ_days.html?id='+ educator.EducatorNumber + '&educ_name='+ educator.Name +'"><img src="images/Staff_48.png" width="auto" height="auto">' + educator.Name + '</a></li>');

			});
	});
	$('#educ_select').listview('refresh');
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