<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 

<?php if($cron_detail): ?>
	<table>
		<tr>
			<td><b>ID</b></td>
			<td><?php echo $cron_detail['hash']; ?></td>
		</tr>
		<tr>
			<td><b>descr</b></td>
			<td><?php echo $cron_detail['descr']; ?></td>
		</tr>
		<tr>
			<td><b>cron_code</b></td>
			<td><?php echo $cron_detail['cron_code']; ?></td>
		</tr>
		<tr>
			<td><b>expected_result</b></td>
			<td><?php echo $cron_detail['expected_result']; ?></td>
		</tr>
		<tr>
			<td><b>count</b></td>
			<td><?php echo $cron_detail['count']; ?></td>
		</tr>
		<tr>
			<td><b>created_at</b></td>
			<td><?php echo $cron_detail['created_at']; ?></td>
		</tr>
	</table>
<?php else: ?>
<p>Error cron ID</p>
<?php endif; ?>

<br/>
<br/>
<br/>
<?php if($cron_pings): ?>
	last 5 pings : 
	<table border=1>
	<tr>
		<th>location</th>
		<th>created_at</th>
	</tr>
	<?php foreach($cron_pings as $ping): ?>
		<tr>
			<td><?php echo $ping['location']; ?></td>
			<td><?php echo (is_null($ping['created_at'])) ? 'never' : timespan(human_to_unix($ping['created_at']), time(), 1); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
<p>No pings found</p>
<?php endif; ?>
