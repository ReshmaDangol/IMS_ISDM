<?php include ( "header.html"); ?>
<div class="col-lg-offset-2 col-lg-8 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
<div class="row text-center page-header"><h2>Search Options</h2></div>
  <div class="row">
    <div class="col-md-4 col-sm-5">
      <div class="tabs-left">
        <ul class="nav nav-tabs">         
          <li><a href="#searchStatus" data-toggle="tab">Search By Status</a></li>
          <li><a href="#searchUser" data-toggle="tab">Search By User</a></li>
		  <li><a href="#searchType" data-toggle="tab">Search By Type</a></li>
		  <li><a href="#searchDate" data-toggle="tab">Search By Date</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="searchStatus">         
            <?php include ( "searchStatus.php"); ?>
          </div>
          <div class="tab-pane" id="searchUser">
            <?php include ( "searchUser.php"); ?>
          </div>
          <div class="tab-pane" id="searchType">
			<?php include ( "searchType.php"); ?>
		  </div>
          <div class="tab-pane" id="searchDate">
			<?php include ( "searchDate.php"); ?>
		  </div>
        </div><!-- /tab-content -->
      </div><!-- /tabbable -->
    </div><!-- /col -->
  </div><!-- /row -->
</div><!-- /container -->
</div>