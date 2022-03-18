
function numberWithCommas(x) {
  try{
      var string = x;
      var parts = string.toString().split(".");
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return parts.join(".");

  }catch(e){
      return x;
  }
  
}
function show_nonti(title,text,type){
    // type 1 success
    // type 2 error
    new PNotify({
        title: title,
        text: text,
        type: type
    });
}
function testDecimals(currentVal) {
          var count;
          currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
          return count;
}

function replaceCommas(yourNumber) {
  var components = yourNumber.toString().split(".");
  if (components.length === 1) 
      components[0] = yourNumber;
  components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  if (components.length === 2)
      components[1] = components[1].replace(/\D/g, "");
  return components.join(".");
}

 function checkText(el){
    // var patt = /^([a-z0-9_./\\*+-])+$/i;
    var patt = /^([^'"])+$/i;
    var value = el.val();
    var new_value = value;
    if(!value.match(patt))
    {
      new_value = new_value.replace(/(['"])/ig,"inc ");
      el.val(new_value);
    }
}

function intOnly(input,def){
  var regExp = /^[0-9\.]*$/;
  if(!regExp.test(input.val())){
    input.val(def);
  }
}

function read_only(el){
  $(el).css({
    border: '2px solid #FF0000'
  });

  $(el).keyup(function(event) {
      var value = $(this).val();
      if(value == ""){
          $(this).css( "border","2px solid #FF0000").append('<br>');
         
      }else{
          $(this).css( "border","");
      }
     
  });

}