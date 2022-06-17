<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
			
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo-dark.png" alt="">
						  <h3> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  

      
		
      <li class="treeview">
          <a href="">
            <i data-feather="message-circle"></i>
            <span>Me:</span>
          
          </a>
       
        </li> 






      <li class="treeview">
          <a href="">
            <i data-feather="message-circle"></i>
            <span>Users</span>
           
          </a>
          <ul class="treeview-menu">

          <li><a href="{{route('admin.users')}}"><i class="fa fa-cake"></i>People</a></li>
         
          </ul>
        </li> 
		
		
        <li class="treeview">
          <a href="">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
            <li><a href="{{route('all.category')}}"><i class="ti-more"></i>Category</a></li>
            <li><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>SubCategory</a></li>
         
          </ul>
        </li> 


		  
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add products</a></li>
            <li><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage products</a></li>
            
          </ul>
        </li>


        
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Reservations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('reserv.view') }}"><i class="ti-more"></i>Reservations</a></li>
            
          </ul>
        </li>





        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         
            <li><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
            <li><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>
          </ul>
        </li>




           
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
          <li><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Division</a></li>
          <li><a href="{{ route('manage-district') }}"><i class="ti-more"></i>District</a></li>
          <li><a href="{{ route('manage-country') }}"><i class="ti-more"></i>Country</a></li>
          
            
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Checkout</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
          <li><a href="{{ route('checkout.users') }}"><i class="ti-more"></i>View Checkout</a></li>
       
            
          </ul>
        </li>


        <li class="treeview">
          <a href="">
          
            <span> </span>
          
          </a>
       
        </li> 


        <li class="treeview">
          <a href="">
          
            <span> </span>
          
          </a>
       
        </li> 
        

        <li class="treeview">
          <a href="">
          
            <span> </span>
          
          </a>
       
        </li> 

        <li class="treeview">
          <a href="{{route('admin.logout')}}">
            <i data-feather="message-circle"></i>
            <span> Logout</span>
          
          </a>
       
        </li> 
		

    
        </li> 
		  


  </aside>