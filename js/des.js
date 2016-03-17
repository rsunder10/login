$(document).ready(function(e) {
    var count=0;
	var pass="";
	var email=false;
	var pass1=false;
	var pass2=false;
	var first=false;
	var last=false;
	var user=false;
	var tel=false;
	var gen=false;
	var city=false;
	var state=false;
	
	$('#gender').blur(function(e) {
        if($(this).val()=="a"){
			$('#5').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			gen=false;
		}
		else{
			$('#5').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			gen=true;
		}

    }).focus(function(e) {
        $('#5').html('');
    });

	$('#city').blur(function(e) {
        if($(this).val()==""){
			$('#7').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			city=false;
		}
		else{
			$('#7').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			city=true;
		}

    }).focus(function(e) {
        $('#7').html('');
    }).keyup(function(e) {
        $('#7').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		city=true;
		
    });

	$('#state').blur(function(e) {
        if($(this).val()==""){
			$('#8').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			state=false;
		}
		else{
			$('#8').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			state=true;
		}

    }).focus(function(e) {
        $('#8').html('');
    }).keyup(function(e) {
        $('#8').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		state=true;
    });
	$('#last').blur(function(e) {
        if($(this).val()==""){
			$('#1').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			last=false;
		}
		else{
			$('#1').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			last=true;
		}

    }).focus(function(e) {
        $('#1').html('');
    }).keyup(function(e) {
        $('#1').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		last=true;
		
    });
	$('#first').blur(function(e) {
        if($(this).val()==""){
			$('#1').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			first=false;
		}
		else{
			$('#1').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			first=true;
		}

    }).focus(function(e) {
        $('#1').html('');
    }).keyup(function(e) {
        $('#1').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		first=true;
    });

$('#email').blur(function(e) {
        if($(this).val()==""){
			$('#3').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			email=false;
		}
		else if(isValidEmailAddress($(this).val()) ){
			$('#3').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			email=true;
		}
		else{
			$(this).html('This is Not A Valid Email Address');
			$(this).parent().removeClass('has-success').addClass('has-error');
			email=false;
		}

    }).focus(function(e) {
        $('#3').html('');
    }).keyup(function(e) {
        $('#3').html('This is Not Valid Email Address');
		$(this).parent().removeClass('has-success').addClass('has-error');
		 if( isValidEmailAddress($(this).val()) ){
			$('#3').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
		}
		
    });

$('#username').blur(function(e) {
        if($(this).val()==""){
			$('#2').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			user=false;
		}
		else{
			$('#2').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			user=true
		}

    }).focus(function(e) {
        $('#2').html('');
    }).keyup(function(e) {
        $('#2').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		
    });
	
	$('#password').blur(function(e) {
        if($(this).val()==""){
			$('#4').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			pass1=false;
		}

    }).focus(function(e) {
        $('#4').html('');
    }).keyup(function(e) {
		 $('#4').html('Enter Minimum 8 Charachter');
		 $(this).parent().addClass('has-error').removeClass('has-success');
		count=$(this).val().length;
		if(count>=8){
        $('#4').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		 pass=$(this).val();
		 pass1=true
		}
    });
		$('#password2').blur(function(e) {
        if($(this).val()==""){
			$('#4').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			pass2=false;
		}

    }).focus(function(e) {
        $('#4').html('');
		$(this).parent().addClass('has-error');
    }).keyup(function(e) {
		$('#4').html("Password Doesn't Match");
		pass2=false;
		if($(this).val()==pass){
        $('#4').html('');
		$(this).parent().removeClass('has-error').addClass('has-success');
		pass2=true;
		}
    });
	
$('#mobile-number').blur(function(e) {
        if($(this).val()==""){
			$('#6').text('You Cant Leave This Empty').addClass('form-group');
			$(this).parent().removeClass('has-success').addClass('has-error');
			tel=false;
		}
		else if(validatePhone('mobile-number') ){
			$('#6').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			tel=true;
		}
		else{
			$(this).html('This is Not A Valid Phone Number');
			$(this).parent().removeClass('has-success').addClass('has-error');
			tel=false;
		}

    }).focus(function(e) {
        $('#6').html('');
		
    }).keyup(function(e) {
        $('#6').html('This is Not Valid Email Phone Number');
		$(this).parent().removeClass('has-success').addClass('has-error');
		tel=false;
		 if( validatePhone('mobile-number') ){
			$('#6').html('');
			$(this).parent().removeClass('has-error').addClass('has-success');
			tel=true;
		}
		else
		{
						$(this).html('This is Not A Valid Phone Number');
			$(this).parent().removeClass('has-success').addClass('has-error');

			tel=false;
		}
		
    });
	 
	$('#form').submit(function(event) {
        if(	city==true && state==true && tel==true && gen==true && pass1==true && pass2==true && user==true  && email==true && first==true && last==true &&$('#check').prop('checked') ){
		return;
		}
			$('#9').html('Full The Form Completely Without Any Error').addClass('form-group');	
			event.preventDefault()
    });
	
	

});


function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

	

function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}