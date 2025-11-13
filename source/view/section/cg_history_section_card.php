<?php

              if($key_history == 0)
                echo '<div class="col-12 pb-3">
              <div class="list-group list-group-history">';

                switch ($history->action) {
                  case 'connect':{
                    $history_icon = 'sign-in-alt text-success';
                    $previous_connection_action = $history->action;
                  }
                    break;
                  case 'disconnect':{
                    $previous_connection_action = $history->action;
                  }
                    $history_icon = 'sign-out-alt text-danger';
                    break;
                  case 'add':
                    $history_icon = 'plus text-primary';
                    break;
                  case 'delete':
                    $history_icon = 'times text-danger';
                    break;
                  case 'move_to_trash':
                    $history_icon = 'trash text-danger';
                    break;
                  case 'update':
                    $history_icon = 'pen text-success';
                    break;
                  case 'restore':
                    $history_icon = 'chevron-circle-up text-success';
                    break;
                  case 'restore_all':
                    $history_icon = 'chevron-circle-up text-success';
                    break;
                  case 'truncate':
                    $history_icon = 'times text-danger';
                    break;
                  case 'empty_trash':
                    $history_icon = 'times text-danger';
                    break;
                  case 'create database':
                    $history_icon = 'database text-primary';
                    break;
                } ?>

              <div class="list-group-item history-<?=$history->id_history; ?>">
                <i class="fa fa-<?=$history_icon; ?>"></i>
                <?= $history->time;  ?>
                
                <b>
                  <?php 
                  if($history->id_user!=0){
                    echo '';
                    if($history->user->role == 'user')
                      echo '<i class="fa fa-user text-success"></i>';
                    elseif($history->user->role == 'admin')
                      echo '<i class="fa fa-user text-primary"></i>';
                    echo ' ';
                    echo $history->user->username;  
                  }
                  ?>
                    
                </b>
                <?= $history->action;  ?>
                <?= $history->table;  ?>

                <!-- <b>Id_history</b>: <a href="history-<?=$history->id_history; ?>">#<?=$history->id_history; ?></a> 
                <b>Table</b>: <?= $history->table;  ?>
                <b>Action</b>: <?= $history->action;  ?>
                <b>User</b>: <?= $history->user->username;  ?> 
                <b>Object</b>: <?= $history->id_obj;  ?> -->
                
                </div><!-- end of list group item -->
        <?php if($history->action == 'connect') {?>
              </div><!-- end of list group -->
            </div><!-- end col -->
            <div class="col-12 pb-3">
              <div class="list-group list-group-history">
        <?php } ?>

        <?php if(count($h->histories) == $key_history+1) {?>
              </div><!-- end of list group -->
            </div><!-- end col -->
        <?php } ?>