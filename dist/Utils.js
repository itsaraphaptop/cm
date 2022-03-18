
function format(input)
{ var num = input.value.replace(/\,/g,''); 
    if(!isNaN(num))
    { 
        if(num.indexOf('.') > -1)
        {
            num = num.split('.'); 
            num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join ('').replace(/^[\,]/,''); 
                if(num[1].length > 2)
                { 
                alert('You may only enter two decimals!');
                num[1] = num[1].substring(0,num[1].length-1);
                } 
            input.value = num[0]+'.'+num[1];

        } 
        else
        { 
        input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'')
        }; 
        } 
    else
    {
    // alert('You may enter only numbers in this field!'); 
    input.value = "0.00";
    input.select();
    // input.value = input.value.substring(0,input.value.length-1);
    }

 }

