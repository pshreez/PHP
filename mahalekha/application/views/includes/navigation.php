<nav id="header">
    
        <ul>
		<li><a href="#">गृह पृष्ठ </a></li>
		<li><a href="#">सझौता  </a>
                     <ul>
				
				<li><a href="#">सझौता </a>
                                   <ul>
				       <li><a href="<?php echo base_url().'agreement';?>" <?php if ($page == 'agreement') {?> class="active" <?php }?>>सम्झौता</a></li>
				       <li><a href="<?php echo base_url().'agreement/viewlist';?>" <?php if ($page == 'agreement') {?> class="active" <?php }?>>सम्झौता सुची </a></li>
				   </ul>
                                </li>
				<li><a href="#">ग्वोस्वारा भौचर </a>
                                <ul>
				   <li><a href="<?php echo base_url().'expenditure';?>" <?php if ($page == 'expenditure') {?> class="active" <?php }?>>ग्वोस्वारा भौचर</a></li>
				   <li><a href="#">CSS</a></li>
				  </ul>  
                                </li>
                                <li><a href="#">निकासा </a>
                                <ul>
				   <li><a href="<?php echo base_url().'release';?>" <?php if ($page == 'release ') {?> class="active" <?php }?>>निकासा</a></li>
				   <li><a href="#">CSS</a></li>
				  </ul>  
                                </li>
                                <li><a href="<?php echo base_url().'revenue';?>" <?php if ($page == 'revenue') {?> class="active" <?php }?>>राजस्व</a></li>
		      </ul>
                    
                 </li>
		<li><a href="#">configuration</a>
                          <ul><li><a href="#">संस्था</a>
                              <ul>
				<li><a href="<?php echo base_url().'organization';?>" <?php if ($page == 'organization ') {?> class="active" <?php }?>>संस्था </a></li>
                                <li><a href="<?php echo base_url().'organization/viewlist';?>" <?php if ($page == 'organization ') {?> class="active" <?php }?>>संस्था सुची </a></li>
                              </ul>
                               </li> 
                                <li><a href="<?php echo base_url().'currency';?>" <?php if ($page == 'currency/ ') {?> class="active" <?php }?>>मुद्रा </a></li>
				
			</ul>
                </li>
		
               
        </ul>
</nav>