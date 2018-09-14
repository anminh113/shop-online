$("document").ready(function() {
    $('#file-upload1').on("change", function() {

        var $files = $(this).get(0).files;

        if ($files.length) {

            // Reject big files
            if ($files[0].size > $(this).data("max-size") * 1024) {
                console.log("Please select a smaller file");
                return false;
            }

            // Replace ctrlq with your own API key

            // var apiUrl = 'https://api.imgur.com/3/image';
            var apiUrl = 'https://api.imgur.com/3/image';
            var apiKey = 'e4330ab70984291';

            var formData = new FormData();
            formData.append("image", $files[0]);
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": apiUrl,
                "method": "POST",
                "datatype": "json",
                "headers": {
                    "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                },
                "processData": false,
                "contentType": false,
                "data": formData,
                beforeSend: function(xhr) {
                    console.log("Uploading");
                    $('#test1').remove();
                    $('#label1').append('<div class="buttonload" id="loader1"><i class="fa fa-circle-o-notch fa-spin"></i> Đang tải...</div>');
                },
                success: function(res) {
                    // console.log(res.data.id);
                    $('#file-upload1').remove();
                    $('#test1').remove();
                    $('#expandedImg').remove();
                    $('#loader1').remove();
                    $('#label1').append('<img id="test1" src="' + res.data.link + '" style="width:100%" onclick="imgshow(this);"/>');
                    $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');

                },
                error: function() {
                    alert("Failed ");
                }
            }
            $.ajax(settings).done(function(response) {
                // console.log(response.data.id);
                var form = new FormData();
                form.append("ids[]", "" + response.data.id + "");
                var settings1 = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://api.imgur.com/3/album/OXLigJs/add",
                    "method": "POST",
                    "headers": {
                        "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form
                }

                $.ajax(settings1).done(function(response) {
                    console.log(response);
                });
            });
        }
    });
});

$("document").ready(function() {
    $('#file-upload2').on("change", function() {

        var $files = $(this).get(0).files;

        if ($files.length) {

            // Reject big files
            if ($files[0].size > $(this).data("max-size") * 1024) {
                console.log("Please select a smaller file");
                return false;
            }

            // Replace ctrlq with your own API key

            // var apiUrl = 'https://api.imgur.com/3/image';
            var apiUrl = 'https://api.imgur.com/3/image';
            var apiKey = 'e4330ab70984291';

            var formData = new FormData();
            formData.append("image", $files[0]);
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": apiUrl,
                "method": "POST",
                "datatype": "json",
                "headers": {
                    "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                },
                "processData": false,
                "contentType": false,
                "data": formData,
                beforeSend: function(xhr) {
                    console.log("Uploading");
                    $('#test2').remove();
                    $('#label2').append('<div class="buttonload" id="loader2"><i class="fa fa-circle-o-notch fa-spin"></i> Đang tải...</div>');
                },
                success: function(res) {
                    // console.log(res.data.id);
                    $('#file-upload2').remove();
                    $('#test2').remove();
                    $('#expandedImg').remove();
                    $('#loader2').remove();
                    $('#label2').append('<img id="test2" src="' + res.data.link + '" style="width:100%" onclick="imgshow(this);"/>');
                    $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');

                },
                error: function() {
                    alert("Failed ");
                }
            }
            $.ajax(settings).done(function(response) {
                // console.log(response.data.id);
                var form = new FormData();
                form.append("ids[]", "" + response.data.id + "");
                var settings1 = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://api.imgur.com/3/album/OXLigJs/add",
                    "method": "POST",
                    "headers": {
                        "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form
                }

                $.ajax(settings1).done(function(response) {
                    console.log(response);
                });
            });
        }
    });
});

$("document").ready(function() {
    $('#file-upload3').on("change", function() {

        var $files = $(this).get(0).files;

        if ($files.length) {

            // Reject big files
            if ($files[0].size > $(this).data("max-size") * 1024) {
                console.log("Please select a smaller file");
                return false;
            }

            // Replace ctrlq with your own API key

            // var apiUrl = 'https://api.imgur.com/3/image';
            var apiUrl = 'https://api.imgur.com/3/image';
            var apiKey = 'e4330ab70984291';

            var formData = new FormData();
            formData.append("image", $files[0]);
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": apiUrl,
                "method": "POST",
                "datatype": "json",
                "headers": {
                    "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                },
                "processData": false,
                "contentType": false,
                "data": formData,
                beforeSend: function(xhr) {
                    console.log("Uploading");
                    $('#test3').remove();
                    $('#label3').append('<div class="buttonload" id="loader3"><i class="fa fa-circle-o-notch fa-spin"></i> Đang tải...</div>');
                },
                success: function(res) {
                    // console.log(res.data.id);
                    $('#file-upload3').remove();
                    $('#test3').remove();
                    $('#expandedImg').remove();
                    $('#loader3').remove();
                    $('#label3').append('<img id="test3" src="' + res.data.link + '" style="width:100%" onclick="imgshow(this);"/>');
                    $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');

                },
                error: function() {
                    alert("Failed ");
                }
            }
            $.ajax(settings).done(function(response) {
                // console.log(response.data.id);
                var form = new FormData();
                form.append("ids[]", "" + response.data.id + "");
                var settings1 = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://api.imgur.com/3/album/OXLigJs/add",
                    "method": "POST",
                    "headers": {
                        "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form
                }

                $.ajax(settings1).done(function(response) {
                    console.log(response);
                });
            });
        }
    });
});

function deleteFromImgur() {
    var idImage = "z5Ob1vB";
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://api.imgur.com/3/album/OXLigJs/image/" + idImage,
        "method": "GET",
        "headers": {
            "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
        }
    }
    $.ajax(settings).done(function(res) {
        var settings1 = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.imgur.com/3/image/" + res.data.deletehash,
            "method": "DELETE",
            "headers": {
                "Authorization": "Bearer 9c2fca8227f628d8d2888728b82fe53529a4e400"
            }
        }

        $.ajax(settings1).done(function(response) {
            console.log(response);
        });

    });
}
