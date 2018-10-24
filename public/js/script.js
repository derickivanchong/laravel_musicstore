$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.addArtist').on('click', function(){

	// user defined
	let artistname = $('#artistid').val();
	let imageartists = $('#imageartistsid').val();
	// console.log(artistname);

	$.ajax({
		url: "/artists/create",
		type: "POST",
		data: {'artistname':artistname, 'imageartists':imageartists},
		success: function(data){
			alert('You have successfully added a new Artist');
		}
	})
});

// $.ajax({
// 	url: "/artists/create",
// 	data: {"name":name},
// 	type:,
// 	success: function(data){
// 		//some data to pass
// 	}
// })
	

// 	url: "/artists/edit" + id,
// 	data: {"_method":"put", "name":name},
	
// 	url: "/artists/delete" + id,
// 	data: {"_method":"delete", "name":name},