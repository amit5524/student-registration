<?php 
	require __DIR__. '../../include/header.php';
	require '../student/StudentController.php';
	require '../course/CourseController.php';
	require '../subscription/SubscriptionController.php';
?>

<?php 
	$succ_msg = '';
	if (isset($_GET['added'])) {
		$succ_msg = 'Record added successfully';
	}
?>
<div class="card mt-5">
	<div class="card-header">
		<span class="h3">Reports</span>
		<span><a class="btn btn-success float-right" href="add-subscription.php">Add Subscription</a></span>
	</div>
	<div class="card-body">
		<?php if (!empty($succ_msg)):?>
     		<div class="alert alert-success"><?php echo $succ_msg; ?></div>
     	<?php endif; ?>
		<table class="table">
  			<thead>
    			<tr>
					<th scope="col">#</th>
					<th scope="col">Student Name</th>
					<th scope="col">Course Name</th>
				</tr>
			</thead>
  			<tbody>
				<?php 
					$subscriptions = new SubscriptionController;
					$data = $subscriptions->all();
					$nb_elem_per_page = 10;
					$page = isset($_GET['page'])?intval($_GET['page']-1):0;
					$number_of_pages = intval(count($data)/$nb_elem_per_page)+1;
					foreach (array_slice($data, $page*$nb_elem_per_page, $nb_elem_per_page) as $key=>$value) : ?>
				<tr>
					<th scope="row"><?php echo $key+1; ?></th>
					<td><?php echo $value->firstname.' '.$value->lastname; ?></td>
					<td><?php echo $value->course_name; ?></td>
				</tr>
				<?php endforeach; ?>
  			</tbody>
		</table>
		<nav>
  			<ul class="pagination justify-content-center">
			  	<?php for ($i=1; $i<$number_of_pages; $i++) :?>
					<li class="page-item <?php if($_GET['page']==$i){ echo 'disabled'; } ?>">
						<a href="./?page=<?=$i?>" class="page-link"><?=$i?></a>
					</li>
				<?php endfor; ?>
			</ul>
		</nav>
	</div>
</div>
<?php require '../include/footer.php'; ?>