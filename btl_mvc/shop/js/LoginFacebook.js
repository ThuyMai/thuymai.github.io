/**
 * Created by QuyTuTLU on 1/9/16.
 */
//login with facebook
window.fbAsyncInit = function() {
    FB.init({
        appId      : '218418578493430', // App ID
        xfbml      : true, // check login status
        version    : 'v2.4' // enable cookies to allow the server to access the session
    });
};

function LoginWithFacebook(){
    FB.login(function(response) {
        if(response.authResponse){
            getUserInfo(response.authResponse.accessToken);
        }else{
            console.log('User cancelled login or did not fully authorize.');
        }
    },{scope: 'email'});
}

function getUserInfo(at) {
    FB.api('/me', { locale: 'en_US', fields: 'name, email,id,locale' }, function(response) {
        //alert(response.id);
        var res={name:response.name,id:response.id};
        var json=JSON.stringify(res);
        console.log(json);
        DangNhapVoiFace(response.name,response.id,response.locale);
    });
}

// Load the SDK asynchronously
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)){
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function DangNhapVoiFace (TenDangNhap,Email,Locale) {
    //alert(TenDangNhap+Email+Locale);
    document.getElementById("fb_name").value=TenDangNhap;
    document.getElementById("fb_idfb").value=Email;
    document.getElementById("fb_locale").value=Locale;
    document.getElementById("loginFB").submit();
}