
<?php foreach ($res as $key){
$transfercode = $key->transfer_code;	
	} ?>
<a class="btn bg-danger" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=famata.mrt&docno=<?php echo $transfercode;?>" style="width: 150px;">Print</a>