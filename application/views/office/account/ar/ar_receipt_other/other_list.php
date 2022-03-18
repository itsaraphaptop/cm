<div class="page-header">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <h3>Account Receipt Other</h3>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <a href="<?= base_url() ?>ar/receipt_other" style="color: #fff;" class="openinv btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-xs" id="ar_project_table">
                <thead>
                    <tr>
                        <th>AR No.</th>
                        <th>Invoice No.</th>
                        <th>Department/Project Code</th>
                        <th>Department/Project Name</th>
                        <th>System</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($ar as $key => $value) {
                ?>
                    <tr>
                        <td><?= $value->ar_no ?></td>
                        <td><?= $value->ref_invice ?></td>
                        <td><?= $value->project_code ?></td>
                        <td><?= $value->project_name ?></td>
                        <td><?= $value->system_name ?></td>
                        <td><?= $value->customer_name ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

