$(document).ready(function() {


//load the table as a dataTable
$('#loadPlayers').dataTable( 
	{
		"searching"		: false,
        "processing"	: true,
        "ajax"			: "loadPlayerList.php",
		"scrollX"		: true,
		"scrollY"		: '50vh',
        "scrollCollapse": true,
		"pageLength"	: 30,
        "paging"		: true,
		"autoWidth"		: false,
		"language"		: {
							"lengthMenu": ""
							},
		"columnDefs"    : [ { "targets": 3, "render": function(data){
                                return moment(data).format( 'MM/DD/YYYY' );
						    }},
                            { "targets": 4, render: function ( toFormat ) {
								var tPhone;
								
								tPhone=toFormat.toString();            
								tPhone='(' + tPhone.substring(0,3) + ') ' + tPhone.substring(3,6) + '-' + tPhone.substring(6,10);   
								
								return tPhone;
							}},
                            { "targets": 10, render: function ( toFormat ) {
								var tPhone;
								
								tPhone=toFormat.toString();            
								tPhone='(' + tPhone.substring(0,3) + ') ' + tPhone.substring(3,6) + '-' + tPhone.substring(6,10);   
								
								return tPhone;
							}}
							],
		"fixedColumns"	:   {
							leftColumns: 2
							}
    });


// process the form
$('form').submit(function(event) {
	// get the form data
	// there are many ways to get this data using jQuery (you can use the class or id also)
	var formData = $('form').serializeArray();				
	// process the form
	$.ajax({
		type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
		url         : 'addPlayerInfo.php', // the url where we want to POST
		data        : formData, // our data object
		dataType    : 'json', // what type of data do we expect back from the server    
		encode		: true,
		error		:		
					function(data, textStatus, jqXHR) {
							console.log('jqXHR:');
							console.log(jqXHR);
							console.log('textStatus:');
							console.log(textStatus);
							console.log('data:');
							console.log(data);
						},
		success		:
					function(){
						alert("Record Saved");
						$("#pForm").trigger('reset');
						$('#loadPlayers').DataTable().ajax.reload();
					}
		
	});
	
			
	// stop the form from submitting the normal way and refreshing the page
	event.preventDefault();	
	})	


//disable second position dropdown
document.getElementById('primaryPosition').onchange = function () {
     //alert("selected value = "+this.value);
     if(this.value == "")
     {
		 	//clear secondaryPosition entry (set value to null)
			document.getElementById('secondaryPosition').selectedIndex = 0;
		 
			//Keep secondaryPosition disabled
			document.getElementById('secondaryPosition').setAttribute('disabled', true);		
     }
     else
     {
			// document.getElementById("secondaryPosition").disabled=false;
			document.getElementById('secondaryPosition').removeAttribute('disabled');
     }
	} 

//Phone Masks
$("#phNum").inputmask({"mask": "(999) 999-9999"});

$("#altPhoneNum").inputmask({"mask": "(999) 999-9999"});


//toggle 'additional information' display between '+' and '-'

$('#plusToMinus').click(function () {
	
if($(this).text(function(i,old){
        return old=='+' ?  '-' : '+';
    }));
	
});
	
});



