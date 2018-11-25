 var googleUser = {};
    var startApp = function() {
        gapi.load('auth2', function() {
            // Retrieve the singleton for the GoogleAuth library and set up the client.
            auth2 = gapi.auth2.init({

                'client_id': '981798466996-o7ffbpavqm598cap9ems9fungt4juob1.apps.googleusercontent.com',
                'cookiepolicy': 'single_host_origin',
                'redirect_uri': ['http://localhost.com'],
                'response_type': 'token',
                'scope': 'https://www.googleapis.com/auth/user.phonenumbers.read',
                'include_granted_scopes': 'true',
                'state': 'pass-through value',
                'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/drive/v3/rest']
            });
            attachSignin(document.getElementById('customBtn'));
        });
    };

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                document.getElementById('name').innerText = "Signed in: " + googleUser.getBasicProfile().getName();
                var profile = googleUser.getBasicProfile();
                var form = document.getElementById('postggfb');
                form.setAttribute('method', 'post');

                var hiddenInputId = document.createElement('input');
                hiddenInputId.setAttribute('type', 'hidden');
                hiddenInputId.setAttribute('name', 'Id');
                hiddenInputId.setAttribute('value', profile.getId());

                var hiddenInputUser = document.createElement('input');
                hiddenInputUser.setAttribute('type', 'hidden');
                hiddenInputUser.setAttribute('name', 'User');
                hiddenInputUser.setAttribute('value', profile.getName());

                var hiddenInputEmail = document.createElement('input');
                hiddenInputEmail.setAttribute('type', 'hidden');
                hiddenInputEmail.setAttribute('name', 'Email');
                hiddenInputEmail.setAttribute('value', profile.getEmail());
                form.appendChild(hiddenInputId);
                form.appendChild(hiddenInputEmail);
                form.appendChild(hiddenInputUser);
                document.body.appendChild(form);   
                form.submit();
        
            },
            function(error) {
            });
    }

 function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); 
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
};
 function signOutGG(){
     var auth2 = gapi.auth2.getAuthInstance();
     auth2.signOut().then(function () {
         window.location = "https://localhost/shop-online/public/login";
     });
 };




