
                        <?php
					foreach ($data as $key => $value) {						
                    ?>
                        <tr>
                            <td><?= $value->pr_prno; ?></td>
                            <td class="text-left"><?= $value->pr_prdate; ?></td>
                            <td class="text-left"><?= $value->pr_reqname; ?></td>
                            <td>
                                <?php 	$this->db->select( '*' );
								$this->db->where( 'pr_ref', $value->pr_prno );
								$this->db->where( 'user', $value->compcode );
								$q = $this->db->get( 'select_file_pr' )->num_rows(); 
						?>
                                <?php if($q==0){ ?>
                                <i></i>
                                <?php }else{ ?>

                                <a href="#" id="popover-show<?= $value->pr_prno; ?>" data-placement="bottom"
                                    data-html="true"><i class="icon-attachment"></i></a>
                                <script>
                                var id_pr = "<?= $value->pr_prno; ?>"
                                $.post('<?php echo base_url(); ?>purchase/loadfile', {
                                    id_pr: id_pr
                                }, function() {}).done(function(data) {
                                    // $('#view_pr').html(data);
                                    $('#popover-show<?= $value->pr_prno; ?>').popover({
                                        title: 'Attach File',
                                        content: data,
                                        trigger: 'click'
                                    }).on('shown.bs.popover', function() {
                                        // alert('Shown event fired.')
                                    });
                                });
                                </script>


                                <?php } ?>
                            </td>
                            <td><a href="<?php echo base_url(); ?>pr/openpr/<?= $value->pr_prno; ?>" target="_blank"><i
                                        class="icon-folder-open"></i></a></td>

                            <td>
                                <select class="form-control" name="status_po" id="status_po<?php echo $value->pr_prno;?>">

                                    <?php if($value->pr_postatus == '1'){ ?>
                                    <option selected value="1">ยังไม่ได้เปิดดู</option>
                                    <?php }else{ ?>
                                    <option value="1">ยังไม่ได้เปิดดู</option>
                                    <?php } ?>
                                    <?php if($value->pr_postatus == '2'){ ?>
                                    <option selected value="2">กำลังขอราคา</option>
                                    <?php }else{ ?>
                                    <option value="2">กำลังขอราคา</option>
                                    <?php } ?>
                                    <?php if($value->pr_postatus == '3'){ ?>
                                    <option selected value="3">ระงับการซื้อ</option>
                                    <?php }else{ ?>
                                    <option value="3">ระงับการซื้อ</option>
                                    <?php } ?>

                                </select>
                            </td>
                            <!-- <td>วันนี้</td> -->
                        </tr>
                        <script>
                            $("#status_po<?php echo $value->pr_prno;?>").change(function(){
                                var url = "<?php echo base_url(); ?>purchase/changeprstatus";
                                var dataSet = {
                                    prcode: '<?php echo $value->pr_prno;?>',
                                    pr_status: $("#status_po<?php echo $value->pr_prno;?>").val(),
                                };
                                $.post(url, dataSet, function(data) {
                                    console.log(data);
                                    $(this).text('color', 'red');
                                });
                            });
                        </script>
                    <?php
                        }
                    ?>
