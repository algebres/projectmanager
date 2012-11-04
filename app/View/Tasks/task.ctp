<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "tasks"));?>">Show all tasks</a>

<div class="task">	
	<table>
		<tr>
			<td width="10%">Priority:</td>
			<td><?=$task['Task']['priority'];?></td>
		</tr>
		<tr>
			<td>Is Closed:</td>
			<td><?=$task['Task']['isClosed'];?></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?=$task['Task']['description'];?></td>
		</tr>
		<tr>
			<td>Created By:</td>
			<td><?=$task['Task']['createdBy'];?></td>
		</tr>
		<tr>
			<td>Created:</td>
			<td><?=$task['Task']['created'];?></td>
		</tr>
		<tr>
			<td>Changed By:</td>
			<td><?=$task['Task']['changedBy'];?></td>
		</tr>
		<tr>
			<td>Changed:</td>
			<td><?=$task['Task']['changed'];?></td>
		</tr>
	</table>
</div>