<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "issues"));?>">Show all issues</a>

<div class="issue">
	<?php 
	//print_r($log); 
	?>
	<table>
		<tr>
			<td width="20%">Issue number</td>
			<td>#<?=$issue['Issue']['issueId'];?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<span class="status <?=$issue['Issue']['isClosed'];?>"><?=$issue['Issue']['isClosed'];?></span> <?=$issue['Issue']['name'];?>
			</td>
		</tr>
		<tr>
			<td>Milestone</td>
			<td><?=$issue['Milestone']['name'];?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?=$issue['Issue']['description'];?></td>
		</tr>
		<tr>
			<td>Created</td>
			<td><?=$issue['Issue']['created'];?></td>
		</tr>
		<tr>
			<td>Created By</td>
			<td><?=$issue['CreatedBy']['name'];?></td>
		</tr>
		<tr>
			<td>Changed</td>
			<td><?=$issue['Issue']['changed'];?></td>
		</tr>
		<tr>
			<td>Changed By</td>
			<td><?=$issue['ChangedBy']['changedBy'];?></td>
		</tr>
	</table>
	
</div>