<link rel="stylesheet" type="text/css" href="Patterns/themes/css/3rd Party/dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="Patterns/themes/css/main.css" />
<script src="Patterns/themes/js/3rd Party/dataTables.min.js"></script>
<script src="Patterns/themes/js/patternCollection.js"></script>
<?php
   include_once 'Patterns/PHP/PatternCollection.php';
   
   if(isset($_POST['refresh']) && !empty($_POST['refresh']))
   {
      echo '1';
   }
   
?>
<div class="border">
	<div class="container">
   	<table class="display" id="patternTable"></table>
   </div>
</div>
<script>
   getTable(<?php echo json_encode($pattern->getAllPatterns()); ?>, <?php echo json_encode($pattern->getTitles()); ?>);
</script>
