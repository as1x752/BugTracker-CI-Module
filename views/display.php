<section id="mainbig">

<table border='1' cellpadding='10'>

	<tr>
		<th colspan="6">SpitFire Web Agent Bug List:</th>
	</tr>
	<?php
	
		foreach ($query->result() as $row) {
			
	?>
	

	
	<?php
	
		$edit_url = base_url().'bugtracker/create/'.$row->ID;
		$delete_post = base_url().'bugtracker/delete/'.$row->ID; 
		
		echo "<tr cellpadding='10'><td width='8px;cellpadding: 10;' cellpadding='10'>&nbsp;&nbsp;&nbsp;&nbsp;".$row->ID."</td><td width='100px;' cellpadding='10'>&nbsp;&nbsp;".$row->TechName." &nbsp;&nbsp;&nbsp;</td><td width='600px;'>&nbsp;&nbsp;".$row->BugInfo." &nbsp;&nbsp;&nbsp;</td><td width='300px;'>&nbsp;&nbsp;".$row->Comments." &nbsp;&nbsp;&nbsp;</td><td width='10px;'>&nbsp;&nbsp;<a href='".$edit_url."'><span class='glyphicon glyphicon-pencil' style='color:green;' aria-hidden='true'></span></a></td><td width='10px;'>&nbsp;&nbsp;<a href='".$delete_post."'><span class='glyphicon glyphicon-remove' style='color:red;' aria-hidden='true'></span></a></td></tr>";
	
	?>
	

	
	<?php	 } ?>
	
</table>
<b>	
	<?php
		
		echo "<br />";
		
		echo "<span style='margin-left: 25px;'>";
		
		echo anchor('bugtracker/create', 'Add New Bug');
		
		echo "</span>";
		
	?>
</b>
<br /><br /><br /><br /><br /><br />

</section>