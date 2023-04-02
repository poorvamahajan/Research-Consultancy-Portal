function validate(){
    if(document.myform.name.value==""|| document.myform.name.value.length<3)
       { 
           alert("Please Provide valid Name");
           document.myform.name.focus();
           return false;
       }
       if(document.myform.password.value==""|| document.myform.password.value.length<3)
       { 
           alert("Please fill Password Field");
           document.myform.password.focus();
           return false;
       }
       if(document.myform.confirmpassword.value==""|| document.myform.confirmpassword.value.length<3)
       { 
           alert("Please fill Confirm Password Field");
           document.myform.confirmpassword.focus();
           return false;
       }
       if(document.myform.password.value!=document.myform.confirmpassword.value)
       { 
           alert("Password doesn't Match");
           document.myform.password.focus();
           return false;
       }

    if(document.myform.email.value=="")
       { 
           alert("Please Provide Your Email");
           document.myform.email.focus();
           return false;
       }
       if(document.myform.files.value=="")
          { 
              alert("Please Upload Your Profile Picture");
              document.myform.files.focus();
              return false;
          }
     

    if(document.myform.phoneno.value=="" || isNaN(document.myform.phoneno.value) || document.myform.phoneno.value.length!=10)
       { 
           alert("Please Provide valid Phone Number");
           document.myform.phoneno.focus();
           return false;
       }
    if(document.myform.details.value=="")
       { 
           alert("Please Provide Details");
           document.myform.details.focus();
           return false;
       }
       email_Validate();
       validateemail();
        return true;
}
function email_Validate()
{
var mailformat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
if(!document.myform.email.value.match(mailformat))
{
alert("You have entered an invalid email address,Please Enter Valid Mail!");
return false;
}
return true;
}
function validateemail(){
    var emailID=document.myform.email.value;
    atpos=emailID.indexOf("@");
    dotpos=emailID.lastIndexOf(".");
    if(atpos<1||(dotpos-atpos<2)){
        alert("Please Provide valid Email Id");
           document.myform.email.focus();
           return false;
    }
    return true;
}
function test_str() {
    var res;
    var str =document.myform.password.value;
       
    if (str.match(/[a-z]/g) && str.match(
            /[A-Z]/g) && str.match(
            /[0-9]/g) && str.match(
            /[^a-zA-Z\d]/g) && str.length >= 8)
        return true;
    else
        return false;
    alert("res") ;
    document.myform.password.focus();

}