$(document).ready(function(){
	$('.confirm-partner-btn').click(function(){
		$('#becamePertner').attr('href',  'became-partner/' + this.id)
		$('#refusedPertner').attr('href',  'refused-partner/' + this.id)
		$('#becameAssociated').attr('href',  'became-associated/' + this.id)
		$('#refusedAssociated').attr('href',  'refused-associated/' + this.id)
		
	})
})