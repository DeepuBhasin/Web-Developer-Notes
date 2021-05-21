<?php include('admin_header.php');?>
<br/>
<div class="container">
<form action="<?= base_url('admin/add_article/');?>" method="POST">
  <fieldset>
    <legend>Add Article</legend>
    <div class="row">

   		<div class="col-lg-6">
   			<div class="form-group">
		      <label for="exampleInputEmail1">Article Title</label>
		      <?= form_input(['name'=>'title','class'=>'form-control',' placeholder'=>'Enter Article Title','value'=>set_value('title')]);?>
		    </div>
   		</div>	
   		<div class="col-lg-6">
   			<?= form_error('title','<p class="text-danger">','</p>');?>
   		</div>	
   	</div> 
   
    <div class="row">
    	<div class="col-lg-6">
    		<div class="form-group">
		      <label for="exampleInputPassword1">Article Body</label>
		      <!-- <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"> -->
		   	<?= form_textarea(['name'=>'body','class'=>'form-control',' placeholder'=>'Enter Article Body','value'=>set_value('body')]);?>
		    </div>
    	</div>
    	<div class="col-lg-6">
   			<?= form_error('body','<p class="text-danger">','</p>');?>
   		</div>	
    </div>
  
    <?= form_submit(['name'=>'submit','value'=>'Add','class'=>'btn btn-primary']);?>
    <?= form_reset(['value'=>'clear','class'=>'btn btn-default']);?>
  </fieldset>
</form>
</div>
<?php include('admin_footer.php');?>