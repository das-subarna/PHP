
//jquery validation using plugin
$().ready(function(){
	console.log("inside validation js");
	$("form[name='registration']").validate({
		rules: {
			fname: {
				required:true,
				minlength: 2,
				lettersonly: true
			},
			lname: {
				required:true,
				minlength: 2,
				lettersonly: true
			},
			mobile: {
				required: true,
				minlength: 10,
				mobcheck: true
			},
			pass: {
				required: true,
				passcheckchar: true,
				passchecknum: true,
				minlength: 6,
			},
			cpass: {
				required: true,
				equalTo: "#pass"
			},
			selclass: {
                dropdowncheck : true
            },
			selsec: {
                dropdowncheck : true
            },
			address:  {
				required:true,
				minlength: 10
			},
			email: {
				required:true,
				emailcheck: true
			}
		},
		messages: {
			fname:{
				required: "Enter first name ."
			},
			lname:{
				required: "Enter last name ."
			},
			mobile:{
				required: "Enter mobile no ."
			},
			pass:{
				required: "Enter a password ."
			},
			cpass:{
				required: "Enter password again ."
			},
			email:{
				required: "Enter your email address ."
			},
			address: {
				required: "Enter your address ."
			}
		}
	});

	$("form[name='updateform']").validate({
		rules: {
			mobile: {
				required: true,
				minlength: 10,
				mobcheck: true
			},
			address:  {
				required:true,
				minlength: 10
			},
			email: {
				required:true,
				emailcheck: true
			}
		},
		messages: {
			mobile:{
				required: "Enter mobile no ."
			},
			email:{
				required: "Enter your email address ."
			},
			address: {
				required: "Enter your address ."
			}
		}
	});
 });

jQuery.validator.addMethod(
	"emailcheck",
	function(value, element){
		return /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
	},
	"Enter a valid email address ."
 );

 jQuery.validator.addMethod(
	"passcheckchar",
	function(value, element){
		return /[A-z]/g.test(value);
	},
	"Password must contain atleast one character ."
 );

 jQuery.validator.addMethod(
	"passchecknum",
	function(value, element){
		return /[0-9]/g.test(value);
	},
	"Password must contain atleast one number ."
 );

 jQuery.validator.addMethod(
	"mobcheck",
	function(value, element){
		return /^[0-9]{10}$/.test(value);
	},
	"Enter a valid 10 digit mobile number ."
 );

 jQuery.validator.addMethod(
	"dropdowncheck",
	function(value, element){
		return !(value=="selected");
	},
	"Select an option ."
 );

jQuery.validator.addMethod(
	"lettersonly", 
	function(value, element) 
	{
		return /^[A-z]*$/.test(value);
	}, 
	"Letters only."
); 