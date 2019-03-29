
 <div id="myModal" class="modal">
  <span onClick="span1_click()" class="closeimg">&times;</span>
    <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>



<script type="text/javascript">
var modal = document.getElementById('myModal');
  function img1_click(id)
{
// Get the modal
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(id);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

  modal.style.display = "block";
  modalImg.src = img.src;
  captionText.innerHTML = img.alt;

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


 }
 // When the user clicks on <span> (x), close the modal
function span1_click()
{
  modal.style.display = "none";
}</script>
  <!-- Bootstrap -->
  <script src="<?php echo(base_url());?>styles/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo(base_url());?>styles/js/app.js"></script>
  <script src="<?php echo(base_url());?>styles/js/app.plugin.js"></script>
  <script src="<?php echo(base_url());?>styles/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?php echo(base_url());?>styles/js/charts/flot/demo.js"></script>

  <script src="<?php echo(base_url());?>styles/js/calendar/bootstrap_calendar.js"></script>
  <script src="<?php echo(base_url());?>styles/js/calendar/demo.js"></script>

  <script type="text/javascript" src="<?php echo(base_url());?>styles/js/sortable/jquery.sortable.js"></script>

  
    <script type="text/javascript" src="<?php echo(base_url());?>styles/datatables/dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo(base_url());?>styles/datatables/datatables.bootstrap.min.js"></script>



</body>
</html>