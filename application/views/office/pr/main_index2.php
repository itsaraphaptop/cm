<style type="text/css">
	.borderless td, .borderless th {
	    border: none !important;
	    width: 80px;
	}
	.scroll {
	    width: 1000px;
	    overflow-x: auto;
	    overflow-y: hidden;
	    white-space: nowrap;
	}
	.panel-body{
		font-size: 8pt;
		padding-top: 5px;
	}
	#search_project{
		padding-top: 40px;
	}
	#projcet{
		width: 300px;
	}
	#all_project{
		height: 100px;
		width: 100%
	}
	#pr_pc{
		border-style: solid;
	}
	.dataTables_filter input { height: 30px }
</style>

<div class="page-header">
<div class="panel-heading">
	<h6 class="panel-title"><b>Purchasc Reguisition Overviews</b></h6>
</div>

<div class="panel-body">
	<div class="col-lg-3 col-md-3 col-sm-3 text-center">
	<div id="pr_pc">
	<label><h6><b>PR & PC Status All Project</b></h6></label>
		<table class="borderless" id="all_project">
			<thead>
				<tr>
					<th></th>
					<th class="text-center"><b>PR</b></th>
					<th class="text-center"><b>PC</b></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><b>Open</b></td>
					<td><span class="badge badge-warning pull-center"><?= number_format($pr_count['open']) ?></span></td>
					<td><span class="badge badge-warning pull-center"><?= number_format($pr_count['open']) ?></span></td>
					
				</tr>

				<tr>
					<td><b>Waiting</b></td>
					<td><span class="badge badge-danger pull-center"><?= number_format($pr_count['wait']) ?></span></td>
					<td><span class="badge badge-danger pull-center"><?= number_format($pr_count['wait']) ?></span></td>
					
				</tr>

				<tr>
					<td><b>Approve</b></td>
					<td><span class="badge badge-success pull-center"><?= number_format($pr_count['approve']) ?></span></td>
					<td><span class="badge badge-success pull-center"><?= number_format($pr_count['approve']) ?></span></td>
					
				</tr>
				<tr><td colspan="2"><p></p></td></tr>
			</tbody>
		</table>
	</div>
		<div class="input-group content-group" id="search_project">
			<div class="has-feedback has-feedback-left">
				<input type="text" class="form-control input-xs" placeholder="Find Project">
				<div class="form-control-feedback">
					<i class="icon-search4 text-muted text-size-base"></i>
				</div>
			</div>
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary btn-xs">Search</button>
			</div>
		</div>

	</div>
	<div class="col-lg-4 col-md-4 col-sm-4">
		<div id="exampleG" style="height: 250px"></div>
	</div>
	<div class="col-lg-1">
		<h5 style="display: inline;"> Year : </h5>
		<select id="">
			<option>2017</option>
			<option>2016</option>
			<option>2015</option>
		</select>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4">
		<div>
        <div id="chart" style="height:260px;"></div>
		</div>
	</div>


	<div class="col-lg-12">
		<div class="scrollmenu_2 sidebar-fixed" id="project_view">
			<a style="border-style: solid;">
				<table class="borderless" id="projcet">
					<thead>
						<tr>
							<th colspan="2" class="text-center">
								<b>Project : </b> XXXXXXXX
							</th>
						</tr>
						<tr>
							<th>
								<b>Contract : </b> XXX,XXX.XX ฿
							</th>
							<th>
								<b>Ref code : </b> XXXXXXXX
							</th>
						</tr>
						<tr>
							<th colspan="2" >
								<b>Project Manager : </b> XXXXXXXX
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<img class="img-thumbnail" src="<?php echo base_url(); ?>profile_project/work.jpg" style="width: 150px;">
							</td>
							<td>
								<p><b>PR Open</b> <span class="badge badge-warning pull-right"><?= number_format($pr_count['open']) ?></span></p>
								<p><b>PR Waiting </b><span class="badge badge-danger pull-right"><?= number_format($pr_count['wait']) ?></span></p>
								<p><b>PR Approve</b><span class="badge badge-success pull-right"><?= number_format($pr_count['approve']) ?></span></p>

								<p><b>PC Open</b> <span class="badge badge-warning pull-right"><?= number_format($pr_count['open']) ?></span></p>
								<p><b>PC Waiting</b><span class="badge badge-danger pull-right"><?= number_format($pr_count['wait']) ?></span></p>
								<p><b>PC Approve</b><span class="badge badge-success pull-right"><?= number_format($pr_count['approve']) ?></span></p>

							</td>
						</tr>
						<tr>
							<th colspan="2">
								<div class="col-lg-4">Project Progress</div>
								<div class="col-lg-6">
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-striped active" data-transitiongoal-backup="100" data-transitiongoal="100" style="width: 100%;" aria-valuenow="100"></div>
									</div>
								</div>
								<div class="col-lg-2">100%</div>
							</th>
						</tr>
					</tbody>
				</table>
				&nbsp;
			</a>
			<a style="border-style: solid;">
				<table class="borderless" id="projcet">
					<thead>
						<tr>
							<th colspan="2" class="text-center">
								<b>Project : </b> XXXXXXXX
							</th>
						</tr>
						<tr>
							<th>
								<b>Contract : </b> XXX,XXX.XX ฿
							</th>
							<th>
								<b>Ref code : </b> XXXXXXXX
							</th>
						</tr>
						<tr>
							<th colspan="2" >
								<b>Project Manager : </b> XXXXXXXX
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<img class="img-thumbnail" src="<?php echo base_url(); ?>profile_project/work.jpg" style="width: 150px;">
							</td>
							<td>
								<p><b>PR Open</b> <span class="badge badge-warning pull-right"><?= number_format($pr_count['open']) ?></span></p>
								<p><b>PR Waiting </b><span class="badge badge-danger pull-right"><?= number_format($pr_count['wait']) ?></span></p>
								<p><b>PR Approve</b><span class="badge badge-success pull-right"><?= number_format($pr_count['approve']) ?></span></p>

								<p><b>PC Open</b> <span class="badge badge-warning pull-right"><?= number_format($pr_count['open']) ?></span></p>
								<p><b>PC Waiting</b><span class="badge badge-danger pull-right"><?= number_format($pr_count['wait']) ?></span></p>
								<p><b>PC Approve</b><span class="badge badge-success pull-right"><?= number_format($pr_count['approve']) ?></span></p>

							</td>
						</tr>
						<tr>
							<th colspan="2">
								<div class="col-lg-4">Project Progress</div>
								<div class="col-lg-6">
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-striped active" data-transitiongoal-backup="100" data-transitiongoal="100" style="width: 100%;" aria-valuenow="100"></div>
									</div>
								</div>
								<div class="col-lg-2">100%</div>
							</th>
						</tr>
					</tbody>
				</table>
				&nbsp;
			</a>
			
			

		</div> <br/><br/>
	</div>


		<div class="col-lg-7">
			<table class="table table-responsive table-bordered table-xxs" id="department">
				<thead>
					<tr>
						<th>No</th>
						<th>Depart Code</th>
						<th>Depart Name</th>
						<th>PR Waiting</th>
						<th>PR Approve</th>
						<th>PR Open</th>
						<th>PC Waiting</th>
						<th>PC Approve</th>
						<th>PC Open</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>HQ</td>
						<td>Header Quarter</td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
					</tr>

					<tr>
						<td>2</td>
						<td>AC</td>
						<td>Account</td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>AC</td>
						<td>Account</td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>AC</td>
						<td>Account</td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
						<td><span class="badge badge-danger"><?= number_format($pr_count['wait']) ?></span></td>
						<td><span class="badge badge-success"><?= number_format($pr_count['approve']) ?></span></td>
						<td><span class="badge badge-warning"><?= number_format($pr_count['open']) ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-lg-5">
			<div class="col-lg-12">
				<div class="col-lg-3">
					<select name="select" class="form-control input-xs">
						<option value="opt1">Project</option>
						<option value="opt2">Department</option>
					</select>
				</div>
				<div class="col-lg-4">
					<div class="input-group content-group">
							<input type="text" class="form-control input-xs" placeholder="Search">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-xs"><i class="icon-search4 text-muted text-size-base"></i></button>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<select name="select" class="form-control input-xs" placeholder="Year/Momth">
						<option value="opt1"></option>
						<option value="opt2"></option>
					</select>
				</div>
				<div class="col-lg-2">
					<select name="select" class="form-control input-xs" placeholder="Year/Momth">
						<option value="opt1"></option>
						<option value="opt2"></option>
					</select>
				</div>
			</div>
		</div>


</div>
	
</div>




<?php $data_chart = $pr_chart;?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">

// $(document).ready(function() {
    // $('#department').DataTable();
     $('#department').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "scrollY": "63px",
        "oLanguage": {
                    "sSearch": "Department Overviews : "
            }
    } );
// } );





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
                        font: "15px sans-serif",
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
                      font: "15 sans-serif"
                    }
                },
                tooltip: {
                    visible: true,
                     template: "#= series.name #: #= kendo.format('{0:n}',value) #",
                    font: "15px sans-serif",

                },
                minorGridLines: {
                    visible: true
                }

            });
} 

	var month_get = ['','JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
     

    var data = jQuery.parseJSON('<?= json_encode($data_chart) ?>');

		console.log(data.open_pc);

	// $.each(data, function(index, val) {
	// });


    var dataee =  [{
	                    name: "PC Open",
	                    data: data.open_pc
	               	}, {
	                    name: "PC Approve",
	                    data: data.approve_pc
	                },{
	                    name: "PR Open",
	                    data: data.open
	                },{
	                    name: "PR Approve",
	                    data: data.approve
	             	}];

		chart_render("#exampleG","line",null,month_get,dataee,""); 
         

</script>


    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    text: null
                },
                legend: {
                   position: "top"
                },
                seriesDefaults: {
                    labels: {
                       template: "${ category } - ${ value }%",
                        // position: "outsideEnd",
                        visible: true,
                        background: "transparent"
                    }
                },
                series: [{
                    type: "pie",
                    data: [{
                        category: "PR Waiting",
                        value: 45
                    }, {
                        category: "PR Open",
                        value: 5
                    }, {
                        category: "PR Approve",
                        value: 65
                    }]
                }],
                tooltip: {
                    visible: true,
                    template: "#= category # - #= kendo.format('{0:P}', percentage) #"
                }
            });
        }

        // $(document).ready(function() {
            createChart();
            $(document).bind("kendo:skinChange", createChart);
            $(".box").bind("change", refresh);
        // });

        function refresh() {
            var chart = $("#chart").data("kendoChart"),
                pieSeries = chart.options.series[0],
                labels = $("#labels").prop("checked"),
                alignInputs = $("input[name='alignType']"),
                alignLabels = alignInputs.filter(":checked").val();

            chart.options.transitions = false;
            pieSeries.labels.visible = labels;
            pieSeries.labels.align = alignLabels;

            alignInputs.attr("disabled", !labels);

            chart.refresh();
        }
    </script>