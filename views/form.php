<section id="mainCon">
	<div id="centerMain">
		<div style="width: 100%;">
			<?php
				
				$form_location = base_url().'bugtracker/create';
				$update_id = $this->uri->segment(3);

				echo form_open($form_location);

			?>
				<table cellspacing='15'>
					<tr>
						<td><?php echo "Technician Name: "; ?></td>
						<td>
								<?php 
									$data = array(
										'name'        => 'TechName',
										'id'          => 'TechName',
										'value'             =>  $TechName,
										'class'       => 'form-control',
										);

									echo form_input($data);
								?>
						</td>
					</tr>

					<tr>
						<td><?php echo "Bug Information: "; ?></td>
						<td>
								<?php 
									$data = array(
										'name'        => 'BugInfo',
										'id'          => 'BugInfo',
										'value'             =>  $BugInfo,
										'class'       => 'form-control',
										);

									echo form_input($data);
								?>
						</td>
					</tr>
					
					<tr>
						<td><?php echo "Comments (Optional): "; ?></td>
						<td>
								<?php 
									$data = array(
										'name'        => 'Comments',
										'id'          => 'Comments',
										'value'             =>  $Comments,
										'class'       => 'form-control',
										);

									echo form_input($data);
								?>
						</td>
					</tr>
				</table>

			<?php
			
			if (isset($update_id)) 
			{
				echo form_hidden('update_id', $update_id);
			}

			echo '<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button> &nbsp;&nbsp; <button type="submit" name="submit" value="Cancel" class="btn btn-danger">Back</button>';

			echo form_close();
			?>
		</div>
	</div>
</div>