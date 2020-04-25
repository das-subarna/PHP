$(document).ready(function(){
	
	$('#sclass').change(function(){
		var selectedClass = $(this).children("option:selected").val();
		
		 $.ajax({url: "select.php",
				 method: 'POST',
				 data: {stu_class: selectedClass}, // passing the selected class to Server 
				 success: function(response) { // On success
					// Converting the JSON output in Array Object
					result = $.parseJSON(response);
					
					// Empty the select box on every request
					$('#ssection')
						.empty()
						.append('<option selected="selected" value="select">Select the Section</option>');
					
					// Loop through the output and add the options to Section
					$.each( result, function( key, val ) {
						$('#ssection').append("<option value='"+val+"'>"+val+"</option>");
						
						// Template literal/ ES6  -- ANOTHER WAY
						/*$('#ssection').append(`<option value="${val}">
												${val}
											   </option>`);*/
						
					}); // End of .each()
					
					// Removing the disabled attribute
					$('#ssection').removeAttr("disabled");
					
				}
				
		 });
		
	});
});


  