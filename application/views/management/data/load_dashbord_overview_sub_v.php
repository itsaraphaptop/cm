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
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-4">
								<div class="panel">
									<div class="panel-body">
											<h3 class="text-semibold no-margin"> <?php echo $pr_open; ?></h3>
											PR Open
											<div class="text-muted text-size-small">Orders</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="panel">
									<div class="panel-body">
										<h3 class="text-semibold no-margin"> <?php echo $pr_pending; ?></h3>
										PR Pending
										<div class="text-muted text-size-small">Orders</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="panel">
									<div class="panel-body">
										<h3 class="text-semibold no-margin"> <?php echo $pr_approve; ?></h3>
										PR Approve
										<div class="text-muted text-size-small">Orders</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<div class="row">
								<div class="col-md-6">
									<div class="panel">
										<div class="panel-body">
											<div class="heading-elements">
												<span class="heading-text badge bg-violet-800">+53,6%</span>
											</div>

											<h3 class="no-margin"> <?php echo $po_open; ?></h3>
											PO Open
											<div class="text-muted text-size-small">Orders</div>
											<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
										</div>
										<div class="container-fluid">
											<div id="chart_area_basic"></div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="panel">
										<div class="panel-body">
											<div class="heading-elements">
												<span class="heading-text badge bg-violet-800">+53,6%</span>
											</div>

											<h3 class="no-margin"> <?php echo $po_receive_orders; ?></h3>
											PO Recipt
											<div class="text-muted text-size-small">Orders</div>
											<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
										</div>
										<div class="container-fluid">
											<div id="chart_area_basic"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>






    <script>
        function expensechart() {
        	var url="<?php echo base_url(); ?>management/mange_json_sub";
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
		                        background: "transparent"
		                    }
		                },
		                dataSource: {
		                    data: blogComments
		                },
		                series: [{
		                    field: "pettycashi_unitprice",
		                    categoryField: "expens_name",
		                    color: "#26aadd"
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
		                        rotation: "auto"
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
		                }
		            });
		      });
        }
		expensechart();
        // $(document).ready(expensechart);
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
                    field: "priceconsub",
                    categoryField: "month_yearsub",
                    name: "Contact",
					color: "#00BCD4"
                },{
					field: "amount_submitsumsub",
                    categoryField: "month_yearaprogsub",
                    name: "Progress"
                },{
					field: "inprogamountsub",
                    categoryField: "month_yearinsub",
                    name: "Invoice"
                },{
					field: "cl_invamtamountsub",
                    categoryField: "month_yearaclsub",
                    name: "Income"
				},{
                    field: "priceebudsub",
                    categoryField: "month_yearbsub",
                    name: "Budget",
					color: "#5c1cd5"
                },{
                    field: "poi_amountsub",
                    categoryField: "month_yearpsub",
                    name: "Purchase Cost"
                },{
					field: "apvamountdub",
                    categoryField: "month_yearapsub",
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

				var url="<?php echo base_url(); ?>management/count_lo_open_sub";
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
		                        rotation: 0,
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