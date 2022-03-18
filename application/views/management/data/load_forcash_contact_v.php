<div class="container-fluid">
						<div class="row no-margin">
							<h3>Forcash Contact / Budget</h3>
						</div>
						
						<div class="row">
							<div class="col-md-5">
								<div id="grid"></div>
							</div>
						</div>

					</div>

<script>
    // $(document).ready(function(){
        var crudServiceBaseUrl = "<?php echo base_url();?>",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "management/contactforcash/<?php echo $projeid;?>",
                                    dataType: "json"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "management/contactforcashupdate",
                                    dataType: "json",
                                    type: "post"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "management/contactforcashDestroy",
                                    dataType: "json",
                                    type: 'post'
                                },
                                create: {
                                    url: crudServiceBaseUrl + "management/contactforcashCreate/<?php echo $projeid;?>/main",
                                    dataType: "json",
                                    type: "post"

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
                                    id: "id",
                                    fields: {
                                        id: { editable: false, nullable: true },
                                        project_id: { editable: false, nullable: true },
										month_year: {  type: "date", format: "MM/yyyy" },
										price: {   type: "number", validation: { required: true, min: 0}  ,defaultValue:0},
                                        budget: {   type: "number", validation: { required: true, min: 0} ,defaultValue:0}
                                    }
                                }
                            }, aggregate: [ { field: "price", aggregate: "sum" },
                                                { field: "budget", aggregate: "sum" }]
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        
                        pageable: false,
                        toolbar: [{ name: "create", text: "Add" }],
                        columns: [
                        { field: "month_year", title:"Month/Year",format: '{0:MM/yyyy}', width: "120px",footerTemplate: "Total" },
                            { field: "price", title:"Contact", width: "120px", aggregates: ["sum"],footerTemplate: "Sum: #: kendo.toString(sum, '\\#\\#,\\#') #",format: "{0:##,#}"},
                            { field: "budget", title:"Budget", format: "{0:n}", width: "120px", aggregates: ["sum"],footerTemplate: "Sum: #: kendo.toString(sum, '\\#\\#,\\#') #",format: "{0:##,#}" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "250px" }],
                        editable: {
						    createAt: 'bottom',
						    mode: "inline"
						},
                    });
       
				// </forcash contact>
    // });
</script>