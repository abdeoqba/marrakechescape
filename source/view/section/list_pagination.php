
        <?php 
        // $page,$nbr_pages,$url;

          if($nbr_pages>1){
        ?>
        <div class="col-12 mt-5">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              
              <!-- Précedent -->
              <li class="page-item <?php 

              if($page==1) 
                echo 'disabled'; 

              ?>">
                <a class="page-link text-<?php 

                if($page==1) 
                  echo 'secondary'; 
                else 
                  echo 'info font-weight-bold'; 
                  
                ?> mobile-font-size" href="<?php 

                echo $url; 
                if($page!=2) 
                  echo '-page-'.($page-1); 

                ?>" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              
              <!-- pages 1 2 3 ... -->
              <?php for ($i=1; $i <= $nbr_pages; $i++) { ?>
        
                <li class="page-item <?php 

                if($page==$i)
                  echo 'disabled'; 
                ?>"><a class="page-link text-<?php 

                if($page==$i) 
                  echo 'secondary'; 
                else 
                  echo 'info font-weight-bold'; 
                  
                ?> mobile-font-size" href="<?php 
                echo $url; 
                if($i!=1) 
                  echo '-page-'.$i; 

                ?>"><?= $i ?></a></li>

              <?php } ?>
              
              <!-- Suivant -->
              <li class="page-item <?php 

              if($page==$nbr_pages) 
                echo 'disabled'; 

              ?>">
                <a class="page-link text-<?php 

                if($page==$nbr_pages) 
                  echo 'secondary'; 
                else 
                  echo 'info font-weight-bold'; 

                ?> mobile-font-size" href="<?php 
                echo $url; 
                echo '-page-'.($page+1); 

                ?>">Next</a>
              </li>

            </ul>
          </nav>
        </div>
        <?php 
          }
        ?>