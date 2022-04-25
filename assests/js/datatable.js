$(document).ready(function () {
	var base_url = $("#Id").val();
	// datatable code start from here
	$("#listing").dataTable({
		processing: true,
		pagging: true,
		ordering: true,
		fixedHeader: {
			footer: true,
			header: true,
		},
		serverSide: true,
		searching: true,
		serverMethod: "POST",
		ajax: {
			url: base_url+"pagination_controller/pagination_data", // url
		},
		columns: [
			{ data: "id" },
			{ data: "first_name" },
			{ data: "last_name" },
			{ data: "email" },
			{ data: "birthdate" },
			{ data: "added" },
		],
	});
});
