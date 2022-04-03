<?php 
	require __DIR__. '../../include/header.php';
	require 'StudentController.php';

	$succ_msg = '';
	if (isset($_GET['registered'])) {
		$succ_msg = 'Record added successfully';
	}elseif (isset($_GET['updated'])) {
		$succ_msg = 'Record updated successfully';
	}elseif (isset($_GET['deleted'])) {
		$succ_msg = 'Record deleted successfully';
	}
?>
<div class="card mt-5">
	<div class="card-header">
		<span class="h3">Students</span>
		<span>
			<a class="btn btn-success float-right" href="add-student.php">
				Add Student
			</a>
		</span>
	</div>
	<div class="card-body">
		<?php if (!empty($succ_msg)):?>
     		<div class="alert alert-success"><?php echo $succ_msg; ?></div>
     	<?php endif; ?>
		<table class="table">
  			<thead>
    			<tr>
					<th scope="col">#</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
  			<tbody>
				<?php 
					$students = new StudentController;
					$data = $students->all();
					$nb_elem_per_page = 10;
					$page = isset($_GET['page'])?intval($_GET['page']-1):0;
					$number_of_pages = intval(count($data)/$nb_elem_per_page)+1;
					foreach (array_slice($data, $page*$nb_elem_per_page, $nb_elem_per_page) as $key=>$value) : ?>
				<tr>
					<th scope="row"><?php echo $key+1; ?></th>
					<td><?php echo $value->firstname; ?></td>
					<td><?php echo $value->lastname; ?></td>
					<td>
						<a class="btn btn-primary mt-3" href="edit-student.php?id=<?php echo $value->student_id; ?>">Edit</a>
						<a onclick="if (confirm('Are you sure, you want to delete this?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger mt-3" href="actions.php?id=<?php echo $value->student_id; ?>">Delete</a>
					</td>
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