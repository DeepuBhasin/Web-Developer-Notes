<?php include_once('admin_header.php');?>
<div class="container">
<br/>
<div class="row">
	<div class="col-lg-6 offset-md-10">
		<a href="<?= base_url('admin/add_article');?>" class="btn btn-primary btn-lg">Add Article</a>
	</div>
<br/>
  <?php if($error=$this->session->flashdata('feedback')):
     $feedback_class=$this->session->flashdata('feedback_class');?>
    	<div class="col-md-6">
        	<div class="alert alert-dismissible alert-<?= $feedback_class?>">
     			 <?= $error;?>
    		</div>
   		 </div> 	
  	<?php endif;?>

	<table class="table">
		<thead>
		<?php if(count($articles)):
		 $count=$this->uri->segment(3,0);
		?>
			<tr>
				<th>Sr.No</th>
				<th>Title</th>
				<th>Body</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$c=0;
		
		foreach($articles as $articles):?>
			<tr>
				<td><?= ++$count;?></td>
				<td><?= $articles->title?></td>
				<td><?= $articles->body?></td>
				<td>
					<a href="<?= base_url('admin/edit_article/').$articles->id?>" class="btn btn-primary" >Edit</a>
					<a class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php endforeach;?>		
			<?php else: ?>
				<tr></tr>
			<?php endif; ?>					
		</tbody>
	</table>
	<?= $this->pagination->create_links()?>

</div>

<?php include_once('admin_footer.php');?>