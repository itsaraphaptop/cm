<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Home - Project Forecast Monthly</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="<?php echo base_url(); ?>management/ProjectForecastMonthly">Project Forecast Monthly</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <a class="btn btn-primary" id="tab_Graph">Graph</a>
                <div id="example"></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


function chart_render(target,type_chart,stack_option,categories,data,title) {
            $(target).kendoChart({
               title: {
                    text: title,
                    font: "bold 20px Arial,Helvetica,Sans-Serif",
                    color:"#000000"
                },
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: type_chart,
                    stack: stack_option,
                    dynamicHeight: false,
                    labels: {
                        template: "#= value #",
                        //visible: true,
                        font: "18px sans-serif",
                        align: "center",
                        position: "top",
                        background: "transparent",
                        color: "#FFFFFF",
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
                   
                },valueAxis: {
                    line: {
                        visible: false
                    },
                    minorGridLines: {
                        visible: true
                    }
                },
                 pannable: {
                    lock: "y"
                },
                zoomable: {
                    mousewheel: {
                        lock: "y"
                    },
                    selection: {
                        lock: "y"
                    }
                },
                categoryAxis: {
                    categories: categories,
                    majorGridLines: {
                        visible: false
                    },
                    labels: {
                      rotation: "auto",
                      font: "20px sans-serif"
                    }
                },
                tooltip: {
                    visible: true,
                     template: "#= series.name #: #= kendo.format('{0:n}',value) #",
                    font: "22px sans-serif",

                },
                minorGridLines: {
                    visible: true
                }

            });
} 


var chart_type = [
        "column",
        "bar",
        "line",
        "area"
];

$("#tab_Graph").click(function(event) {

    // alert(555);
    $("#example").html('<div class="loading">Loading&#8230;</div>');
     setTimeout(function(){ 
      var month = ["SEP-2017", "OCT-2017", "NOV-2017", "DEC-2017", "JAN-2018", "FEB-2018"];
      var data =   [{   
                        name:"Booking",
                        data: ["10", "50", "50", "40", "30", "150"]
                        
                    },{
                        name:"Achase",
                        data: ["41", "80",null, "90", "60", "80"]
                    }] ;
           chart_render("#example","line",0,month,data,"Accumulate"); 
    }, 500);
});
 
  // $('#data_master').DataTable(); 
</script>