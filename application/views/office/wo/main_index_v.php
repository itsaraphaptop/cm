<style>
.custombadge {
    position: absolute;
    right: -10px;
    top: -2px;
}
</style>
<div class="content-wrapper">
    <div class="content">
        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-flat">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="active">
                            <a href="#bottom-tab1" data-toggle="tab">WO OVERVIEW </a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <div class="row row-condensed">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">หนังสือสังจ้าง</h4> -->
                                    <button type="button"
                                        class="btn btn-default btn-block btn-float btn-float-lg newwo">
                                        <i class="icon-file-plus"></i>
                                        <span>New WO</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">อนุมัติหนังสือสั่งจ้าง</h4> -->
                                    <button type="button"
                                        class="btn btn-default btn-block btn-float btn-float-lg apprwo">
                                        <i class="icon-file-check2"></i>
                                        <span>Approve WO</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">เอกสารหนังสือสั่งจ้าง</h4> -->
                                    <button type="button"
                                        class="btn btn-default btn-block btn-float btn-float-lg archwo">
                                        <i class="icon-archive"></i>
                                        <span>WO Archive</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">รายงาน</h4> -->
                                    <button type="button"
                                        class="btn btn-default btn-block btn-float btn-float-lg report">
                                        <i class="icon-file-stats"></i>
                                        <span>Report</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            $(".newwo").click(function() {
                window.location.href = "<?php echo base_url();?>contract/newcontract";
            });
            $(".apprwo").click(function() {
                window.location.href = "<?php echo base_url();?>contract/newapprovecontract";
            });
            $(".archwo").click(function() {
                window.location.href = "<?php echo base_url();?>contract/openproject";
            });
            $(".report").click(function() {
                window.location.href = "<?php echo base_url();?>purchase_report";
            });
            </script>
            <div class="col-md-8">
                <div class="panel panel-flat">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-body panel-body-accent">
                                            <div class="media no-margin">
                                                <div class="media-left media-middle">
                                                    <i class="icon-file-spreadsheet icon-3x text-primary-400"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h1 class="no-margin text-semibold">
                                                        <!-- <?=number_format($po_count['wonow']);?> -->
                                                    </h1>
                                                    <span class="text-uppercase text-size-mini text-muted">WO
                                                        ใหม่วันนี้</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel has-bg-image">
                                            <div class="panel-body">
                                                <h1 class="no-margin text-semibold">
                                                    <!-- <?= number_format($po_count['lothismonth']);?> -->
                                                </h1>
                                                WO ทั้งหมดในเดือน
                                                <!-- <?php echo date('F Y',now());?> -->
                                                <div class="text-muted text-size-small">28 avg</div>
                                            </div>


                                            <div id="line_chart_color">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-body text-center">
                                    <h6 class="text-semibold no-margin-bottom mt-5">All Summary Work Order</h6>
                                    <div class="text-size-small text-muted content-group-sm"></div>
                                    <div class="svg-center" id="donut_basic_details">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
// Simple line chart
// ------------------------------

// Initialize chart
lineChartWidget('#line_chart_simple', 50, '#2196F3', 'rgba(33,150,243,0.5)', '#2196F3', '#fff');
lineChartWidgetwo('#line_chart_color', 50, 'rgb(102, 187, 106)', 'rgb(102, 187, 106)', 'rgb(102, 187, 106)',
    '#fff');
donutWithDetails("#donut_basic_details", 173);
animatedPieWithLegend("#pie_basic_legend", 120);
// pr line Chart 
function lineChartWidget(element, chartHeight, lineColor, pathColor, pointerLineColor, pointerBgColor) {


    // Basic setup
    // ------------------------------
    var url = "<?php echo base_url(); ?>purchase/getpomonth";
    var datasource = {
        pr: "pr"
    };
    $.post(url, datasource, function(data) {
        console.log(data);
        var dataset = data;
        // });
        // // Add data set
        // var dataset = datas;
        // var dataset = [{
        // 	"date": "04/13/14",
        // 	"alpha": "55"
        // }, {
        // 	"date": "04/14/14",
        // 	"alpha": "35"
        // }, {
        // 	"date": "04/15/14",
        // 	"alpha": "65"
        // }, {
        // 	"date": "04/16/14",
        // 	"alpha": "50"
        // }, {
        // 	"date": "04/17/14",
        // 	"alpha": "65"
        // }, {
        // 	"date": "04/18/14",
        // 	"alpha": "20"
        // }, {
        // 	"date": "04/19/14",
        // 	"alpha": "60"
        // }];
        // Main variables
        var d3Container = d3.select(element),
            margin = {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
            height = chartHeight - margin.top - margin.bottom,
            padding = 20;

        // Format date
        var parseDate = d3.time.format("%m/%d/%y").parse,
            formatDate = d3.time.format("%a, %B %e");


        // Add tooltip
        // ------------------------------

        var tooltip = d3.tip()
            .attr('class', 'd3-tip')
            .html(function(d) {
                return "<ul class='list-unstyled mb-5'>" +
                    "<li>" +
                    "<div class='text-size-base mt-5 mb-5'><i class='icon-check2 position-left'></i>" +
                    formatDate(d.date) +
                    "</div>" + "</li>" +
                    "<li>" + "Count: &nbsp;" + "<span class='text-semibold pull-right'>" + d.alpha +
                    "</span>" + "</li>" +
                    // "<li>" + "Revenue: &nbsp; " + "<span class='text-semibold pull-right'>" + "$" + (d.alpha * 25).toFixed(2) +
                    "</span>" + "</li>" +
                    "</ul>";
            });


        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append('svg');

        // Add SVG group
        var svg = container
            .attr('width', width + margin.left + margin.right)
            .attr('height', height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
            .call(tooltip);


        // Load data
        // ------------------------------

        dataset.forEach(function(d) {
            d.date = parseDate(d.date);
            d.alpha = +d.alpha;
        });


        // Construct scales
        // ------------------------------

        // Horizontal
        var x = d3.time.scale()
            .range([padding, width - padding]);

        // Vertical
        var y = d3.scale.linear()
            .range([height, 5]);


        // Set input domains
        // ------------------------------

        // Horizontal
        x.domain(d3.extent(dataset, function(d) {
            return d.date;
        }));

        // Vertical
        y.domain([0, d3.max(dataset, function(d) {
            return Math.max(d.alpha);
        })]);


        // Construct chart layout
        // ------------------------------

        // Line
        var line = d3.svg.line()
            .x(function(d) {
                return x(d.date);
            })
            .y(function(d) {
                return y(d.alpha);
            });


        //
        // Append chart elements
        //

        // Add mask for animation
        // ------------------------------

        // Add clip path
        var clip = svg.append("defs")
            .append("clipPath")
            .attr("id", "clip-line-small");

        // Add clip shape
        var clipRect = clip.append("rect")
            .attr('class', 'clip')
            .attr("width", 0)
            .attr("height", height);

        // Animate mask
        clipRect
            .transition()
            .duration(1000)
            .ease('linear')
            .attr("width", width);


        // Line
        // ------------------------------

        // Path
        var path = svg.append('path')
            .attr({
                'd': line(dataset),
                "clip-path": "url(#clip-line-small)",
                'class': 'd3-line d3-line-medium'
            })
            .style('stroke', lineColor);

        // Animate path
        svg.select('.line-tickets')
            .transition()
            .duration(1000)
            .ease('linear');


        // Add vertical guide lines
        // ------------------------------

        // Bind data
        var guide = svg.append('g')
            .selectAll('.d3-line-guides-group')
            .data(dataset);

        // Append lines
        guide
            .enter()
            .append('line')
            .attr('class', 'd3-line-guides')
            .attr('x1', function(d, i) {
                return x(d.date);
            })
            .attr('y1', function(d, i) {
                return height;
            })
            .attr('x2', function(d, i) {
                return x(d.date);
            })
            .attr('y2', function(d, i) {
                return height;
            })
            .style('stroke', pathColor)
            .style('stroke-dasharray', '4,2')
            .style('shape-rendering', 'crispEdges');

        // Animate guide lines
        guide
            .transition()
            .duration(1000)
            .delay(function(d, i) {
                return i * 150;
            })
            .attr('y2', function(d, i) {
                return y(d.alpha);
            });


        // Alpha app points
        // ------------------------------

        // Add points
        var points = svg.insert('g')
            .selectAll('.d3-line-circle')
            .data(dataset)
            .enter()
            .append('circle')
            .attr('class', 'd3-line-circle d3-line-circle-medium')
            .attr("cx", line.x())
            .attr("cy", line.y())
            .attr("r", 3)
            .style({
                'stroke': pointerLineColor,
                'fill': pointerBgColor
            });

        // Animate points on page load
        points
            .style('opacity', 0)
            .transition()
            .duration(250)
            .ease('linear')
            .delay(1000)
            .style('opacity', 1);

        // Add user interaction
        points
            .on("mouseover", function(d) {
                tooltip.offset([-10, 0]).show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })

            // Hide tooltip
            .on("mouseout", function(d) {
                tooltip.hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });

        // Change tooltip direction of first point
        d3.select(points[0][0])
            .on("mouseover", function(d) {
                tooltip.offset([0, 10]).direction('e').show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })
            .on("mouseout", function(d) {
                tooltip.direction('n').hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });

        // Change tooltip direction of last point
        d3.select(points[0][points.size() - 1])
            .on("mouseover", function(d) {
                tooltip.offset([0, -10]).direction('w').show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })
            .on("mouseout", function(d) {
                tooltip.direction('n').hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });



    });
}
// pc line Chart 
function lineChartWidgetwo(element, chartHeight, lineColor, pathColor, pointerLineColor, pointerBgColor) {


    // Basic setup
    // ------------------------------
    var url = "<?php echo base_url(); ?>purchase/getwomonth";
    var datasource = {
        pr: "pr"
    };
    $.post(url, datasource, function(data) {
        console.log(data);
        var dataset = data;
        // });
        // // Add data set
        // var dataset = datas;
        // var dataset = [{
        // 	"date": "04/13/14",
        // 	"alpha": "55"
        // }, {
        // 	"date": "04/14/14",
        // 	"alpha": "35"
        // }, {
        // 	"date": "04/15/14",
        // 	"alpha": "65"
        // }, {
        // 	"date": "04/16/14",
        // 	"alpha": "50"
        // }, {
        // 	"date": "04/17/14",
        // 	"alpha": "65"
        // }, {
        // 	"date": "04/18/14",
        // 	"alpha": "20"
        // }, {
        // 	"date": "04/19/14",
        // 	"alpha": "60"
        // }];
        // Main variables
        var d3Container = d3.select(element),
            margin = {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
            height = chartHeight - margin.top - margin.bottom,
            padding = 20;

        // Format date
        var parseDate = d3.time.format("%m/%d/%y").parse,
            formatDate = d3.time.format("%a, %B %e");


        // Add tooltip
        // ------------------------------

        var tooltip = d3.tip()
            .attr('class', 'd3-tip')
            .html(function(d) {
                return "<ul class='list-unstyled mb-5'>" +
                    "<li>" +
                    "<div class='text-size-base mt-5 mb-5'><i class='icon-check2 position-left'></i>" +
                    formatDate(d.date) +
                    "</div>" + "</li>" +
                    "<li>" + "Count: &nbsp;" + "<span class='text-semibold pull-right'>" + d.alpha +
                    "</span>" + "</li>" +
                    // "<li>" + "Revenue: &nbsp; " + "<span class='text-semibold pull-right'>" + "$" + (d.alpha * 25).toFixed(2) +
                    "</span>" + "</li>" +
                    "</ul>";
            });


        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append('svg');

        // Add SVG group
        var svg = container
            .attr('width', width + margin.left + margin.right)
            .attr('height', height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
            .call(tooltip);


        // Load data
        // ------------------------------

        dataset.forEach(function(d) {
            d.date = parseDate(d.date);
            d.alpha = +d.alpha;
        });


        // Construct scales
        // ------------------------------

        // Horizontal
        var x = d3.time.scale()
            .range([padding, width - padding]);

        // Vertical
        var y = d3.scale.linear()
            .range([height, 5]);


        // Set input domains
        // ------------------------------

        // Horizontal
        x.domain(d3.extent(dataset, function(d) {
            return d.date;
        }));

        // Vertical
        y.domain([0, d3.max(dataset, function(d) {
            return Math.max(d.alpha);
        })]);


        // Construct chart layout
        // ------------------------------

        // Line
        var line = d3.svg.line()
            .x(function(d) {
                return x(d.date);
            })
            .y(function(d) {
                return y(d.alpha);
            });


        //
        // Append chart elements
        //

        // Add mask for animation
        // ------------------------------

        // Add clip path
        var clip = svg.append("defs")
            .append("clipPath")
            .attr("id", "clip-line-small");

        // Add clip shape
        var clipRect = clip.append("rect")
            .attr('class', 'clip')
            .attr("width", 0)
            .attr("height", height);

        // Animate mask
        clipRect
            .transition()
            .duration(1000)
            .ease('linear')
            .attr("width", width);


        // Line
        // ------------------------------

        // Path
        var path = svg.append('path')
            .attr({
                'd': line(dataset),
                "clip-path": "url(#clip-line-small)",
                'class': 'd3-line d3-line-medium'
            })
            .style('stroke', lineColor);

        // Animate path
        svg.select('.line-tickets')
            .transition()
            .duration(1000)
            .ease('linear');


        // Add vertical guide lines
        // ------------------------------

        // Bind data
        var guide = svg.append('g')
            .selectAll('.d3-line-guides-group')
            .data(dataset);

        // Append lines
        guide
            .enter()
            .append('line')
            .attr('class', 'd3-line-guides')
            .attr('x1', function(d, i) {
                return x(d.date);
            })
            .attr('y1', function(d, i) {
                return height;
            })
            .attr('x2', function(d, i) {
                return x(d.date);
            })
            .attr('y2', function(d, i) {
                return height;
            })
            .style('stroke', pathColor)
            .style('stroke-dasharray', '4,2')
            .style('shape-rendering', 'crispEdges');

        // Animate guide lines
        guide
            .transition()
            .duration(1000)
            .delay(function(d, i) {
                return i * 150;
            })
            .attr('y2', function(d, i) {
                return y(d.alpha);
            });


        // Alpha app points
        // ------------------------------

        // Add points
        var points = svg.insert('g')
            .selectAll('.d3-line-circle')
            .data(dataset)
            .enter()
            .append('circle')
            .attr('class', 'd3-line-circle d3-line-circle-medium')
            .attr("cx", line.x())
            .attr("cy", line.y())
            .attr("r", 3)
            .style({
                'stroke': pointerLineColor,
                'fill': pointerBgColor
            });

        // Animate points on page load
        points
            .style('opacity', 0)
            .transition()
            .duration(250)
            .ease('linear')
            .delay(1000)
            .style('opacity', 1);

        // Add user interaction
        points
            .on("mouseover", function(d) {
                tooltip.offset([-10, 0]).show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })

            // Hide tooltip
            .on("mouseout", function(d) {
                tooltip.hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });

        // Change tooltip direction of first point
        d3.select(points[0][0])
            .on("mouseover", function(d) {
                tooltip.offset([0, 10]).direction('e').show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })
            .on("mouseout", function(d) {
                tooltip.direction('n').hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });

        // Change tooltip direction of last point
        d3.select(points[0][points.size() - 1])
            .on("mouseover", function(d) {
                tooltip.offset([0, -10]).direction('w').show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })
            .on("mouseout", function(d) {
                tooltip.direction('n').hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });



    });
}

//pr donut Chart
function animatedPieWithLegend(element, size) {

    // Add data set
    var url = "<?php echo base_url(); ?>purchase/getpoonut";
    var datasource = {
        pr: "pr"
    };
    $.post(url, datasource, function(data) {
        console.log(data);
        var data = data;

        // var data = [{
        // 	"status": "New",
        // 	"value": 578,
        // 	"color": "#29B6F6"
        // }, {
        // 	"status": "Pending",
        // 	"value": 983,
        // 	"color": "#66BB6A"
        // }, {
        // 	"status": "Shipped",
        // 	"value": 459,
        // 	"color": "#EF5350"
        // }];

        // Main variables
        var d3Container = d3.select(element),
            distance = 2, // reserve 2px space for mouseover arc moving
            radius = (size / 2) - distance,
            sum = d3.sum(data, function(d) {
                return d.value;
            });


        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append("svg");

        // Add SVG group
        var svg = container
            .attr("width", size)
            .attr("height", size)
            .append("g")
            .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");


        // Construct chart layout
        // ------------------------------

        // Pie
        var pie = d3.layout.pie()
            .sort(null)
            .startAngle(Math.PI)
            .endAngle(3 * Math.PI)
            .value(function(d) {
                return d.value;
            });

        // Arc
        var arc = d3.svg.arc()
            .outerRadius(radius);


        //
        // Append chart elements
        //

        // Group chart elements
        var arcGroup = svg.selectAll(".d3-arc")
            .data(pie(data))
            .enter()
            .append("g")
            .attr("class", "d3-arc")
            .style({
                'stroke': '#fff',
                'stroke-width': 2,
                'cursor': 'pointer'
            });

        // Append path
        var arcPath = arcGroup
            .append("path")
            .style("fill", function(d) {
                return d.data.color;
            });


        // Add interactions
        arcPath
            .on('mouseover', function(d, i) {

                // Transition on mouseover
                d3.select(this)
                    .transition()
                    .duration(500)
                    .ease('elastic')
                    .attr('transform', function(d) {
                        d.midAngle = ((d.endAngle - d.startAngle) / 2) + d.startAngle;
                        var x = Math.sin(d.midAngle) * distance;
                        var y = -Math.cos(d.midAngle) * distance;
                        return 'translate(' + x + ',' + y + ')';
                    });

                // Animate legend
                $(element + ' [data-slice]').css({
                    'opacity': 0.3,
                    'transition': 'all ease-in-out 0.15s'
                });
                $(element + ' [data-slice=' + i + ']').css({
                    'opacity': 1
                });
            })
            .on('mouseout', function(d, i) {

                // Mouseout transition
                d3.select(this)
                    .transition()
                    .duration(500)
                    .ease('bounce')
                    .attr('transform', 'translate(0,0)');

                // Revert legend animation
                $(element + ' [data-slice]').css('opacity', 1);
            });

        // Animate chart on load
        arcPath
            .transition()
            .delay(function(d, i) {
                return i * 500;
            })
            .duration(500)
            .attrTween("d", function(d) {
                var interpolate = d3.interpolate(d.startAngle, d.endAngle);
                return function(t) {
                    d.endAngle = interpolate(t);
                    return arc(d);
                };
            });


        //
        // Append counter
        //

        // Append element
        d3Container
            .append('h2')
            .attr('class', 'mt-15 mb-5 text-semibold');

        // Animate counter
        d3Container.select('h2')
            .transition()
            .duration(1500)
            .tween("text", function(d) {
                var i = d3.interpolate(this.textContent, sum);

                return function(t) {
                    this.textContent = d3.format(",d")(Math.round(i(t)));
                };
            });


        //
        // Append legend
        //

        // Add element
        var legend = d3.select(element)
            .append('ul')
            .attr('class', 'chart-widget-legend')
            .selectAll('li').data(pie(data))
            .enter().append('li')
            .attr('data-slice', function(d, i) {
                return i;
            })
            .attr('style', function(d, i) {
                return 'border-bottom: 2px solid ' + d.data.color;
            })
            .text(function(d, i) {
                return d.data.status + ': ';
            });

        // Add value
        legend.append('span')
            .text(function(d, i) {
                return d.data.value;
            });
    });
}

// Chart setup
function donutWithDetails(element, size) {


    // Basic setup
    // ------------------------------
    var url = "<?php echo base_url(); ?>purchase/getwodonut";
    var datasource = {
        pr: "pr"
    };
    $.post(url, datasource, function(data) {
        console.log(data);
        var data = data;
        // Add data set
        // var data = [{
        // 	"status": "Pending",
        // 	"icon": "<i class='status-mark border-blue-300 position-left'></i>",
        // 	"value": 720,
        // 	"color": "#29B6F6"
        // }, {
        // 	"status": "Resolved",
        // 	"icon": "<i class='status-mark border-success-300 position-left'></i>",
        // 	"value": 990,
        // 	"color": "#66BB6A"
        // }, {
        // 	"status": "Closed",
        // 	"icon": "<i class='status-mark border-danger-300 position-left'></i>",
        // 	"value": 720,
        // 	"color": "#EF5350"
        // }];

        // Main variables
        var d3Container = d3.select(element),
            distance = 2, // reserve 2px space for mouseover arc moving
            radius = (size / 2) - distance,
            sum = d3.sum(data, function(d) {
                return d.value;
            });


        // Tooltip
        // ------------------------------

        var tip = d3.tip()
            .attr('class', 'd3-tip')
            .offset([-10, 0])
            .direction('e')
            .html(function(d) {
                return "<ul class='list-unstyled mb-5'>" +
                    "<li>" + "<div class='text-size-base mb-5 mt-5'>" + d.data.icon + d.data.status +
                    "</div>" + "</li>" +
                    "<li>" + "Total: &nbsp;" + "<span class='text-semibold pull-right'>" + d.value +
                    "</span>" + "</li>" +
                    "<li>" + "Share: &nbsp;" + "<span class='text-semibold pull-right'>" + (100 / (sum /
                        d.value)).toFixed(2) +
                    "%" +
                    "</span>" + "</li>" +
                    "</ul>";
            });


        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append("svg").call(tip);

        // Add SVG group
        var svg = container
            .attr("width", size)
            .attr("height", size)
            .append("g")
            .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");


        // Construct chart layout
        // ------------------------------

        // Pie
        var pie = d3.layout.pie()
            .sort(null)
            .startAngle(Math.PI)
            .endAngle(3 * Math.PI)
            .value(function(d) {
                return d.value;
            });

        // Arc
        var arc = d3.svg.arc()
            .outerRadius(radius)
            .innerRadius(radius / 1.35);


        //
        // Append chart elements
        //

        // Group chart elements
        var arcGroup = svg.selectAll(".d3-arc")
            .data(pie(data))
            .enter()
            .append("g")
            .attr("class", "d3-arc")
            .style({
                'stroke': '#fff',
                'stroke-width': 2,
                'cursor': 'pointer'
            });

        // Append path
        var arcPath = arcGroup
            .append("path")
            .style("fill", function(d) {
                return d.data.color;
            });


        //
        // Add interactions
        //

        // Mouse
        arcPath
            .on('mouseover', function(d, i) {

                // Transition on mouseover
                d3.select(this)
                    .transition()
                    .duration(500)
                    .ease('elastic')
                    .attr('transform', function(d) {
                        d.midAngle = ((d.endAngle - d.startAngle) / 2) + d.startAngle;
                        var x = Math.sin(d.midAngle) * distance;
                        var y = -Math.cos(d.midAngle) * distance;
                        return 'translate(' + x + ',' + y + ')';
                    });

                $(element + ' [data-slice]').css({
                    'opacity': 0.3,
                    'transition': 'all ease-in-out 0.15s'
                });
                $(element + ' [data-slice=' + i + ']').css({
                    'opacity': 1
                });
            })
            .on('mouseout', function(d, i) {

                // Mouseout transition
                d3.select(this)
                    .transition()
                    .duration(500)
                    .ease('bounce')
                    .attr('transform', 'translate(0,0)');

                $(element + ' [data-slice]').css('opacity', 1);
            });

        // Animate chart on load
        arcPath
            .transition()
            .delay(function(d, i) {
                return i * 500;
            })
            .duration(500)
            .attrTween("d", function(d) {
                var interpolate = d3.interpolate(d.startAngle, d.endAngle);
                return function(t) {
                    d.endAngle = interpolate(t);
                    return arc(d);
                };
            });


        //
        // Add text
        //

        // Total
        svg.append('text')
            .attr('class', 'text-muted')
            .attr({
                'class': 'half-donut-total',
                'text-anchor': 'middle',
                'dy': -13
            })
            .style({
                'font-size': '12px',
                'fill': '#999'
            })
            .text('Total');

        // Count
        svg
            .append('text')
            .attr('class', 'half-donut-count')
            .attr('text-anchor', 'middle')
            .attr('dy', 14)
            .style({
                'font-size': '21px',
                'font-weight': 500
            });

        // Animate count
        svg.select('.half-donut-count')
            .transition()
            .duration(1500)
            .ease('linear')
            .tween("text", function(d) {
                var i = d3.interpolate(this.textContent, sum);

                return function(t) {
                    this.textContent = d3.format(",d")(Math.round(i(t)));
                };
            });


        //
        // Add legend
        //

        // Append list
        var legend = d3.select(element)
            .append('ul')
            .attr('class', 'chart-widget-legend')
            .selectAll('li')
            .data(pie(data))
            .enter()
            .append('li')
            .attr('data-slice', function(d, i) {
                return i;
            })
            .attr('style', function(d, i) {
                return 'border-bottom: solid 2px ' + d.data.color;
            })
            .text(function(d, i) {
                return d.data.status + ': ';
            });

        // Append text
        legend.append('span')
            .text(function(d, i) {
                return d.data.value;
            });
    });
}
</script>