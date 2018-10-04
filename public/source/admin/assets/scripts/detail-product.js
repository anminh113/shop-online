  function yesnoClick() {
      document.getElementById('tensp').style.display = 'flex';
      document.getElementById('tensp1').style.display = 'none';
  }

  function yesnoClickPrice() {
      document.getElementById('giasp').style.display = 'inline-table';
      document.getElementById('giasp1').style.display = 'none';
  }


  $("document").ready(function() {
      $('#file-upload1').on("change", function() {
        
        var bla = $('#img1').val();
        option = bla.split("/", 6);
        console.log(option[3].slice(0,7));


            var idImage = option[3].slice(0,7);
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
              var href = $('#test1').attr('href');


              var formData = new FormData();
              formData.append("title", "test");
              formData.append("description", "{{$resultdata['data']['product']['productId']}}_anh-1");
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
                      // $('#file-upload1').remove();
                      $('#test1').remove();
                      $('#expandedImg').remove();
                      $('#loader1').remove();
                      $('#column1').append('<img id="test1" src="' + res.data.link + '" style="width:100%" onclick="imgshow(this);"/>');
                      $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');
                      
                      $('#imgur1').append('<input type="text" id="img1" name="img1" value="'+res.data.link+'" hidden>');

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
        var bla = $('#img2').val();
        option = bla.split("/", 6);
        console.log(option[3].slice(0,7));


            var idImage = option[3].slice(0,7);
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

          var $files = $(this).get(0).files;

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
              formData.append("title", "test");
              formData.append("description", "{{$resultdata['data']['product']['productId']}}_anh-2");
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
                      // $('#file-upload2').remove();
                      $('#test2').remove();
                      $('#expandedImg').remove();
                      $('#loader2').remove();
                      $('#column2').append('<img id="test2" src="' + res.data.link + '" style="width:100%" onclick="imgshow(this);"/>');
                      $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');
                      $('#imgur2').append('<input type="text" id="img2" name="img2" value="'+res.data.link+'" hidden>');
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
        var bla = $('#img3').val();
        option = bla.split("/", 6);
        console.log(option[3].slice(0,7));


            var idImage = option[3].slice(0,7);
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

          var $files = $(this).get(0).files;

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
              formData.append("title", "test");
              formData.append("description", "{{$resultdata['data']['product']['productId']}}_anh-3");
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
                      // $('#file-upload3').remove();
                      $('#test3').remove();
                      $('#expandedImg').remove();
                      $('#loader3').remove();
                      $('#column3').append('<img id="test3" src="' + res.data.link + '" style="width:100%" onclick="imgshow(this);"/>');
                      $('#image_selected').append('<img id="expandedImg" src="' + res.data.link + '" style="width:100%"/>');
                      $("#imgur3").append('<input type="text" id="img3" name="img3" value="'+res.data.link+'" hidden>');

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