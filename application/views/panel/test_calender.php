


<?php 
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];

?>
 


<script> 

function getstatus(){

    getDataFromDb();

}

function getDataFromDb()
{
  $.ajax({ 
        url: "<?php echo base_url();?>jsonr/calender_alert" ,
        type: "get",
        data: '',
  })
  .success(function(result) { 
        var obj1 = jQuery.parseJSON(JSON.stringify(result));     
        
          if(obj1 != ''){
              var heading = null;
              var notice = null;

              $.each(obj1, function(key, val) {
                  if(val.chk == 1){
                      $.get('<?=base_url()?>office/udate_nonti/'+val.id, function(data) {
                        
                      }).done(function(){
                          heading = val.heading ;
                          notice = val.notice;
                           notifyMe(heading,notice);
                      });
                  
                  }
              });
          }
      });


}

function notifyMe(heading,notice) {      
  if(Notification.permission !== "granted"){  
    Notification.requestPermission();  
  }else{
    var a = heading+" "+"("+notice+")";
    var notification = new Notification('มีรายการแจ้งเตือน (Calendar)', {  
      icon: 'https://www.shareicon.net/download/2015/08/28/92081_alert_512x512.png',  
      body: a, 

    });  
    notification.onclick = function () {  
      window.open("<?php echo base_url();?>index.php/calender/index");        
    };  
  }  
  
} 



getstatus();
setInterval(getstatus, 5000);
</script>  


<script> 

function getstatuss(){

    getDataFromDbb();

}

function getDataFromDbb()
{
  $.ajax({ 
        url: "<?php echo base_url();?>jsonr/calender_alertt" ,
        type: "get",
        data: '',
  })
  .success(function(result) { 
        var obj1 = jQuery.parseJSON(JSON.stringify(result));     
        
          if(obj1 != ''){
              var heading = null;
              var notice = null;

              $.each(obj1, function(key, val) {
                  if(val.chk == 1){
                      $.get('<?=base_url()?>office/udate_nonti/'+val.id, function(data) {
                        
                      }).done(function(){
                          heading = val.heading ;
                          notice = val.notice;
                           notifyMe(heading,notice);
                      });
                  
                  }
              });
          }
      });


}

function notifyMe(heading,notice) {      
  if(Notification.permission !== "granted"){  
    Notification.requestPermission();  
  }else{
    var a = heading+" "+"("+notice+")";
    var notification = new Notification('มีรายการแจ้งเตือน (Calendar)', {  
      icon: 'https://www.shareicon.net/download/2015/08/28/92081_alert_512x512.png',  
      body: a, 

    });  
    notification.onclick = function () {  
      window.open("<?php echo base_url();?>index.php/calender/index");        
    };  
  }  
  
} 



getstatuss();
setIntervall(getstatuss, 5000);
</script>  



<script> 

function task(){

    getDatatask();

}

function getDatatask()
{
  $.ajax({ 
        url: "<?php echo base_url();?>jsonr/chk_task" ,
        type: "get",
        data: '',
  })
  .success(function(result) { 
        var obj1 = jQuery.parseJSON(JSON.stringify(result));     
        
          if(obj1 != ''){
              var heading = null;
              var notice = null;

              $.each(obj1, function(key, val) {
                  if(val.chk == 1){
                      $.get('<?=base_url()?>office/udate_task/'+val.id, function(data) {
                        
                      }).done(function(){
                          heading = val.sub_task ;
                          notice = val.date_task;
                           notifyMetask(heading,notice);
                      });
                  
                  }
              });
          }
      });


}

function notifyMetask(heading,notice) {      
  if(Notification.permission !== "granted"){  
    Notification.requestPermission();  
  }else{
    var a = heading+" "+"("+notice+")";
    var notification = new Notification('มีรายการแจ้งเตือน (Task)', {  
      icon: 'https://www.shareicon.net/download/2015/08/28/92081_alert_512x512.png',  
      body: a, 

    });  
    notification.onclick = function () {  
      window.open("<?php echo base_url();?>index.php/tasklist/index");        
    };  
  }  
  
} 



task();
setIntervall(task, 5000);
</script> 