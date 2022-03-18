<div class="content-wrapper">
    <div class="content">
        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-flat">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="active">
                            <a href="#bottom-tab1" data-toggle="tab" data-i18n="nav.dash_cc.overview">BOQ OVERVIEW </a>
                        </li>
                    </ul>

                    <div class="panel-body">
                        <div class="row row-condensed">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">รายการประกอบแบบ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg boq">
                                        <i class="icon-file-plus"></i>
                                        <span data-i18n="nav.dash_cc.boq">BOQ</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">อนุมัติงบประมาณ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg appr">
                                        <i class="icon-file-check2"></i>
                                        <span data-i18n="nav.dash_cc.apprbudget">Approve Budget</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">แก้ไขงบประมาณ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg revproj">
                                        <i class="icon-file-text2"></i>
                                        <span data-i18n="nav.dash_cc.revbudget">Revise Budget</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">ประกวดราคา</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg tendbit">
                                        <i class="icon-file-plus"></i>
                                        <span data-i18n="nav.dash_cc.tender">Tender</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">รายการประกวดราคา</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg arctend">
                                        <i class="icon-archive"></i>
                                        <span data-i18n="nav.dash_cc.archtender">Archive Tender</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <!-- <h4 class="no-margin text-semibold">อนุมัติแก้ไขงบประมาณ</h4> -->
                                    <button type="button" class="btn btn-default btn-block btn-float btn-float-lg apprrev">
                                        <i class="icon-file-check2"></i>
                                        <span data-i18n="nav.dash_cc.apprrevise">Approve Revise</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-flat">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-body panel-body-accent">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-files-empty icon-3x text-purple-400"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold">
                                                <?php echo $tdcount;?>
                                            </h1>
                                            <span class="text-uppercase text-size-mini text-muted">Tender รวมทั้งหมด</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-body panel-body-accent">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-stack-check icon-3x text-purple-400"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold">
                                                <?php echo $tdwin;?>
                                            </h1>
                                            <span class="text-uppercase text-size-mini text-muted">โครงการที่ประมูลสำเร็จ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-body panel-body-accent">
                                    <div class="media no-margin">
                                        <div class="media-left media-middle">
                                            <i class="icon-stack-up icon-3x text-purple-400"></i>
                                        </div>

                                        <div class="media-body text-right">
                                            <h1 class="no-margin text-semibold">
                                                <?php echo $tender;?>
                                            </h1>
                                            <span class="text-uppercase text-size-mini text-muted">โครงการที่ส่งประมูลทั้งหมด</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-body text-center">
                                    <h6 class="text-semibold no-margin-bottom mt-5">Project Control</h6>
                                    <div class="text-size-small text-muted content-group-sm"></div>

                                    <div class="svg-center" id="pie_arc_legend"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-body text-center">
                                    <h6 class="text-semibold no-margin-bottom mt-5">Project Control</h6>
                                    <div class="text-size-small text-muted content-group-sm"></div>

                                    <div class="svg-center" id="pie_bud_legend"></div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-body">
                                    <h6 class="text-semibold no-margin-bottom mt-5 text-center">Summary Budget Cost</h6>
                                    <div class="text-size-small text-muted content-group-sm"></div>
                                    <!-- <div class="svg-center" id="pie_basic"></div> -->
                                    <table class="table table-striped table-hover table-xxss basic">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Project</th>
                                                <th class="text-center">Budget</th>
                                                <th class="text-center">PO Open</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $n = 1; $bd =0; $boq=0; $po_amount=0; 
                                                
                                                foreach ($projectcost as $key => $value) {
                                                $this->db->select('sum(poi_amount) as po_amount');
                                                $this->db->from('po');
                                                $this->db->join('po_item','po_item.poi_ref = po.po_pono','left outer');
                                                $this->db->where('po_project',$value->project_id);
                                                $qq = $this->db->get()->result();
                                                
                                                
                                                ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $n;?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>bd/boq_main/<?php echo $value->bd_tenid;?>/<?php echo $value->project_id;?>/0/20/p"><?php echo $value->bd_pname;?></a>
                                                </td>
                                                <td class="text-right">
                                                
                                                    <?php
                                                        if ($value->status=='Y') {
                                                            # code...
                                                            echo number_format($value->totalbudget,4);
                                                        }else{
                                                            echo "0.0000";
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php foreach ($qq as $key => $vv) {
                                                         echo number_format($vv->po_amount,4);
                                                     } ?>
                                                        <!-- <?php echo number_format($value->totalboq,4);?> -->
                                                </td>
                                            </tr>
                                            <?php $n++; $bd=$bd+$value->totalbudget; $boq=$boq+$value->totalboq; $po_amount=$po_amount+$vv->po_amount; }  ?>
                                            <!-- <tr>
                                                <td class="text-center" colspan="2">Summary</td>
                                                <td class="text-right">
                                                    <?php echo number_format($bd,4);?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo number_format($po_amount,4);?>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
 <script>
  $.extend( $.fn.dataTable.defaults, {
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 0 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });
    $('.basic').DataTable();
 </script>

<script>
    $('.boq').click(function() {
        window.location.href = "<?php echo base_url();?>bd/boq_openProject";
    });
    $('.appr').click(function() {
        window.location.href = "<?php echo base_url();?>bd/setup_boq";
    });
    $('.revproj').click(function() {
        window.location.href = "<?php echo base_url();?>management/ViewReviseProjectBudget";
    });
    $('.tendbit').click(function() {
        window.location.href = "<?php echo base_url();?>bd/bd_tender";
    });
    $('.arctend').click(function() {
        window.location.href = "<?php echo base_url();?>bd/view_boqall";
    });
    $('.apprrev').click(function() {
        window.location.href = "<?php echo base_url();?>bd/setup_boq_revise";
    });


    // Initialize chart
    pieArcWithLegend("#pie_arc_legend", 170);
    pieArcWithLegendbud("#pie_bud_legend", 170);
    donutWithDetails("#pie_basic", 173);
    // Chart setup
    function pieArcWithLegend(element, size) {


        // Basic setup
        // ------------------------------
        var url = "<?php echo base_url(); ?>bd/getcountcontrol";
        var datasource = {
            td: "td"
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
                .attr("height", size / 2)
                .append("g")
                .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");



            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
                .sort(null)
                .startAngle(-Math.PI / 2)
                .endAngle(Math.PI / 2)
                .value(function(d) {
                    return d.value;
                });

            // Arc
            var arc = d3.svg.arc()
                .outerRadius(radius)
                .innerRadius(radius / 1.3);



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
            // Interactions
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
            // Append total text
            //

            svg.append('text')
                .attr('class', 'text-muted')
                .attr({
                    'class': 'half-donut-total',
                    'text-anchor': 'middle',
                    'dy': -33
                })
                .style({
                    'font-size': '12px',
                    'fill': '#999'
                })
                .text('Total');


            //
            // Append count
            //

            // Text
            svg
                .append('text')
                .attr('class', 'half-conut-count')
                .attr('text-anchor', 'middle')
                .attr('dy', -5)
                .style({
                    'font-size': '21px',
                    'font-weight': 500
                });

            // Animation
            svg.select('.half-conut-count')
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
            // Legend
            //

            // Add legend list
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

            // Legend text
            legend.append('span')
                .text(function(d, i) {
                    return d.data.value;
                });
        });
    }

    function pieArcWithLegendbud(element, size) {


        // Basic setup
        // ------------------------------
        var url = "<?php echo base_url(); ?>bd/getcontrolall";
        var datasource = {
            td: "td"
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
                .attr("height", size / 2)
                .append("g")
                .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");



            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
                .sort(null)
                .startAngle(-Math.PI / 2)
                .endAngle(Math.PI / 2)
                .value(function(d) {
                    return d.value;
                });

            // Arc
            var arc = d3.svg.arc()
                .outerRadius(radius)
                .innerRadius(radius / 1.3);



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
            // Interactions
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
            // Append total text
            //

            svg.append('text')
                .attr('class', 'text-muted')
                .attr({
                    'class': 'half-donut-total',
                    'text-anchor': 'middle',
                    'dy': -33
                })
                .style({
                    'font-size': '12px',
                    'fill': '#999'
                })
                .text('Total');


            //
            // Append count
            //

            // Text
            svg
                .append('text')
                .attr('class', 'half-conut-count')
                .attr('text-anchor', 'middle')
                .attr('dy', -5)
                .style({
                    'font-size': '21px',
                    'font-weight': 500
                });

            // Animation
            svg.select('.half-conut-count')
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
            // Legend
            //

            // Add legend list
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

            // Legend text
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
        var url = "<?php echo base_url(); ?>office/getpcdonut";
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