$.extend( $.validator.messages, {
	required: "Vui lòng nhập thông tin.",
	remote: "Vui lòng sửa cho đúng.",
	email: "Vui lòng nhập đúng định dạng email.",
	url: "Vui lòng nhập URL.",
	date: "Vui lòng nhập ngày.",
	dateISO: "Vui lòng nhập ngày (ISO).",
	number: "Vui lòng nhập số.",
	digits: "Vui lòng nhập chữ số.",
	creditcard: "Vui lòng nhập số thẻ tín dụng.",
	equalTo: "Vui lòng nhập thêm lần nữa.",
	extension: "Vui lòng mở rộng không đúng.",
	maxlength: $.validator.format( "Vui lòng nhập từ {0} kí tự trở xuống." ),
	minlength: $.validator.format( "Vui lòng nhập từ {0} kí tự trở lên." ),
	rangelength: $.validator.format( "Vui lòng nhập từ {0} đến {1} kí tự." ),
	range: $.validator.format( "Vui lòng nhập từ {0} đến {1}." ),
	max: $.validator.format( "Vui lòng nhập từ {0} trở xuống." ),
	min: $.validator.format( "Vui lòng nhập từ {0} trở lên." )
});
