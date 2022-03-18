&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_theme_warning">View Picture <i class="icon-play3 position-right"></i></button>

<div class="modal fade" id="modal_theme_warning" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Picture</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
          <?php foreach ($res as $key){ ?>
          <div class="col-lg-3 col-sm-6">
              <div class="thumbnail">
                <div class="thumb">
                  <img src="<?php echo base_url(); ?>imgasset/<?php echo $key->ass_imgg;?>" alt="" id="delete<?php echo $key->id; ?>">
                  <div class="caption-overflow">
                    <span>
                      <a href="<?php echo base_url(); ?>imgasset/<?php echo $key->ass_imgg;?>"  target="_blank"><i class="icon-plus3"></i></a>

                      <a id="del<?php echo $key->id; ?>" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="glyphicon glyphicon-trash"></i></a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
         
         <script>
          $("#del<?php echo $key->id; ?>").click(function(event) {
            $('#delete<?php echo $key->id; ?>').hide();
            $.post( "<?php echo base_url(); ?>asset_active/del_png/<?php echo $key->id; ?>/<?php echo $key->ass_imgg;?>" );
          });
          
         </script>
        

            <?php } ?>
           
            </div>
            </div>
        </div>
    </div>
  </div>
</div>