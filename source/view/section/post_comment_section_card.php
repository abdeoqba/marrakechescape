
          <div class="col-lg-4 col-md-6 pt-3 post_comment-<?=$post_comment->id_post_comment; ?>">
            
            <div class="list-group list-group-post_comment">
              
              <?php if(!empty($post_comment->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $post_comment->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>PostComment</b>: 
                    <a href="post_comment-<?=$post_comment->id_post_comment; ?>">#<?=$post_comment->id_post_comment; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Post</b>: 

                    <a href="post-<?=$post_comment->post->id_post; ?>"><?=$post_comment->post->id_post; ?>
                    </a>

                    <input type="hidden" id="id_post_<?=$post_comment->id_post_comment; ?>" value="<?=$post_comment->post->id_post; ?>">

                  </div>
                  <div class="list-group-item">
                  
                    <b>Client</b>: 

                    <a href="client-<?=$post_comment->client->id_client; ?>"><?=$post_comment->client->first_name; ?>
                    </a>

                    <input type="hidden" id="id_client_<?=$post_comment->id_post_comment; ?>" value="<?=$post_comment->client->id_client; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Name</b>:
                  <span id="name_<?=$post_comment->id_post_comment; ?>"><?= $post_comment->name;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Email</b>:
                  <span id="email_<?=$post_comment->id_post_comment; ?>"><?= $post_comment->email;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Content</b>:
                  <span id="content_<?=$post_comment->id_post_comment; ?>"><?= $post_comment->content;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Status</b>:
                  <span id="status_<?=$post_comment->id_post_comment; ?>"><?= $post_comment->status;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($post_comment->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="post_comment_update_set(<?= $post_comment->id_post_comment; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="post_comment_move_to_trash_set(<?= $post_comment->id_post_comment; ?>,'<?=$post_comment->name; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="post_comment_restore_set(<?= $post_comment->id_post_comment; ?>,'<?=$post_comment->name; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="post_comment_delete_set(<?= $post_comment->id_post_comment; ?>,'<?=$post_comment->name; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>