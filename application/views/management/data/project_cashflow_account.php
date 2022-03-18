<style type="text/css">
      .mychart{
            height: 50vh;
      }
</style>


<div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
              <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Home - Project Cashflow Account</span></h4>
              </div>
            </div>

            <div class="breadcrumb-line">
              <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="<?php echo base_url(); ?>management/project_status_overview">Project Cashflow Account</a></li>
              </ul>
            </div>
        </div>
         <!-- Page header -->

          <!-- content -->
          <div class="content">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="panel-body">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-top top-divided">
                    <li class="active"><a href="#top-divided-tab" data-toggle="tab">Project by Account</a></li>
                      <li id="Calendar_li"><a href="#top-divided-tab1" data-toggle="tab">Calendar</a></li>
                      <li id="tap_Graph"><a href="#top-divided-tab2" data-toggle="tab">Graph</a></li>
                      <li ><a href="#top-divided-tab3" data-toggle="tab">Master Project CashFlow</a></li>
                    </ul>
                    <div class="tab-content">
                     <div class="tab-pane active" id="top-divided-tab">
                                       <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><div style="width: 300px;"><b>Particular</b></div></th>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('project');
                          $p=$this->db->get()->result();
                          foreach ($p as $keyp) { ?>
                          <th class="text-center"><?php echo $keyp->project_name; ?></th>
                         <?php  } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Contract<br>
                           Variations Order (V/O)
                          </td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00<br>
                          0.00
                          </td>
                         <?php  } ?>
                        </tr>
                        <tr>
                          <td>Total Contract Amount
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                          </td>
                          
                        </tr>
                        <tr>
                          <td> <U>Revenue</U> <br>
                          Progress<br>
                           <U>Add</U> Vat<br>
                           <U>Add</U> Advance<br>
                           <U>Add</U> Retention<br>
                           <U>Less</U> Advance<br>
                           <U>Less</U> RET (24 Month)</td>

                            <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                          </td>
                         <?php  } ?>
                        </tr>
                        <tr>
                          <td>Total Revanue Amount</td>
                           <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                        </tr>
                        <tr>
                          <td> <U>Cost</U> <br>
                          Material by P/O (APV)<br>
                          Petty Cash (Mat)<br>
                          Petty Cash (Sub)<br>
                          Bank Change/biddy Free<br>
                          Site Admin Expense<br>
                          Petty Cash Other<br>
                          Sallary , Other Expense<br>
                          Subcontractor (APS)<br>
                          RV<br>
                          Interests<br>
                          Advance <br>

                           <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                            0.00<br>
                          </td>
                         <?php  } ?>
                          </td>
                        </tr>
                       <tr>
                         <td>Total Cost Amount</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00<br>
                          0.00
                          </td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>Profit and Loss</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00<br>
                          0.00
                          </td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>Aval</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>Vendor Balace (Inc. VAT)</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>Retention Remain</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>P/N Receipt</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>P/N Payable</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                       </tr>
                       <tr>
                         <td>Loan Remain</td>
                          <?php foreach ($p as $keyp) { ?>
                          <td class="text-center">0.00</td>
                         <?php  } ?>
                       </tr>
                   </tbody>
                 </table>

                    </div>
                     </div>
                      <div class="tab-pane" id="top-divided-tab1">
                        <div id="fullcalendar_AC_B" >
                          
                        </div>
                      </div>
                      <div class="tab-pane" id="top-divided-tab2">
                        <div class="col-lg-12" style="overflow-x: scroll;">
                        <h5 style="display: inline;"> Chart Type : </h5><select id="income_expan"></select>
                        <div id="chart_income_expen" class="mychart" style="height: 500px;">
                          
                        </div>
                        
                      </div>
                    </div> 

                    <div class="tab-pane" id="top-divided-tab3">
                    <form action="<?php echo base_url(); ?>management_active/master_cf" method="post">
                        <div class="form-horizontal">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label col-lg-1 text-right">Code</label>
                            <div class="col-lg-4">
                              <input type="text" id="code" class="form-control" name="code" readonly="true" value="<?= $master_id ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-1 text-right">Descitption</label>
                            <div class="col-lg-4">
                              <input type="text" id="detail_cf" class="form-control" name="detail_cf">
                            </div>
                          </div>
                           <div class="form-group">
                            <a class="btn btn-default" id="add_row">#ADD ROW</a>
                            <button type="submit" class="btn bg-success" id="submit"><i class="icon-floppy-disk"></i> Save</button>
                           </div>
                            <table class="table table-bordered table-striped">
                              <tbody id="detail">
                              </tbody>
                            </table>
                          </div>
                          <div class="col-lg-6">
                            <table class="table table-bordered table-striped" id="data_master">
                              <thead>
                                <tr class="bg-info">
                                  <th>Code</th>
                                  <th>Descrition</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php
                                foreach ($data_master as $key => $data_master) {
                                ?>
                                <tr>
                                  <td><?= $data_master->code ?></td>
                                  <td><?= $data_master->description ?></td>
                                </tr>
                              <?php
                                }
                              ?>
                              </tbody>
                            </table>
                          </div>
                        </div>

                        </form>
                        </div>
                        </div>
                        <div class="project_list"></div>

                        <script type="text/javascript">
                          $('#add_row').click(function(event) {
                             insert_row();

                             function insert_row(){

                               var row = ($('#detail tr').length)+1;
                               var tr = '<tr>'+
                                          '<td class="text-center">'+row+'</td>'+
                                          '<td>'+
                                            '<a class="list_pj'+row+' btn btn-default btn-icon" data-toggle="modal" pj_id="'+row+'" data-target="#open_pj'+row+'"><i class="icon-search4"></i></a>'+
                                          '</td>'+
                                          '<td>'+
                                            '<input type="text" class="form-control" name="pj_code[]" id="pj_code'+row+'" />'+
                                          '</td>'+ 
                                          '<td>'+
                                            '<input type="text" class="form-control" name="pj_name[]" id="pj_name'+row+'" />'+
                                          '</td>'+
                                        '</tr>';
                            $('#detail').append(tr);


                              var project = '<div id="open_pj'+row+'" class="modal fade">'+
                                '<div class="modal-dialog modal-lg">'+
                                  '<div class="modal-content ">'+
                                    '<div class="modal-header bg-info">'+
                                      '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                      '<h5 class="modal-title">เลือกโครวการ</h5>'+
                                    '</div>'+
                                    '<div class="modal-body">'+
                                      '<div class="row" id="modal_pj'+row+'">'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                                '</div>'+
                              '</div>';

                            $('.project_list').append(project);

                            $(".list_pj"+row+"").click(function(){
                                var id = $(this).attr('pj_id');
                                $('#modal_pj'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                $("#modal_pj"+row+"").load('<?php echo base_url(); ?>index.php/share/project_pm/'+id);
                            });

                        }
                          });
                       </script>

                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- content -->
</div>
  <!-- Modal -->
  <div id="detail_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-full" >

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div id="detail_content" class="modal-body">
          <div id=""></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- Modal -->

<script type="text/javascript">
  var chart_type = [
          "column",
          "bar",
          "line",
          "area"
                ];
  function chart_render(target,type_chart,stack_option,categories,data,title,array_project_code) {
            $(target).kendoChart({
               title: {
                    text: title,
                    font: "18px Arial,Helvetica,sans-serif"
                },
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: type_chart,
                    stack: stack_option,
                    dynamicHeight: false,
                    labels: {
                        template: "#= kendo.format('{0:n}',value) #",
                        visible: true,
                        font: "18px sans-serif",
                        align: "center",
                        position: "top",
                        background: "transparent",
                        color: "#4286f4",
                        padding: 5,
                        border: {
                            width: 1,
                            dashType: "dot",
                            color: "#000"
                        },
                        format: "N0"
                    }
                },
                series: data,
                seriesClick: function(e) {
                   //alert(555);
                   //พี่บอล
                   console.log(e);
                   var base_url = '<?= base_url(); ?>';
                   var controller = "null";
                   var method = "null";
                   var type = e.series.name;
                   var index_chart = e.point.categoryIx;
                   var project_code = array_project_code[index_chart];

                   var url = `${base_url}${controller}/${method}/${project_code}/${type}`;
                   $("#detail_content").html(url);
                   $("#detail_modal").modal('toggle');
                   //alert(project_code);
                  //alert(url);

                   
                   
                },valueAxis: {
                    line: {
                        visible: true
                    },
                    minorGridLines: {
                        visible: true
                    }
                },
                 pannable: {
                    lock: "y"
                },
                // zoomable: {
                //     mousewheel: {
                //         lock: "y"
                //     },
                //     selection: {
                //         lock: "y"
                //     }
                // },
                categoryAxis: {
                    categories: categories,
                    majorGridLines: {
                        visible: true
                    },
                    labels: {
                      rotation: -45,
                      font: "18px sans-serif",    
                    }
                },
                tooltip: {
                    visible: true,
                    template: "#= series.name #: #= kendo.format('{0:n}',value) #",
                    font: "22px sans-serif",

                }

            });
        } 
</script>
<script type="text/javascript">
  $(function(){
      $.get('<?= base_url()?>management_active/get_json_to_calender', function() {
        /*optional stuff to do after success */
      }).done(function(data){

          try{
            var json_date_income = jQuery.parseJSON(data);
            $("#Calendar_li").click(function(){
              $("html").append('<div class="loading">Loading&#8230;</div>');
                 setTimeout(function(){ 
                  $(".loading").remove();
                    showCalender("#fullcalendar_AC_B",json_date_income,<?= date('Y-m-d')?>);
                  }, 500);   
            });
            

            

          }catch(e){
              alert("Error : get data false");
          }
        
      });

      $.get('<?=base_url()?>management_active/get_josn_Graph_Income_Expen', function() {
          
      }).done(function(data){
          try{
            var json_chart_data_ic_ep = jQuery.parseJSON(data);
             $.each(chart_type, function(index, val) {
               $("#income_expan").append(`<option value="${val}">${val}</option>`);    
             });

           
            // init chart
            //chart_render('#chart_income_expen','column',0,json_chart_data_ic_ep.categories,json_chart_data_ic_ep.data,"รายรับ รายจ่าย");
           
            $("#tap_Graph").click(function(event) {
              $("html").append('<div class="loading">Loading&#8230;</div>');
              setTimeout(function(){ 
                 $(".loading").remove();
                chart_render('#chart_income_expen','column',0,json_chart_data_ic_ep.categories,json_chart_data_ic_ep.data,"รายรับ รายจ่าย",json_chart_data_ic_ep.project_code);
              }, 500);    
            });
            

            // event chart type
            $('#income_expan').change(function() {
              
                 chart_render('#chart_income_expen',$(this).val(),0,json_chart_data_ic_ep.categories,json_chart_data_ic_ep.data,"รายรับ รายจ่าย",json_chart_data_ic_ep.project_code);
            });


          }catch(e){

          }
          
      });

     

  });
 




function showCalender(target_tag,data_date,defaultDate){
  //alert(555);
  var color_income = "#33ccff";
  var color_expen  = "#f93131";
  var controllerName ="controller";
  var methodName = "myMethod";
  var type = "";
  //$(target_tag).html(55555555555555)
  $(target_tag).fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        //defaultDate: '2017-05-24',
        // edit move event in calendar
        //editable: true,
        isRTL: true,
        lang: 'th',
        events: data_date,
        eventClick:  function(event, jsEvent, view) {
           //alert(5555);
           var duedate = event.start._i;
           var color = event.color;

           if(color == color_income){
              type = "income";
           }else if(color == color_expen){
              type = "expen";
           }else{
              type = "error";
           }
           
           var url = "<?= base_url()?>"+controllerName+"/"+methodName+"/"+type+"/"+duedate;

           $("#detail_content").load('<?= base_url()?>management/modalcaredda/'+duedate+'/'+type);
           $("#detail_modal").modal("toggle");
        }
    });
}



</script>

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
  $('#data_master').DataTable();
</script> -->