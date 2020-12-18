
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img style="height:50px;width:auto" src="{{ asset('assets/images/admin/'. Session::get('photo_admin')) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
			@if(Session::has('name_admin'))
			  {{ Session::get('name_admin')}}
			@endif
		  </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<li class="treeview <?php if(!in_array('article', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Article</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_article')}}"><i class="fa fa-circle-o"></i> List of Articles</a></li>
            <li><a href="{{url('admin/list_writer_article')}}"><i class="fa fa-circle-o"></i> List of Writers</a></li>
            <li><a href="{{url('admin/add_article')}}"><i class="fa fa-circle-o"></i> Add New Article</a></li>
          </ul>
        </li>
		<li class="treeview <?php if(!in_array('category', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_category')}}"><i class="fa fa-circle-o"></i> List of Categories</a></li>
            <li><a href="{{url('admin/list_sub_category')}}"><i class="fa fa-circle-o"></i> List of Subcategories</a></li>
            <li><a href="{{url('admin/add_category')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="{{url('admin/add_sub_category')}}"><i class="fa fa-circle-o"></i> Add Subcategory</a></li>
          </ul>
        </li>
        <li class="treeview <?php if(!in_array('comment', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Comment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_comment')}}"><i class="fa fa-circle-o"></i> List of Comments</a></li>
          </ul>
        </li>
		<li class="treeview <?php if(!in_array('user', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-user-o"></i>
            <span>Writer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_user')}}"><i class="fa fa-circle-o"></i> List of Writer</a></li>
            <li><a href="{{url('admin/add_user')}}"><i class="fa fa-circle-o"></i> Register New Writer</a></li>
          </ul>
        </li>
		<li class="treeview <?php if(!in_array('admin', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_admin')}}"><i class="fa fa-circle-o"></i> List of Admin</a></li>
            <li><a href="{{url('admin/add_admin')}}"><i class="fa fa-circle-o"></i> Register New Admin</a></li>
          </ul>
        </li>
		<li class="treeview <?php if(!in_array('role', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-th-list"></i>
            <span>Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_role')}}"><i class="fa fa-circle-o"></i> List of Role</a></li>
            <li><a href="{{url('admin/list_menu')}}"><i class="fa fa-circle-o"></i> List of Menu</a></li>
          </ul>
        </li>
		<li class="treeview <?php if(!in_array('editing', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Editing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_editing')}}"><i class="fa fa-circle-o"></i> List of Editing</a></li>
          </ul>
        </li>
		
		<li class="treeview <?php if(!in_array('subscriber', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span>Subscriber</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_subscriber')}}"><i class="fa fa-circle-o"></i> List of Subscriber</a></li>
          </ul>
        </li>
		
		<li class="treeview <?php if(!in_array('custom_page', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Custom Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_page')}}"><i class="fa fa-circle-o"></i> List of Pages</a></li>
          </ul>
        </li>
		
		<li class="treeview <?php if(!in_array('payment', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/list_writer')}}"><i class="fa fa-circle-o"></i> List of Writer</a></li>
            <li><a href="{{url('admin/list_payment')}}"><i class="fa fa-circle-o"></i> List of Payment</a></li>
          </ul>
        </li>
        <li class="treeview <?php if(!in_array('settings', Session::get('list_permissions'))) echo "hidden"; ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/edit_general_settings')}}"><i class="fa fa-circle-o"></i> General Settings</a></li>
            <li><a href="{{url('admin/edit_banner_main')}}"><i class="fa fa-circle-o"></i> Banner Front</a></li>
            <li><a href="{{url('admin/upload_settings')}}"><i class="fa fa-circle-o"></i> Upload Settings</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
<script>
	/** add active class and stay opened when selected */
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
		 return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
		 return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>