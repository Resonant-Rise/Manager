<?php
include('header.php');
?>
<style>
.console-window {
  border: 1px solid gray;
  padding: 5px 10px;
  border-radius: 5px;
  width: 65% !important;
  height: 200px !important;
  overflow: auto;
}
</style>
<!-- <script type="text/javascript">
// $(function(){
//     $("#logreader").load("logs.php?do=refresh");
//     var auto_refresh = setInterval(
//     (function () {
//         $("#logreader").load("logs.php");
//     }), 1000);
// });

</script> -->
<script type="text/javascript">
function doSomething() {
    $.get("console.php");
    return false;
}
</script>
<div class="console-window">
  <a href="#" onclick="doSomething();">Click Me!</a>
<?php passthru("who"); ?>

</div>


<?php
include('footer.php');
?>