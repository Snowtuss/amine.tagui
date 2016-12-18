function valider()
{
    var a = document.forms["form_viewpost"]["nom"].value;
    var b = document.forms["form_viewpost"]["email"].value;
    var c = document.forms["form_viewpost"]["commentaire"].value;
    if (a == null || a == "", b == null || b == "", c == null || c == "")
    {
        alert("Veillez bien remplir le formulaire !!!");
        return false;
    }
}
function valider2()
{
    var a = document.forms["form_register"]["username"].value;
    var b = document.forms["form_register"]["nom"].value;
    var c = document.forms["form_register"]["prenom"].value;
    var d = document.forms["form_register"]["email"].value;
    var e = document.forms["form_register"]["mdpr"].value;
    var f = document.forms["form_register"]["mdpr2"].value;
    if (a == null || a == "", b == null || b == "", c == null || c == "" ,d == null || d == "" ,e == null || e == "",f == null || f == "")
    {
        alert("Veillez bien remplir le formulaire !!!");
        return false;
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function register()
{
    var premier = document.getElementById("mdpr").value;
    var deuxieme = document.getElementById("mdpr2").value;


    if (premier === deuxieme)
    {
        return true;
    } else
    {
        alert("Les deux mot de passe sont pas les mêmes !!!")
        return false;
    }

}
var script = document.createElement('script');
script.src = 'http://code.jquery.com/jquery-1.11.0.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


