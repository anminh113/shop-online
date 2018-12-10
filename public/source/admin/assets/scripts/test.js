console.clear();

const form = document.querySelector('form');
form.addEventListener('submit', event => {
    event.preventDefault();

    const fileInput = event.target.querySelector('input');
    const imageFile = fileInput.files[0];

    const formData = new FormData();
    formData.append('image', imageFile);
    formData.append('album', 'oZhPW2y');


    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://api.imgur.com/3/album/oZhPW2y/add",
        "method": "POST",
        "headers": {
            "Authorization": "Client-ID e4330ab70984291"
        },
        "processData": false,
        "contentType": false,
        "mimeType": "multipart/form-data",
        "data": formData
    }

    $.ajax(settings).done(function(response) {
        console.log(response);
    });
});

/*
const form = document.querySelector('form');
form.addEventListener('submit', event => {
  const fileInput = event.target.querySelector('input');
  const imageFile = fileInput.files[0];
  
  const formData = new FormData();

  formData.append('type', 'base64');
  formData.append('album', 'EVGILvAjGfArJFI');
  
  const fileReader = new FileReader();
  fileReader.onload = () => {
    formData.append('image', fileReader.result.split(';base64,')[1]);
    
    fetch('https://api.imgur.com/3/image', {
      mode: 'cors',
      method: 'POST',
      headers: new Headers({
        'Content-Type': 'application/json',
        Authorization: 'Client-ID 90ef1830bd083ba',
      }),
      body: formData
    }).then(response => {
        if (response.ok) {
          alert('Image uploaded to album');       
        }
    }).catch(error => {
      console.error(JSON.stringify(error));
      alert('Upload failed: ' + error);
    });
  };
  fileReader.readAsDataURL(imageFile);
});*/