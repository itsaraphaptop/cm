<div class="content-wrapper">


  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
       
        
        <div class="row">
          <div class="col-xs-12 text-right">
          <div class="form-group">
          <a type="button" data-toggle="modal" data-target="#newexpense" class="btn btn-info"><i class="icon-plus-circle2"></i> New</a>
        </div>
      </div>
        </div>

         <h2>Expense</h2>
       
        

        <div class="row">
          <div class="col-xs-12">
            <table class="table table-bordered">
              <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Expense Code</th>
                    <th>Expense Name</th>
                    <th>Cost Code</th>
                    <th>Cost Name</th>
                    <th>A/C for Cost</th>
                    <th>A/C for Expense</th>
                    <th>Type</th>
                    <th class="text-center">Action</th>
                  </tr>
                  <?php
                        $this->db->select('*');
                        $pc_expense = $this->db->get('pc_expense')->result();
                        $n = 1;
                        foreach ($pc_expense as $px) { ?>

                  <tr>
                    <td class="text-center"><?php echo $n; ?></td>
                    <td><?php echo $px->exac_code ;?></td>
                    <td><?php echo $px->exac_nameth ;?></td>
                    <td><?php echo $px->exac_costcode ;?></td>
                    <td><?php echo $px->exac_costname ;?></td>
                    <td><?php echo $px->exac_accost ;?> (<?php echo $px->exac_acname ;?>)</td>
                    <td><?php echo $px->exac_accodeex ;?> (<?php echo $px->exac_acnameex ;?>)</td>
                    <td><?php echo $px->exac_type; ?></td>
                    <td><a data-toggle="modal" data-target="#newexpense<?php echo $n; ?>"><i class="icon-pencil7"></a></i>
                        <a><i class="icon-trash"></i></a>
                    </td>
                  </tr>

                  <?php $n++; } ?>
                </thead>
            </table>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>
 <?php $n = 1; foreach ($pc_expense as $px) { ?>
<div id="newexpense<?php echo $n; ?>" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">Expense Edit</h5>
                </div>
                <form action="<?php echo base_url(); ?>management_active/edit_expase" method="post">
                <div class="modal-body">
                    <div class="row">
            <div class="col-xs-3">
              <label>Expense Code</label>
              <div class="form-group">
              
              <input class="form-control input-sm" type="text" name="exac_code" value="<?php echo $px->exac_code; ?>">


            </div>
          </div>

           <div class="col-xs-4">
              <div class="form-group">
              <label>Expense Name (Thai)</label>
              <input class="form-control input-sm" type="text" name="exac_nameth" value="<?php echo $px->exac_nameth; ?>" required="">
            </div>
          </div>

          <div class="col-xs-4">
              <div class="form-group">
              <label>Expense Name (Eng)</label>
              <input class="form-control input-sm" type="text" name="exac_nameen" value="<?php echo $px->exac_nameen; ?>">
            </div>
          </div>
        </div>

         <div class="row">
          <div class="col-xs-3">
              <div class="form-group">
              <label>Cost Code</label>
              <input class="form-control input-sm" type="text" name="exac_costcode" id="exac_costcode<?php echo $n; ?>" value="<?php echo $px->exac_costcode; ?>" readonly="">
            </div>
          </div>

          <div class="col-xs-4">
            <label>Cost Name</label>
              <div class="input-group">
              <input class="form-control input-sm" type="text" name="exac_costname" id="exac_costname<?php echo $n; ?>" value="<?php echo $px->exac_costname; ?>" readonly="">
              <span class="input-group-btn">
                  <button type="button" class="modalcost btn btn-info input-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
            </div>
          </div>
         </div>  


         <div class="row">
          <div class="col-xs-3">
              <div class="form-group">
              <label>A/C for Cost</label>
              <input class="form-control input-sm" type="text" name="exac_accost" id="exac_accost<?php echo $n; ?>" value="<?php echo $px->exac_accost; ?>" readonly="">
            </div>
          </div>

          <div class="col-xs-4">
            <label>&nbsp;</label>
              <div class="input-group">
              
              <input class="form-control input-sm" type="text" name="exac_acname" id="exac_acname<?php echo $n; ?>" value="<?php echo $px->exac_acname; ?>" readonly="">
              <span class="input-group-btn">
                  <button type="button" class="acpj btn btn-info input-sm" data-toggle="modal" data-target="#acpj"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
            </div>
          </div>
         </div>  


         <div class="row">
          <div class="col-xs-3">
              <div class="form-group">
              <label>A/C for Expense</label>
              <input class="form-control input-sm" type="text" name="exac_accodeex" id="exac_accodeex<?php echo $n; ?>" value="<?php echo $px->exac_accodeex; ?>" readonly="">
            </div>
          </div>

          <div class="col-xs-4">
            <label>&nbsp;</label>
              <div class="input-group">
              
              <input class="form-control input-sm" type="text" name="exac_acnameex" id="exac_acnameex<?php echo $n; ?>" value="<?php echo $px->exac_acnameex; ?>" readonly="">
               <span class="input-group-btn">
                  <button type="button" class="acdp btn btn-info input-sm" data-toggle="modal" data-target="#acdp"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
            </div>
          </div>
         </div>  

          <div class="row">
           
              <div class="col-xs-3">
                 <label>Type</label>
                <div class="form-group">
                  <select class="form-control input-sm" name="exac_type" required="">
                     
                     <?php
                        $this->db->select('*');
                        $this->db->where('id',$px->exac_type);
                        $expense = $this->db->get('m_expense')->result();
                        foreach ($expense as $ex) { ?>
                    <option value="<?php echo $ex->id; ?>"><?php echo $ex->expense_name; ?></option>
                       <?php } ?>
                        <?php
                        $this->db->select('*');
                         $this->db->where('id !=',$px->exac_type);
                        $expense = $this->db->get('m_expense')->result();
                        foreach ($expense as $ex) { ?>
                    <option value="<?php echo $ex->id; ?>"><?php echo $ex->expense_name; ?></option>
                       <?php } ?>
                  </select>
                </div>
              </div>
            </div>
                </div>
              </form>
              </div>
            </div>
          </div>

  <?php $n++; } ?>

<div id="newexpense" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title">Expense</h5>
                </div>
  <form action="<?php echo base_url(); ?>management_active/insert_expase" method="post">
                <div class="modal-body">
      
          <div class="row">
            <div class="col-xs-3">
              <label>Expense Code</label>
              <div class="input-group">
              
              <input class="form-control input-sm" type="text" name="exac_code" value="" >

        
            </div>
          </div>

           <div class="col-xs-4">
              <div class="form-group">
              <label>Expense Name (Thai)</label>
              <input class="form-control input-sm" type="text" name="exac_nameth" value="" required="">
            </div>
          </div>

          <div class="col-xs-4">
              <div class="form-group">
              <label>Expense Name (Eng)</label>
              <input class="form-control input-sm" type="text" name="exac_nameen" value="">
            </div>
          </div>
        </div>

         <div class="row">
          <div class="col-xs-3">
              <div class="form-group">
              <label>Cost Code</label>
              <input class="form-control input-sm" type="text" name="exac_costcode" id="exac_costcode" value="" readonly="">
            </div>
          </div>

          <div class="col-xs-4">
            <label>Cost Name</label>
              <div class="input-group">
              <input class="form-control input-sm" type="text" name="exac_costname" id="exac_costname" value="" readonly="">
              <span class="input-group-btn">
                  <button type="button" class="modalcost btn btn-info input-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
            </div>
          </div>
         </div>  


         <div class="row">
          <div class="col-xs-3">
              <div class="form-group">
              <label>A/C for Cost</label>
              <input class="form-control input-sm" type="text" name="exac_accost" id="exac_accost" value="" readonly="">
            </div>
          </div>

          <div class="col-xs-4">
            <label>&nbsp;</label>
              <div class="input-group">
              
              <input class="form-control input-sm" type="text" name="exac_acname" id="exac_acname" value="" readonly="">
              <span class="input-group-btn">
                  <button type="button" class="acpj btn btn-info input-sm" data-toggle="modal" data-target="#acpj"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
            </div>
          </div>
         </div>  


         <div class="row">
          <div class="col-xs-3">
              <div class="form-group">
              <label>A/C for Expense</label>
              <input class="form-control input-sm" type="text" name="exac_accodeex" id="exac_accodeex" value="" readonly="">
            </div>
          </div>

          <div class="col-xs-4">
            <label>&nbsp;</label>
              <div class="input-group">
              
              <input class="form-control input-sm" type="text" name="exac_acnameex" id="exac_acnameex" value="" readonly="">
               <span class="input-group-btn">
                  <button type="button" class="acdp btn btn-info input-sm" data-toggle="modal" data-target="#acdp"><span class="glyphicon glyphicon-search"></span>  </button>
                </span>
            </div>
          </div>
         </div>  

          <div class="row">
           
              <div class="col-xs-3">
                 <label>Type</label>
                <div class="form-group">
                  <select class="form-control input-sm" name="exac_type" required="">
                     <option value="" ></option>
                        <?php
                        $this->db->select('*');
                        $expense = $this->db->get('m_expense')->result();
                        foreach ($expense as $ex) { ?>
                    <option value="<?php echo $ex->id; ?>"><?php echo $ex->expense_name; ?></option>
                       <?php } ?>
                  </select>
                </div>
              </div>
            </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            
              </div>
                </form>
            </div>
          </div>

<div id="acpj" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Add Item</h5>
      </div>
        <div class="modal-body">
            <div class="row" id="modal_mat"></div>

        </div>
    </div>
  </div> <!-- matcode-->
  </div>

  <script>
     $(".acpj").click(function(){
      $('#modal_mat').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#modal_mat").load('<?php echo base_url(); ?>index.php/share/modalexpensother/p');
    });
  </script>


  <div id="acdp" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Add Item</h5>
      </div>
        <div class="modal-body">
            <div class="row" id="modal_matd"></div>

        </div>
    </div>
  </div> <!-- matcode-->
  </div>

  <script>
     $(".acdp").click(function(){
      $('#modal_matd').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#modal_matd").load('<?php echo base_url(); ?>index.php/share/modalexpensother/d');
    });
  </script>


  <div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add CostCode</h4>
      </div>
        <div class="modal-body">
            <div id="modal_cost"></div>
        </div>
    </div>
  </div>
</div>

  <script>
    $(".modalcost").click(function(){
      $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
      $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
    });
      </script>