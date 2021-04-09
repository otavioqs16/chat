$(function(){
	mostrarContent();
	$("#botaousuario").click(batePapo);
})

var comeco = null;

function mostrarContent(){
	$.ajax({
		url:"show.php",
		method: "post",
		success: function(showData){
			$("#content").html(showData);
		}
	})

	comeco = setTimeout(mostrarContent, 1500);

}

function batePapo(){
	$.ajax({
		url:"batepapo.php",
		method: "post",
		success: function(showBP){
			$("#content").html(showBP);
		}
	})

	comeco = setTimeout(batePapo, 1500);

}
