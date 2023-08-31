var txt_School_code;

function chec_school(){
//Check director
txt_School_code  = 16;
 
$.getJSON(serviceURL + 'check_school_code.php?id='+txt_School_code, return_school);

}

function return_school(data){
// Clear Director
 var class_code = getUrlVars()["id"];

$('#select_school li').remove();
ActCode = data.items;
if(class_code==1){	
		$.each(ActCode, function(index, ActCde) {
			$('#select_school').append('<li><a href="select_educ.html?id='+ ActCde.school_code +'"><img src="images/School_48.png" width="auto" height="auto"><h3>'+ ActCde.school_name +'</h3><p>Click to continue</p></a></li>');
		});
}
if(class_code==2){	
		$.each(ActCode, function(index, ActCde) {
			$('#select_school').append('<li><a href="select_class.html?id='+ ActCde.school_code +'"><img src="images/School_48.png" width="auto" height="auto"><h3>'+ ActCde.school_name +'</h3><p>Click to continue</p></a></li>');
		});
}

		
$('#select_school').listview('refresh');	

}


$('#selectschool').live('pagecreate', function() {
		  

			chec_school();
		
          
 			
});



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
