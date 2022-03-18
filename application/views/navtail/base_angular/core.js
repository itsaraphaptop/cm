$(document).ready(function() {
	alert("ddd");
	$.getJSON("<?php echo base_url(); ?>share/getjsonmat", function(json){
            $('#myselect').empty();
            $('#myselect').append($('<option>').text("myselect"));
            $.each(json, function(i, obj){
                    $('#myselect').append($('<option>').text(obj.matcode).attr('value', obj.matcode));
            });
    });
});