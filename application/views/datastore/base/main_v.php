<!DOCTYPE html>
<html lang="en">
<head>
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>

    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.common-bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>kendo/styles/kendo.default.mobile.min.css" />
    <script src="<?php echo base_url();?>kendo/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>kendo/js/jszip.min.js"></script>
    <script src="<?php echo base_url();?>kendo/js/kendo.all.min.js"></script>

    <title>Document</title>
</head>
<body>



<div class="container">
  <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ระบบจัดกำหนดสิทธิ์ผู้ใช้งาน</h1><hr>
<div class="row">
<div class="col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ระบบกำหนดสิทธ์ผู้ใช้</div>
            <div id="grid" style="font-size:11px;"></div>

            <script>

                // $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url(); ?>index.php",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/permission/read",
                                    dataType: "json"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/permission/Update",
                                    dataType: "json",
                                      type: "post"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/permission/Destroy",
                                    dataType: "json"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/permission/Create",
                                    dataType: "json"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "menu_id",

                                    fields: {
                                        uimg: { editable: false, nullable: true },
                                    	 m_name: { editable: false, nullable: true },
                                        m_user: { editable: false, nullable: true },
                                        m_office: { type: "boolean" },
                                        m_po: { type: "boolean" },
                                        m_ic: { type: "boolean" },
                                        m_ap: { type: "boolean" },
                                        m_ar: { type: "boolean" },
                                        m_pm: { type: "boolean" },
                                        m_hr: { type: "boolean" },
                                        m_st: { type: "boolean" },
                                        m_master: { type: "boolean" },
                                        pr_approve: { type: "boolean" },
                                        po_approve: { type: "boolean"},
                                        pettycash_approve: { type: "boolean"},
                                        pr_project_right: { type: "boolean"},
                                        user_right: { type: "boolean" }

                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                    	toolbar: ["excel","pdf"],
	                    excel: {
			                fileName: "User_right.xlsx",
			                proxyURL: crudServiceBaseUrl + "/permission/read",
			                filterable: false,
                      allPages: true
			            },
			             pdf: {
			                allPages: true,
			                fileName: "Kendo UI Grid Export.pdf",
			            },

                        dataSource: dataSource,
                         sortable: true,
                         resizable: true,
                        pageable: true,
                        height: 550,
                         filterable: {
                            extra: false,
                            operators: {
                                string: {
                                    contains: "Contains",
                                    startswith: "Starts with",
                                    eq: "Is equal to",
                                    neq: "Is not equal to"
                                }
                            }
                        },
                        // toolbar: ["create"],
                        columns: [
                            { field: "uimg",title:"",template: '<div class="customer-photo"><img  src="<?php echo base_url(); ?>profile/#= uimg#" class="img-responsive img-rounded" width="50%"></div>',width: "80px;"},
                        	{ field: "m_name",title:"ชื่อผู้ใช้",width: "200px"},
                            // { field: "m_user",title:"ชื่อผู้ใช้",width: "150px"},
                            { field: "m_office",title:"(OF)",template: '<div style="text-align:center;"><input type="checkbox" #= m_office ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            { field: "m_po", title:"(PO)", template: '<div style="text-align:center;"><input type="checkbox" #= m_po ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            { field: "m_ic", title:"(IC)", template: '<div style="text-align:center;"><input type="checkbox" #= m_ic ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            { field: "m_ap", title:"(AP)", template: '<div style="text-align:center;"><input type="checkbox" #= m_ap ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            { field: "m_ar", title:"(AR)", template: '<div style="text-align:center;"><input type="checkbox" #= m_ar ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px" },
                            { field: "m_pm", title:"(PM)", template: '<div style="text-align:center;"><input type="checkbox" #= m_pm ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            { field: "m_hr", title:"(HR)", template: '<div style="text-align:center;"><input type="checkbox" #= m_hr ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            // NEW***** SAFETY
                            { field: "m_st", title:"(ST)", template: '<div style="text-align:center;"><input type="checkbox" #= m_st ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "80px"},
                            // NEW****** SAFETY
                            { field: "m_master", title:"ระบบจัดการข้อมูล", template: '<div style="text-align:center;"><input type="checkbox" #= m_master ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "100px;"},
                            { field: "pr_approve", title:"( PR Approve)", template: '<div style="text-align:center;"><input type="checkbox" #= pr_approve ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "100px;"},
                            { field: "po_approve", title:"( PO Approve)", template: '<div style="text-align:center;"><input type="checkbox" #= po_approve ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "100px;"},
                            { field: "pettycash_approve", title:"( pettycash Approve)", template: '<div style="text-align:center;"><input type="checkbox" #= pettycash_approve ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "100px;"},
                            { field: "user_right", title:"( ระบบสิทธิ์)", template: '<div style="text-align:center;"><input type="checkbox" #= user_right ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "100px;"},
                            { field: "pr_project_right", title:"( PR Archive ALL)", template: '<div style="text-align:center;"><input type="checkbox" #= pr_project_right ? "checked=checked" : "" # disabled="disabled" ></input></div>',width: "100px;"},
                            { command: ["edit"], title: "&nbsp;", width: "200px" }],
                        editable: "inline"
                    });
                // });
            </script>
    </div>
</div>
</div>
</div>

</body>
</html>
