<style>
.font{
    font-family: 'Prompt', sans-serif;
}
</style>
<?php foreach ( $file as $key => $value ) {
 if ( $flag == "po" ) {
  $filesize = "select_file_po/" . $value->name_file;
  $kb       = filesize( $filesize ) / 1024;
  $mb       = $kb / 1024;
 } else {
  $filesize = "select_file_pr/" . $value->name_file;
  $kb       = filesize( $filesize ) / 1024;
  $mb       = $kb / 1024;
 }
 ?>
<ul class="media-list">
    <li class="media">
        <div class="media-left media-middle">
            <?php if ( get_mime_by_extension( $value->name_file ) == "application/pdf" ) {?>
                <i class="icon-file-pdf icon-2x"></i>
            <?php } else {?>
                <i class="icon-file-picture icon-2x"></i>
            <?php }?>
        </div>

        <div class="media-body font">
            <a class="media-heading text-semibold" href="#"> <?php echo $value->name_file; ?> </a>
            <ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
                <li><?php echo number_format( $mb, 2 ); ?> MB</li>
            </ul>
        </div>

        <div class="media-right media-middle">
            <ul class="icons-list">
            <?php if ( $flag == "po" ) {?>
                <li><a href="<?php echo base_url(); ?>select_file_po/<?php echo $value->name_file; ?>" target="_blank"><i class="icon-download"></i></a></li>
            <?php } else {?>
                <li><a href="<?php echo base_url(); ?>select_file_pr/<?php echo $value->name_file; ?>" target="_blank"><i class="icon-download"></i></a></li>
            <?php }?>
            </ul>
        </div>
    </li>
</ul>
<?php }?>