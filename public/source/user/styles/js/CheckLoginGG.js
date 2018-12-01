var googleUser = {};
var startApp = function() {
    gapi.load('auth2', function() {
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({

            'client_id': '981798466996-o7ffbpavqm598cap9ems9fungt4juob1.apps.googleusercontent.com',
            'cookiepolicy': 'single_host_origin',
            'scope': 'https://www.googleapis.com/auth/user.phonenumbers.read',
           
        });
        attachSignin(document.getElementById('customBtn'));
    });
};

function attachSignin(element) {
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            var profile = googleUser.getBasicProfile();
            document.getElementById('name').innerText = "Signed in: " + googleUser.getBasicProfile().getName();
            var form = document.getElementById('LoginFormGGFB');
            form.setAttribute('method', 'post');

            var hiddenInputId = document.createElement('input');
            hiddenInputId.setAttribute('type', 'hidden');
            hiddenInputId.setAttribute('name', 'Id');
            hiddenInputId.setAttribute('value', profile.getId());

            var hiddenInputTypeGG = document.createElement('input');
            hiddenInputTypeGG.setAttribute('type', 'hidden');
            hiddenInputTypeGG.setAttribute('name', 'Type');
            hiddenInputTypeGG.setAttribute('value', 'GG');

            form.appendChild(hiddenInputId);
            form.appendChild(hiddenInputTypeGG);
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

    var form = document.getElementById('LoginFormGGFB');
    form.setAttribute('method', 'post');

    var hiddenInputId = document.createElement('input');
    hiddenInputId.setAttribute('type', 'hidden');
    hiddenInputId.setAttribute('name', 'Id');
    hiddenInputId.setAttribute('value', profile.getId());

    var hiddenInputTypeFB = document.createElement('input');
    hiddenInputTypeFB.setAttribute('type', 'hidden');
    hiddenInputTypeFB.setAttribute('name', 'Type');
    hiddenInputTypeFB.setAttribute('value', 'GG');

    form.appendChild(hiddenInputId);
    form.appendChild(hiddenInputTypeFB);
    document.body.appendChild(form);   
    form.submit();
   
}

var test = function(){
    gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
            'client_id': '981798466996-o7ffbpavqm598cap9ems9fungt4juob1.apps.googleusercontent.com',
            'cookiepolicy': 'single_host_origin',

        });
    });
}





