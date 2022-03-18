<div class="container-fluid">
						<div class="row no-margin">
							<h3>Forcash Budget</h3>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div id="gridbudget"></div>
							</div>
						</div>

					</div>


<script>
// $(document).ready(function () {
				// <forcash budget>
				 var crudbudgetBaseUrl = "<?php echo base_url();?>",
                        dataSourcebudget = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudbudgetBaseUrl + "management/budgetforcash/<?php echo $projeid;?>",
                                    dataType: "json"
                                },
                                update: {
                                    url: crudbudgetBaseUrl + "management/budgetforcashupdate",
                                    dataType: "json",
                                    type: "post"
                                },
                                destroy: {
                                    url: crudbudgetBaseUrl + "management/budgetforcashDestroy",
                                    dataType: "json",
                                    type: "post"
                                },
                                create: {
                                    url: crudbudgetBaseUrl + "management/budgetforcashCreate/<?php echo $projeid;?>",
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
										month_year: {  type: "date",value:"<?php echo $projeid;?>", format: "MM/yyyy" },
										price: {   type: "number", validation: { required: true, min: 1} }
                                    }
                                }
                            },
                        });

                    $("#gridbudget").kendoGrid({
                        dataSource: dataSourcebudget,
                        pageable: false,
                        toolbar: ["create"],
                        columns: [
                        	{ field: "month_year", title:"Month/Year",format: '{0:MM/yyyy}', width: "120px" },
                            { field: "price", title:"Cash", format: "{0:n}", width: "120px" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "250px" }],
                        editable:
                         {
						    createAt: 'bottom',
						    mode: "inline"
						},
                    });
				// <forcash budget>
        //  });
</script>