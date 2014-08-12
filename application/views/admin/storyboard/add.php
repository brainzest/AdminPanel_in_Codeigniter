    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new storyboard created with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');

      //form validation   <form enctype="multipart/form-data" action="welcome.php" method="post"onsubmit="return validateFormOnSubmit(this)"> 
      echo validation_errors();
      
      echo form_open('admin/storyboard/add', $attributes);
      ?>
        <fieldset>
      <b> Synopsis Id</b> <input type="text" name="synopsis_id"/><br/>
 <b>Description</b><br/> <TEXTAREA NAME="description" COLS=40
 ROWS=6></TEXTAREA><br/><br/> <input type="hidden" name="MAX_FILE_SIZE" value="100000"/> 

<b>Upload Picture</b><br/> <input name="uploadedfile" type="file" /><br /> 
 <b>Expiry Date</b><br/> <input name="expiryDate" type="datetime" /><br /> 
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     