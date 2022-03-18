<?php
$session_data = $this->session->userdata('sessed_in');
$username = $session_data['username'];

?>

<style type="text/css">
    .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
</style>

<div class="content-wrapper">
    <div class="content">
        <div class="col-md-3">
            <div class="panel panel-body border-top-primary">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn border-warning text-warning-600 btn-flat btn-icon btn-xs pull-right">
                        <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <?php
                        $i=1;
                        foreach ($project as $key => $value) {
                    ?>
                    <div class="col-md-12">
                        <label><?=$i++?>. <?= $value->project_name ?></label>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-body border-top-primary">
                <div class="col-lg-8">
                    <button type="button" class="btn btn-info btn-labeled btn-xs">
                    <b><i class="fa fa-plus"></i></b> Folder
                    </button>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-info btn-xs">Status</button>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-info btn-xs">Date Time</button>
                </div>
            </div>
            <hr/>
            <div class="panel panel-body">
                <div class="col-md-8">
                    <button type="button" class="btn btn-success btn-labeled btn-xs" data-toggle="modal" data-target="#myModal">
                    <b><i class="fa fa-plus"></i></b> Add
                    </button>
                    <ul id="node_h">
                        
                        <li><a href="#">TECH</a>
                        <ul>
                            <li>Company Maintenance</li>
                            <li>Employees
                                <ul>
                                    <li>Reports
                                        <ul>
                                            <li>Report1</li>
                                            <li>Report2</li>
                                            <li>Report3</li>
                                        </ul>
                                    </li>
                                    <li>Employee Maint.</li>
                                </ul>
                            </li>
                            <li>Human Resources</li>
                        </ul>
                    </li>
                    </ul>



                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Folder</h4>
      </div>
      <div class="modal-body">

        <div class="row">
            <div class="form-group">
                <label class="col-lg-4 control-label text-right">Name : </label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" id="name" placeholder="ชื่อโฟลเดอร์">
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-7">
                    <button id="saveh" class="btn btn-success btn-xs pull-right" data-dismiss="modal">SAVE</button>
                </div>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">

$('#saveh').click(function(event) {
  var name =  $('#name').val();
  var node = '<li>'+
                '<ul id="'+name+'">'+name+
                '</ul>'+
             '</li>';

  $('#node_h').append(node);

  

});


$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});