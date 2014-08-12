    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
      

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Description</th>
                <th class="green header">Username</th>
                <th class="red header">Password</th>
              
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach($users as $row)
              {
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['password'].'</td>';
                
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/users/update/'.$row['username'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/users/delete/'.$row['username'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>