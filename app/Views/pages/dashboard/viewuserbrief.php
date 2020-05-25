Briefing de Cliente:
<pre>
<?php $questions = $query->briefing_replyed; 

$questions2 = json_decode($questions);




?>
</pre>
<?php foreach ($questions2 as &$value) { ?>


	<hr>
  <div class="form-row nopad">
    <div class="modal-content d-block">
      <div class="modal-header">
        <b class="modal-title"><?php echo $value[0]; ?></b>
      </div>
	  
      <div class="modal-body alert-secondary">
       <?php echo $value[1]; ?>
      </div>
      
    </div>
    </div>
	

<?php } ?>

  
