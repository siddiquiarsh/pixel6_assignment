//get captcha container using id

var captcha_container=document.getElementById('captcha_container');

//get form control using DOM

var form_name=document.getElementById('add_animal');

//get error control

var error=document.getElementById('error');

/**find random no */

var random_value=Math.floor(Math.random()*100000);

/**set Random no in captcha container */

document.getElementById('captcha_container').innerText=random_value;

/*function for check  captcha value  */

function checkcaptcha()
{
    var inputByUser=document.getElementById('captcha_value').value;
    if(inputByUser==random_value)
    {
        form_name.submit();
    }else
    {

        //send error msg 

        error.innerHTML='Captcha not Match'
        return false
   }
   
}
function check(){
    var form=document.getElementById('frm');
    if(form[0].value=='0' && form[1].value=='0')
    {
        return false;
    }
    
}

