<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<p><?=var_dump($input)?></p>
						<h3 class="control-label">ข้อมูลรายงานภาษีหัก ณ ที่จ่าย</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/report_withholding_taxes" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="table-responsive">	
						          <table class="basic table table-hover table-xxs" style="width: 5000px;">
						            <thead>
						              <tr>
						              	<th style="width: 1%;">select</th>
						              	<th style="width: 1%;">No.</th>
						              	<th style="width: 3%;">Vender</th>
						              	<th style="width: 1%;">Branch</th>
						              	<th style="width: 3%;">Tax ID.</th>
						              	<th style="width: 2%;">ID. No.</th>
						              	<th style="width: 2%;">Date</th>
						              	<th style="width: 2%;">Tax Name1</th>
						              	<th style="width: 3%;">Amount 1</th>
						              	<th style="width: 2%;">Tax Amt.</th>
						              	<th style="width: 3%;">Tax Name 2</th>
						              	<th style="width: 3%;">Amount 2</th>
						              	<th style="width: 2%;">Tax Amt. 2</th>
						              	<th style="width: 3%;">Tax Name 3</th>
						              	<th style="width: 3%;">Amount 3</th>
						              	<th style="width: 2%;">Tax Amt. 3</th>
						              	<th style="width: 1%;">Module</th>
						              	<th style="width: 2%;">Vch. No.</th>
						              	<th style="width: 2%;">Vch. Date</th>
						              	<th style="width: 1%;">Wt. No.</th>
						              	<th style="width: 2%;">Ref. Doc</th>
						              	<th style="width: 3%;">Adress 1</th>
						              	<th style="width: 3%;">Adress 2</th>
						              	<th style="width: 3%;">Project/Department</th>
						              	<th style="width: 2%;">Tax Type</th>
						              	<th style="width: 2%;">C Taxno</th>
						              	<th style="width: 2%;">Taxno</th>
						              	<th style="width: 2%;">AP. No.</th>
						              	<th style="width: 2%;">AP. Date</th>
						              	<th style="width: 4%;">Remark</th>
						              	<th style="width: 2%;">Chq. No</th>
						              	<th style="width: 3%;">Bank</th>
						              </tr>
						          	</thead>
						          	<tbody>
						          	  <tr>
						          		<td><input type="checkbox" name="chkrow1" value="1"></td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          		<td>1</td>
						          	  </tr>
						          	  <tr>
						          		<td><input type="checkbox" name="chkrow2" value="2"></td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          		<td>2</td>
						          	  </tr>
						          	</tbody>
						          </table>
						      </div>
							</div>
						</div>
					</div>
					<br>
						<div class="form-group col-sm-12" style="text-align: right; ">
							<button class="btn btn-success btn-xs" type="submit">refresh</button>
							<a href="<?=base_url();?>ap/main_index" type="button" class="btn btn-danger btn-xs">Close</a>
						</div>
				</form>	
			</div>
		</div>
	</div>
</div>