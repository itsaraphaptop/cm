<?php
$fpro = $this->db->query("SELECT * from ap_cheque_gl join ap_cheque_header on ap_cheque_header.ap_code = ap_cheque_gl.ac_apcode where ap_code  ='$code' GROUP BY ac_project")->result();
 foreach ($fpro as $key) {

$gsys = $this->db->query("SELECT * from ap_cheque_gl join ap_cheque_header on ap_cheque_header.ap_code = ap_cheque_gl.ac_apcode where ap_code  ='$code' and ac_project = '$key->ac_project' GROUP BY ac_system")->result();
 foreach ($gsys as $sys) {
?>
<div class="row">
    <div class="table-responsive" id="invoicedown">
      	<table class="table table-hover table-bordered table-striped table-xxs">
          	<thead>
            	<tr>
            		<td></td>
            	</tr>
            </thead>
            <tbody>
            	<tr>
					<td><input type="text" value="<?php echo $sys->ac_code; ?>" name="ac_code[]" ></td>
				</tr>
            </tbody>
        </table>
    </div>
</div>

                
<?php
}
} ?>