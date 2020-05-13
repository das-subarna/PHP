
//jquery validation using plugin
$().ready(function(){
	console.log("check");
	$("form[name='changepassword']").validate({
		rules: {
			pass: {
				required: true,
				passcheckchar: true,
				passchecknum: true,
                minlength: 6,
                notEqualTo: "#oldpass"
			},
			cpass: {
				required: true,
				equalTo: "#pass"
            },
            oldpass: {
				required: true,
				passcheckchar: true,
				passchecknum: true,
				minlength: 6,
			},
			
		},
		messages: {
            oldpass:{
				required: "Enter a password ."
			},
            pass:{
                required: "Enter a new password .",
                notEqualTo: "You have entered same value as old password ."
			},
			cpass:{
				required: "Enter new password again ."
			}
		}
	});
 });

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
