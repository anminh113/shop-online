window.fbAsyncInit = function() {
    FB.init({
        appId: '2193459764274637',
        cookie: true,
        xfbml: true,
        version: 'v3.1'
    });

    FB.AppEvents.logPageView();

    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'We are connected.';
           
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'We are not logged in.'
        } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
        }
    });

};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



// login with facebook with extra permissions
function login() {
    FB.login(function(response) {
        if (response.status === 'connected') {
            FB.api('/me', 'GET', { fields: 'first_name,last_name,name,id,email,gender' }, function(response) {
                    // document.getElementById('hoten').value = response.name;
                    // document.getElementById('email').value = response.email;
                    var form = document.getElementById('LoginFormGGFB');
                    form.setAttribute('method', 'post');
     
                    var hiddenInputId = document.createElement('input');
                    hiddenInputId.setAttribute('type', 'hidden');
                    hiddenInputId.setAttribute('name', 'Id');
                    hiddenInputId.setAttribute('value', response.id);
     
                    var hiddenInputTypeFB = document.createElement('input');
                    hiddenInputTypeFB.setAttribute('type', 'hidden');
                    hiddenInputTypeFB.setAttribute('name', 'Type');
                    hiddenInputTypeFB.setAttribute('value', 'FB');
    
                    form.appendChild(hiddenInputId);
                    form.appendChild(hiddenInputTypeFB);
                    document.body.appendChild(form);   
                    form.submit();
                 });
           
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'We are not logged in.'
        } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
        }
    }, { scope: 'email' });

}

// getting basic user info

function getInfo() {
    FB.api('/me', 'GET', { fields: 'first_name,last_name,name,id' }, function(response) {
        document.getElementById('status').innerHTML = response.first_name;
    });
}