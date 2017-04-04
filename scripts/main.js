
//the search button that is fired.
$('#search_button').on('click',function(){
	$(".main").html('');

	//ajax that mother
	
	$
	$.post("scripts/get_info.php",
	{
		query:$('#search_box').val().trim() ,
		sort: $('#sort_by').val(),
		direction: $('#order_by').val(),
		whole_word: $('#checked').prop('checked')
		
	},
	function (data, status) {
				
	$(".main").append(data);
		
	$('#result_info').html(" ( " + $('.inner_box').length + " results ) ");
		
	});
});


/*

This calls the script that updates the times

*/

$('#update_button').on('click',function(){
	
	//alert ("here");
	
	//console.log("testing");
	
	//go through all the boxes...get the ids, and do the php magic
	jQuery( '.hidden_input' ).each(function( index ) {

		$.post("scripts/add_info.php",
	{

		id: $(this).val()
	},
	function (data, status) {
		
			console.log(data);
		
	});
		
		
		
		
	});
	

});
