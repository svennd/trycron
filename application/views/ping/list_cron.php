<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 

<?php if($cron_list): ?>
	<table border=1>
	<tr>
		<th>Cron ID</th>
		<th>Descr</th>
		<th>Count</th>
		<th>Last ping</th>
	</tr>
	<?php foreach($cron_list as $cron): ?>
		<tr>
			<td><a href="<?php echo base_url('ping/get_cron/'. $cron['hash']); ?>"><?php echo $cron['hash']; ?></a></td>
			<td><?php echo $cron['descr']; ?></td>
			<td><?php echo $cron['count']; ?></td>
			<td><?php echo (is_null($cron['updated_at'])) ? 'never' : timespan(human_to_unix($cron['updated_at']), time(), 1); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
<p>No crons defined</p>
<?php endif; ?>

<br/>
Add cron : 
<form action="<?php echo base_url('ping/list_cron'); ?>" method="POST">
<table>
	<tr>
		<td>Cron ID</td>
		<td><input type="text" name="cron_id" /></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><textarea name="description"></textarea></td>
	</tr>
	<tr>
		<td>Expected Result</td>
		<td><textarea name="exp_result"></textarea></td>
	</tr>
	<tr>
		<td>Cron Script</td>
		<td><textarea name="cron_script"></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="submit" value="submit" />
		</td>
	</tr>
</table>
</form>
