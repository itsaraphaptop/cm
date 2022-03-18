<div class="col-md-9">
						<div class="form-group">
							<div id="chart_line"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="panel bg-teal-400 boxhight">
								<div class="panel-body">
									<div class="heading-elements">
										<h1><?php echo number_format($ponetamt,2); ?></h1>
									</div>
									<h3 class="no-margin">PO OPEN</h3>
									<div class="text-muted text-size-small">Amount</div>
								</div>
								<div class="container-fluid">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel bg-indigo-400 boxhight">
								<div class="panel-body">
									<div class="heading-elements">
										<h1><?php echo number_format($po_receive,2); ?></h1>
									</div>

									<h3 class="no-margin">PO Receipt</h3>
									<div class="text-muted text-size-small">Amount</div>
								</div>
								<div class="container-fluid">
									<div id="app_sales"></div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel bg-violet-400 boxhight">
								<div class="panel-body">
									<div class="heading-elements">
										<h1><?php echo number_format($po_actual,2); ?></h1>
									</div>

									<h3 class="no-margin">PO Actual</h3>
									<div class="text-muted text-size-small">Amount</div>
								</div>
								<div class="container-fluid">
									<div id="chart_area_basic"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12">
								<div class="panel">
									<div class="panel-body">										<div class="heading-elements">
											<h1><?php echo number_format($expense_total,2); ?></h1>
										</div>

										<h3 class="no-margin">Expense Total</h3>
										<div class="text-muted text-size-small">Amount</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
									</div>
									<div class="container-fluid">
										<div class="example">
											<div class="demo-section k-content wide">
										        <div id="chart" class="boxexpense"></div>
										    </div>
										</div>
										<!--  -->
									</div>
								</div>
							</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12">
								<div class="panel">
									<div class="panel-body">
										<div class="heading-elements text-right">
											 <h1  class="no-margin"> <?php echo number_format($count_lo_open,2); ?></h1>
											<div class="text-muted text-size-small">Open</div>
											 <h1  class="no-margin">  <?php echo number_format($count_aps_payment,2); ?></h1>
											<div class="text-muted text-size-small">Payment</div>
										</div>

										<h3 class="no-margin">Work Order</h3>
										<div class="text-muted text-size-small">Amount</div>
										<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
									</div>
									<div class="container-fluid">
										<div class="example">
											<div class="demo-section k-content wide">
										        <div id="chart_wo" class="boxexpense"></div>
										    </div>
										</div>
										<!--  -->
									</div>
								</div>
							</div>
					</div>
					



<div id="alertpc" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-primary-300">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Petty Cash</h5>
			</div>
			<div class="modal-body">
				<div id="dsspc"></div>
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close2"></i> Cancel</button>
				</div>
		</div>
	</div>
</div>


    <script>
        function expensechart() {
        	var url="<?php echo base_url(); ?>management/mange_json_all";
		      var dataSet={
		          projecid: "<?php echo $projeid; ?>",
		        };
		      $.post(url,dataSet,function(daa){
		      	var blogComments = daa;
		      	 $("#chart").kendoChart({
		                
		                legend: {
		                    position: "top"
		                },
		                seriesDefaults: {
		                    type: "column",
		                    labels: {
		                        visible: true,
		                        background: "transparent",
		                    }
		                },
		                dataSource: {
		                    data: blogComments
		                },
		                series: [{
		                    field: "pettycashi_unitprice",
		                    categoryField: "ac_code",
		                    color: "#26aadd",
							labels: {
								format: "{0:N0}"
							},
		                }],
		                valueAxis: {
		                    majorGridLines: {
		                        visible: true
		                    },
							labels: {
								format: "{0:N0}"
							},
		                    visible: true
		                },
		                categoryAxis: {
		                    majorGridLines: {
		                        visible: true
		                    },
		                    labels: {
								rotation: 0,
		                        font: "9px Arial,Helvetica,sans-serif",
		                    },
						    min: 0,
		                    max: 10
		                    
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
						// tooltip: {
						// 	visible: true,
						// 	shared: true,
						// 	format: "{0:c}"
						// },
						seriesClick: onSeriesClickPC,
		            });
		      });
        }
		// expensechart();
		function onSeriesClickPC(e) {
            console.log(kendo.format("Series click :: {0} ({1}): {2} ({3} {4}))",
			e.series.name, e.series.id, e.value, e.series.field, e.category));
			$('#alertpc').modal('show');
			$("#dsspc").html("<p>กำลังโหลดข้อมูล</p><div class='progress'><div class='progress-bar progress-bar-info progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'></div></div>");
			$("#dsspc").load('<?php echo base_url();?>management/load_dash_pc/'+e.category+'/<?php echo $projeid; ?>');
        }
        $(document).ready(expensechart);
        $(document).bind("kendo:skinChange", expensechart);
    </script>
<script>
        function createChart() {
			var data = [560, 630, 740, 910, 1170, 1380,100, 150, 100, 100, 300];
              var chartHeight = data.length * 50;
            $("#chart_line").css("height", chartHeight);
            $("#chart_line").kendoChart({
            	dataSource: {
                    transport: {
                        read: {
                            url: "<?php echo base_url(); ?>management/chart_sclove_test/<?php echo $projeid; ?>/<?php echo $projectcode;?>",
                            dataType: "json"
                        }
                    }
				},
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: "line",
                    style: "smooth"
                },
                series: [{
                    field: "priceconall",
                    categoryField: "month_yearall",
                    name: "Contact",
					color: "#00BCD4"
                },{
					field: "amount_submitsumall",
                    categoryField: "month_yearaprogall",
                    name: "Progress Submit" // progress_submit
                },{
					field: "inprogamountall",
                    categoryField: "month_yearinall",
                    name: "Invoice" // ar_account_header
                },{
					field: "cl_invamtamountall",
                    categoryField: "month_yearaclall",
                    name: "Income" // ar_clear
				},{
                    field: "priceebudall",
                    categoryField: "month_yearball",
                    name: "Budget",
					color: "#5c1cd5"
                },{
                    field: "poi_amountapll",
                    categoryField: "month_yearpapp",
                    name: "Purchase Cost"
                },{
                    field: "lo_amointapll",
                    categoryField: "month_yearwo",
                    name: "Work Order Cost"
                },{
					field: "apvamountall",
                    categoryField: "month_yearapall",
                    name: "Actual"
                }],
                valueAxis: {
                    line: {
                        visible: true
                    },
					labels: {
						format: "{0:N0}"
                    }
                },
                categoryAxis: {
                    labels: {
                        rotation: -90
                    },
                    crosshair: {
                        visible: true
                    }
                },
				tooltip: {
                    visible: true,
                    shared: true,
                    format: "{0:N0}"
                }
            });
        }
		createChart();
        // $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
</script>
<script>
        function ddd() {

				var url="<?php echo base_url(); ?>management/count_lo_open_all";
						      var dataSet={
						          projecid: "<?php echo $projeid; ?>",
						        };
						      $.post(url,dataSet,function(lodata){
						      	var lo = lodata;
						      	console.log(lo);
				  $("#chart_wo").kendoChart({
		               dataSource: {
		                    data: lo
		                },
		                seriesDefaults: {
		                    type: "column",
		                    labels: {
		                        visible: true,
		                        background: "transparent",
		                    },
		                    gap:2
		                },
		                 legend: {
		                    position: "top"
		                },
		                series: [{
		                	name:"Open",
		                    field: "contactamount",
		                    categoryField: "systemname",
		                    color: "#26aadd",
		                    id: "<?php echo $projeid ?>"
		                },{
		                	name: "Payment",
		                    field: "aps_amount",
		                    categoryField: "systemnameap",
		                    color: "#DD26B4",
		                    id: "<?php echo $projeid ?>"
		                }],
		                valueAxis: {
		                    majorGridLines: {
		                        visible: true
		                    },
		                    visible: true
		                },
		                categoryAxis: {
		                    majorGridLines: {
		                        visible: false
		                    },
		                    labels: {
		                        rotation: 10,
		                         font: "9px Arial,Helvetica,sans-serif"
		                    },
						    min: 0,
		                    max: 10

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
		                 tooltip: {
		                    visible: true,
		                    format: "{0:NO}",
		                    template: "#= series.name #: #= kendo.toString(value, 'n') #"
		                },
		                seriesClick: onSeriesClick,
		                axisLabelClick: onAxisLabelClick

		            });
		      	});
        }
 		function onSeriesClick(e) {
            console.log(kendo.format("Series click :: {0} ({1}): {2} ({3} {4}))",
                e.series.name, e.series.id, e.value, e.series.field, e.category));
            alert(e.category);
        }
         function onAxisLabelClick(e) {
            console.log(kendo.format("Axis label click :: {0} axis : {1}",
                e.axis.type, e.text));
        }
		ddd();
        // $(document).ready(ddd);
        $(document).bind("kendo:skinChange", ddd);
</script>