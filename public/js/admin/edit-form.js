$('.close-button').click(function(){
	document.getElementById('wrapper').style = "opacity:1;";
	document.getElementById('change-photo-block').style = "display:none;";
	document.getElementById('delete-photo-block').style = "display:none;";
	document.getElementById('change-text-block').style = "display:none;";
	document.getElementById('change-button-block').style = "display:none;";
	document.getElementById('change-button-link-block').style = "display:none;";
});
$('.change-photo').click(function(){
	document.getElementById('change-photo-block').style = "display:block;";
	document.getElementById('wrapper').style = "opacity:0.2;";
});
$('.delete-slide').click(function(){
	document.getElementById('delete-photo-block').style = "display:block;";
	document.getElementById('wrapper').style = "opacity:0.2;";
});
$('.change-text').click(function(){
	document.getElementById('change-text-block').style = "display:block;";
	document.getElementById('wrapper').style = "opacity:0.2;";
});
$('.change-button').click(function(){
	document.getElementById('change-button-block').style = "display:block;";
	document.getElementById('wrapper').style = "opacity:0.2;";
});
$('.change-button-link').click(function(){
	document.getElementById('change-button-link-block').style = "display:block;";
	document.getElementById('wrapper').style = "opacity:0.2;";
});