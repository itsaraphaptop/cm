<?php

	$tdn = 0;
	$tdn=$this->uri->segment(3);
?>
<?php $start=$this->uri->segment(5); ?>
<?php $stop=$this->uri->segment(6); ?>
<?php $type=$this->uri->segment(7); ?>
<?php
$this->db->select('*');
$this->db->from('bdtender_h');
$this->db->where('bd_tenid',$tdn);
$tender_h=$this->db->get()->result();
foreach ($tender_h as $key) {
$bd_type = $key->bd_type;
$bd_status = $key->bd_status;
$bd_pno = $key->bd_pno;
$bd_pname = $key->bd_pname;
$bd_date = $key->bd_date;
$bd_year = $key->bd_year;
$bd_month = $key->bd_month;
$bd_cus = $key->bd_cus;
$bd_cusn = $key->bd_cusn;
}
?>

<?php
if($type=="p"){
$this->db->select('*');
$this->db->from('project');
$this->db->where('bd_tenid',$tdn);
$project=$this->db->get()->result();
$project_code = "";
$projectid = 0;
$approve_user = "";
$approve_bg = "false";
$project_sub = "";
$substatus = "";
foreach ($project as $pjjbg) {
$project_code = $pjjbg->project_code;
$projectid = $pjjbg->project_id;
$approve_bg = $pjjbg->approve_bg;
$approve_user = $pjjbg->approve_user;
$project_sub = $pjjbg->project_sub;
$substatus = $pjjbg->project_substatus;
}
}else if($type=="d"){
$this->db->select('*');
$this->db->from('department');
$this->db->where('tender_no',$tdn);
$department=$this->db->get()->result();
foreach ($department as $d) {
	$department_code = $d->department_code;
	$department_title = $d->department_title;
}
}
?>
<!-- Main content  trans-->
<div class="content-wrapper">

    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading"></div>
            <div class="panel-body">

                <div class="">
                    <!-- <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
								<li class="active"><a href="#bordered-justified-tab1" data-toggle="tab">BOQ</a></li>
								<li><a href="#bordered-justified-tab2" id="tab2" data-toggle="tab">ADD BOQ</a></li>
								
					</ul> -->
                    <h1>โครงการ
                        <?php echo $bd_pname; ?>
                        <?php  $ref_heading; ?>
                        <?php  $ref_bd; ?>
                    </h1>
                    <br>
                    <div class="row">
                        <?php
									$this->db->select('*,SUM(totalamt) as total,SUM(totalamtboq) as totalboq');
									$this->db->where('boq_bd',$tdn);
									$this->db->where('subcostcode !=',"");
                                    $this->db->where('status','W');
                                    $this->db->where('heading_ref',$ref_heading);
                                    $this->db->group_by('subcostcode');
									$costmat = $this->db->get('boq_item')->result();
									$cost = 0;
									$boq = 0;
								?>
                        <?php foreach ($costmat as $cos){
								$cost = $cost + $cos->total;
								$boq = $boq + $cos->totalboq;
                                }


									$this->db->select('SUM(totalamt) as total,SUM(totalamtboq) as totalboq');
									$this->db->where('boq_bd',$tdn);
									// $this->db->where('subcostcode !=',"");
                                    $this->db->where('status','Y');
                                    $this->db->where('heading_ref',$ref_heading);
                                    $this->db->where('revise',$ref_bd);
                                    $this->db->group_by('subcostcode');
									$costmaty = $this->db->get('boq_item')->result();
									$costy = 0;
									$boqy = 0;
								?>
                        <?php foreach ($costmaty as $cos){
								$costy = $costy + $cos->total;
                                }
                                

                    
								?>
                        <div class="col-md-2">
                            <!-- <a href="<?php echo base_url(); ?>bd/add_boq/<?php echo $tdn;  ?>/<?php echo $projectid; ?>/p">
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <h3 class="text-semibold  no-margin text-center">
                                            Add BOQ
                                        </h3>
                                    </div>
                                </div>
                            </a> -->
                            <?php if($type=="p"){ ?>
                            <button type="button" class="btn btn-default btn-block btn-float btn-float-lg addboq">
                                <i class="icon-stack2"></i>
                                <span>Add BOQ</span>
                            </button>

                            <script>
                                $(".addboq").click(function(){
									window.location.href = "<?php echo base_url(); ?>bd/addnewboq/<?php echo $tdn;  ?>/<?php echo $projectid; ?>/<?php echo $type;?>";
									// window.location.href = "<?php echo base_url(); ?>bd/add_boq/<?php echo $tdn;  ?>/<?php echo $projectid; ?>/<?php echo $type;?>";
								});
							</script>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-xs-offset-4">
                            <div class="col-md-4">
                                <?php if($bd_status){ ?>
                                <div class="panel bg-green">
                                    <div class="panel-body">
                                        <h3 class="text-semibold no-margin">
                                            <?php echo strtoupper($bd_status); ?>
                                        </h3>
                                        <div class="text-muted text-size-small">Status</div>
                                        <div class="heading-elements">

                                        </div>
                                    </div>
                                </div>
                                <?php }else{?>
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <h3 class="text-semibold no-margin"> Tender</h3>
                                        <div class="text-muted text-size-small">Status</div>
                                        <div class="heading-elements">

                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <h3 class="text-semibold  no-margin">
                                            <?=number_format($cost, 2);?>
                                        </h3>
                                        <div class="text-muted  text-size-small"> Waiting Approve Budget</div>
                                        <div class="heading-elements">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel bg-success">
                                    <div class="panel-body">
                                        <h3 class="text-semibold no-margin">
                                            <?=number_format($costy, 2);?>
                                        </h3>
                                        <div class="text-muted text-size-small"> Approve Budget</div>
                                        <div class="heading-elements">

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="tab-content">

                    <div class="tab-pane has-padding active" id="bordered-justified-tab1">
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Tender No:</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb" id="tcalcoorb"
                                        value="<?php echo $tdn; ?>">
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Status :</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="<?php echo $bd_status; ?>" readonly="">
                                </div>
                            </div>
                            <?php if($type=="p"){ ?>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Project No :</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="<?php echo $project_code; ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Project Name :</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="<?php echo $bd_pname; ?>" readonly="">
                                </div>
                            </div>
                            <?php }else if($type=="d"){ ?>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Department No :</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="<?php echo $department_code; ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">Department Name :</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="<?php echo $department_title; ?>" readonly="">
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                        <!-- <br> -->
                        <div class="row">


                            <div class="col-xs-2">

                                <div class="input-group">
                                    <!-- <span class="input-group-addon">VAT :</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="Exclude VAT" readonly="">
                                </div>

                            </div>
                            <div class="col-xs-2">

                                <div class="input-group">
                                    <!-- <span class="input-group-addon">VAT (%):</span> -->
                                    <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb"
                                        value="7.00" readonly="">
                                </div>

                            </div>

                        </div>
                        <!-- <br> -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                        <!-- <br> -->
                        <div class="row">

                            <div class="col-xs-2">
                                <input class="form-control input-xs text-right" type="hidden" name="tcalcoorb" value=""
                                    readonly="">
                                <input class="form-control input-xs text-right" type="hidden" id="start" value="0"
                                    readonly="">
                                <input class="form-control input-xs text-right" type="hidden" id="stop" value="10"
                                    readonly="">
                            </div>
                        </div>
                        <!-- <br> -->
                        <!-- <br> -->
                        <!-- <div class="row"> -->
                        <!-- <div class="col-xs-4"> -->
                        <!-- <?php if($type=="p"){ ?>
                                <a href="<?php echo base_url(); ?>bd/add_boq/<?php echo $tdn;  ?>/<?php echo $projectid; ?>/p"
                                    class="btn btn-primary btn-xs">Add BOQ</a>
                                <?php }else if($type=="d"){ ?>
                                <a href="<?php echo base_url(); ?>bd/add_boq/<?php echo $tdn;  ?>/<?php echo $d->department_code; ?>/d"
                                    class="btn btn-primary btn-xs">Add BOQ</a>
                                <?php } ?> -->
                        <!-- <a class="btn btn-info btn-xs" href="<?php  $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=boq_export.mrt&boq=<?php echo $tdn; ?>" target="_blank">Export</a> -->



                        <!-- <a class="btn btn-danger btn-xs" id="job" bd="<?php echo $tdn; ?>" data-toggle="modal" data-target="#Job">View Job Code</a> -->

                        <!-- </div> -->

                        <!-- <div class="col-xs-8">
									<div style="float: right">
										<b style="font-size: 16px;">Budget Amount Total : </b><?=number_format($cost, 2);?>
										&nbsp;
										<b style="font-size: 16px;">BOQ Amount Total : </b><?=number_format($boq, 2);?>
									</div>
									
								</div> -->
                        <!-- </div> -->
                        <div class="row">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-component">
                                    <li class="active"><a href="#top-tabboq" data-toggle="tab">BOQ</a></li>
                                    <li><a href="#top-sumcost" data-toggle="tab" class="jobcost">Summary Budget Cost</a></li>
                                    <li><a href="#top-tab33" data-toggle="tab" class="summat">Summary Material</a></li>
                                    <li><a href="#top-tab44" data-toggle="tab" class="notsummat">NON BOQ</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane has-padding active" id="top-tabboq">
                                    <br>
                                        <div id="grid"></div>
                                    </div>
                                    <div class="tab-pane has-padding" id="top-sumcost">
                                    <br>
                                        <div id="jobsummary"></div>
                                        <br>
                                        <div id="sumgrid"></div>
                                    </div>
                                    <div class="tab-pane has-padding" id="top-tab33">
                                        <div class="showsummat"></div>
                                        
                                    </div>
                                    <div class="tab-pane has-padding" id="top-tab44">
                                        <div class="shownotboq"></div>
                                        
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                 
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<Style>
    .ob-right {
        text-align: right;
    }

    .ob-center {
        text-align: center;
    }
</Style>
<!-- <script src="<?php echo base_url();?>kendo/js/jszip.min.js"></script> -->
<script>
    var record = 0;

    function onChange(arg) {
        var selected = $.map(this.select(), function(item) {
            return $(item).text();
        });

        console.log("Selected: " + selected.length + " item(s), [" + selected + "]");
        // window.location.href = "<?php echo base_url(); ?>bd/boq_main/BD201807169/8/0/20/p";
    }

    function onDataBound(arg) {
        console.log("Grid data bound");
    }

    function onDataBinding(arg) {
        console.log("Grid data binding");
    }



        $("#grid").kendoGrid({

            dataSource: {
                dataType: "json",
                transport: {
                    read: "<?php echo base_url();?>bd/getboqi/<?php echo $bdtender;?>/<?php echo $ref_bd;?>"
                },
                schema: {
                    model: {
                        fields: {
                            boq_id: {
                                type: "string"
                            },
                            subcostcodename: {
                                type: "string"
                            },
                            subcostnamelabor:{
                                type: "string"
                            },
                            systemname: {
                                type: "string"
                            },
                            matcon: {
                                type: "string"
                            },
                            matnamelabor: {
                                type: "string"
                            },
                            unitname: {
                                type: "string"
                            },

                            qty_bg: {
                                type: "number"
                            },
                            matpricebg: {
                                type: "number"
                            },
                            matamtbg: {
                                type: "number"
                            },
                            labpricebg: {
                                type: "number"
                            },
                            labamtbg: {
                                type: "number"
                            },
                            totalamt: {
                                type: "number"
                            },
                            subpricebg: {
                                type: "number"
                            },
                            subamtbg: {
                                type: "number"
                            },

                            // qtyboq: {
                            //     type: "number"
                            // },
                            // matpriceboq: {
                            //     type: "number"
                            // },
                            // matamtboq: {
                            //     type: "number"
                            // },
                            // labpriceboq: {
                            //     type: "number"
                            // },
                            // labamtboq: {
                            //     type: "number"
                            // },
                            // totalamtboq: {
                            //     type: "number"
                            // },
                            // subpriceboq: {
                            //     type: "number"
                            // },
                            // subamtboq: {
                            //     type: "number"
                            // },
                        }
                    }
                },
                pageSize: 20,
                serverFiltering: false,
                serverSorting: false,
                aggregate: [{
                        field: "qty_bg",
                        aggregate: "sum"
                    },
                    {
                        field: "matpricebg",
                        aggregate: "sum"
                    },
                    {
                        field: "matamtbg",
                        aggregate: "sum"
                    },
                    {
                        field: "labpricebg",
                        aggregate: "sum"
                    },
                    {
                        field: "labamtbg",
                        aggregate: "sum"
                    },
                    {
                        field: "totalamt",
                        aggregate: "sum"
                    },
                    {
                        field: "subpricebg",
                        aggregate: "sum"
                    },
                    {
                        field: "subamtbg",
                        aggregate: "sum"
                    },

                    // {
                    //     field: "qtyboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "matpriceboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "matamtboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "labpriceboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "labamtboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "totalamtboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "subpriceboq",
                    //     aggregate: "sum"
                    // },
                    // {
                    //     field: "subamtboq",
                    //     aggregate: "sum"
                    // },
                ]
            },
            height: 550,
            filterable: true,
            resizable: true,
            sortable: true,
             pageable: {
                    alwaysVisible: true,
                    pageSizes: [5, 10, 20, 100,200]
                },

            columns: [{
                title: "#",
                template: "#= ++record #",
                width: 40,
                locked: true,
            }, {
                field: "systemname",
                title: "Job",
                filterable: {
                    multi: true,
                    search: true
                },
                width: 300,
                locked: true,
            }, {
                field: "subcostcodename",
                title: "Cost",
                width: 200,
                locked: true,
                filterable: {
                    multi: true,
                    search: true
                },
            }, {
                field: "subcostnamelabor",
                title: "Cost (Labor)",
                width: 200,
                locked: true,
                filterable: {
                    multi: true,
                    search: true
                },
            }, {
                field: "matcon",
                title: "Material",
                width: 300,
                filterable: {
                    multi: true,
                    search: true
                },
            }, {
                field: "matnamelabor",
                title: "Material (labor)",
                width: 300,
                filterable: {
                    multi: true,
                    search: true
                },
            }, {
                title: "Budget",
                columns: [{
                    field: "qty_bg",
                    title: "QTY",
                    filterable: false,
                    width: 100,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>",

                }, {
                    field: "matpricebg",
                    title: "Material Price",
                    filterable: false,
                    width: 100,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }, {
                    field: "matamtbg",
                    title: "Material Amt",
                    filterable: false,
                    width: 100,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }, {
                    field: "labpricebg",
                    title: "Laber Price",
                    filterable: false,
                    width: 100,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }, {
                    field: "labamtbg",
                    title: "Labor Amt",
                    filterable: false,
                    width: 100,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }, {
                    field: "subpricebg",
                    title: "SubContact Price",
                    filterable: false,
                    width: 120,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }, {
                    field: "subamtbg",
                    title: "SubContact Amt",
                    filterable: false,
                    width: 120,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }, {
                    field: "totalamt",
                    title: "Total",
                    filterable: false,
                    width: 100,
                    attributes: {
                        class: "ob-right"
                    },
                    format: "{0:n4}",
                    footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
                }]
            },
            //  {
            //     title: "BOQ",
            //     columns: [{
            //         field: "qtyboq",
            //         title: "QTY",
            //         filterable: false,
            //         width: 100,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "matpriceboq",
            //         title: "Material Price",
            //         filterable: false,
            //         width: 100,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "matamtboq",
            //         title: "Material Amt",
            //         filterable: false,
            //         width: 100,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "labpriceboq",
            //         title: "Laber Price",
            //         filterable: false,
            //         width: 100,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "labamtboq",
            //         title: "Labor Amt",
            //         filterable: false,
            //         width: 100,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "subpriceboq",
            //         title: "SubContact Price",
            //         filterable: false,
            //         width: 120,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "subamtboq",
            //         title: "SubContact Amt",
            //         filterable: false,
            //         width: 120,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }, {
            //         field: "totalamtboq",
            //         title: "Total",
            //         filterable: false,
            //         width: 120,
            //         attributes: {
            //             class: "ob-right"
            //         },
            //         format: "{0:n4}",
            //         footerTemplate: "<div style='text-align:right'>#= kendo.toString(sum, 'n4')#</div>"
            //     }
            //     ]
            // },
             {
                field: "unitname",
                title: "Unit",
                width: 100,
                attributes: {
                    class: "ob-center"
                },
            }],
            dataBinding: function() {
                record = (this.dataSource.page() - 1) * this.dataSource.pageSize();
            }

        });



    $(".jobcost").on('click',function(){
        $("#jobsummary").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $("#jobsummary").load('<?php echo base_url();?>bd/load_jobcost/<?php echo $tdn;?>/<?php echo $projectid;?>');
    });
    $(".summat").click(function(){
        $(".showsummat").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $(".showsummat").load('<?php echo base_url();?>bd/showsummatboq/<?php echo $tdn;?>/<?php echo $projectid;?>');
    });
    $(".notsummat").click(function(){
        $(".shownotboq").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
        $(".shownotboq").load('<?php echo base_url();?>bd/shownotboq/<?php echo $tdn;?>/<?php echo $projectid;?>');
    });
</script>