<?php include('public_header.php');?>
<br/>
<div class="container">
<form action="<?= base_url('login/admin_login/');?>" method="POST">
  <fieldset>
    <legend>Admin Login</legend>
    <?php if($error=$this->session->flashdata('login_failed')):?>
    <div class="row">
      <div class="col-md-6">
        <div class="alert alert-dismissible alert-danger">
      <?= $error;?>
    </div>
  
      </div>
    </div>
   	<?php endif;?>
    <div class="row">

   		<div class="col-lg-6">
   			<div class="form-group">
		      <label for="exampleInputEmail1">Username</label>
		     <!--  <input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username"> -->
		      <?= form_input(['name'=>'uname','class'=>'form-control',' placeholder'=>'Enter Username','value'=>set_value('uname')]);?>
		    </div>
   		</div>	
   		<div class="col-lg-6">
   			<?= form_error('uname','<p class="text-danger">','</p>');?>
   		</div>	
   	</div> 
   
    <div class="row">
    	<div class="col-lg-6">
    		<div class="form-group">
		      <label for="exampleInputPassword1">Password</label>
		      <!-- <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"> -->
		   	<?= form_password(['name'=>'pass','class'=>'form-control',' placeholder'=>'Enter Password','value'=>set_value('pass')]);?>
		    </div>
    	</div>
    	<div class="col-lg-6">
   			<?= form_error('pass','<p class="text-danger">','</p>');?>
   		</div>	
    </div>
  
    <?= form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']);?>
    <?= form_reset(['value'=>'clear','class'=>'btn btn-default']);?>
  </fieldset>
</form>
</div>
<?php include('public_footer.php');?>