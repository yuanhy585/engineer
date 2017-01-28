function calculateNum(){
    var num1 = document.forms[0].width.value;
    var num2 = document.forms[0].height.value;
    var num3 = document.forms[0].number.value;
    var num4 = document.forms[0].area.value;

    if (num1!="" && num2!="" && num3!="")
    {
        document.getElementById("area").value = parseInt(num1)*parseInt(num2)*
                parseInt(num3)/1000000;
    }
    else
    {
        document.getElementById("area").value="";
    }
}
