<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="<?php echo base_url(); ?>report_tool/test_post" method="post">
      <input type="text" name="id" value="1">
      <button type="submit" name="button">submit</button>
      <a href="<?php echo base_url(); ?>report_tool/load_viewer">print</a>
    </form>
    <form class="" action="<?php echo base_url(); ?>report_tool/print_po" method="post">
      <input type="text" name="id" value="1">
      <button type="submit" name="button">submit</button>
      <a href="<?php echo base_url(); ?>report_tool/load_viewer">print</a>
    </form>

  </body>
</html>
