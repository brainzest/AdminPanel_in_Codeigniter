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
                  <th class="yellow header headerSortDown">Name</th>
                  <th class="green header">Description</th>
                  <th class="red header">Genre</th>
                  <th class="red header">Tagline</th>
                  <th class="red header">Expiry Date</th>


              </tr>
            </thead>
            <tbody>
              <?php
              foreach($synopsis as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['sid'].'</td>';
                echo '<td>'.$row['synopsis_name'].'</td>';
                  echo '<td>'.$row['synopsis_description'].'</td>';
                  echo '<td>'.$row['genre'].'</td>';
                  echo '<td>'.$row['tagline'].'</td>';
                  echo '<td>'.$row['expiry_time'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/synopsis/update/'.$row['sid'].'" class="btn btn-info">view & edit</a>
                  <a href="'.site_url("admin").'/synopsis/delete/'.$row['sid'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>