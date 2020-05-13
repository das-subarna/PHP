$(document).ready(function(){
    
	$('#selclass').change(function(){
		//remove select option when atleast one value is selected
		$("#selclass option[value='selected']").remove();

		var selectedClass = $(this).children("option:selected").val();
		 $.ajax({url: "select_section.php",
				 method: 'POST',
				 data: {stu_class: selectedClass}, // passing the selected class to Server 
				 success: function(response) { // On success
					//alert(response);
					// Converting the JSON output in Array Object
					result = $.parseJSON(response);
					
					// Empty the select box on every request
					$('#selsec')
						.empty()
						.append('<option selected="selected" value="selected">Select Section</option>');
					
					// Loop through the output and add the options to Section
					$.each( result, function( key, val ) {
						$('#selsec').append("<option value='"+val+"'>"+val+"</option>");
						
					}); // End of .each()
					
					// Removing the disabled attribute
					// $('#selsec').removeAttr("disabled");
					
				}
				
		 });
		
	});

	//remove select option when atleast one value is selected
	$('#selsec').change(function(){
		$("#selsec option[value='selected']").remove();
	});


	

});



