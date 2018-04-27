$(document).ready(function(){
	$('.confirm-partner-btn').click(function(){
		$('#becamePertner').attr('href',  'notification/became-partner/' + this.id)
		$('#refusedPertner').attr('href',  'notification/refused-partner/' + this.id)
	})
})