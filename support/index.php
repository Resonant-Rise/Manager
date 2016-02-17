<?php
include('../db.php');
include('../header.php');
if(is_logged_in()) {
	?>

<div class="container">
        <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert"><div class="cross">x</div></button>
  <h4>ATTENTION!</h4>
  <p>All times presented here, are in Eastern Time (GMT -5)</p>
</div>
<table id="table" class="table table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Submitted By</th>
      <th>Issue Type</th>
      <th>Summary</th>
      <th>Status</th>
      <th>Action(s)</th>
    </tr>
  </thead>
    <tbody>
        <tr>
            <td>12453</td>
            <td>Test</td>
            <td><span class="label label-danger">BUG</span></td>
            <td>AM2 World Gen Issues</td>
            <td>Urgent</td>
            <td><a href="#" class="btn btn-info">View</a><a href="#" class="btn btn-success">Fixed</a><a href="#" class="btn btn-danger">Remove</a></td>
        </tr>
    </tbody>
</table>
</div>


<?php
}
include('../footer.php');
?>
