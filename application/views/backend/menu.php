
	<div id="menu" class="hidden-print hidden-xs">
	<div class="sidebar sidebar-inverse">
		
		<div class="sidebarMenuWrapper">
			<ul class="list-unstyled">
                            <li class="active"><a href="<?php echo site_url("admin/home"); ?>"><i class=" icon-projector-screen-line"></i><span>Dashboard</span></a></li>
				<li class="hasSubmenu order_alert">
					<a href="#" data-target="#shop" data-toggle="collapse"><i class="icon-shopping-cart"></i>Orders<span>2</span></a>
					<ul class="collapse " id="shop">
                                            <li><a href="<?php echo site_url('admin/latest_orders'); ?>">Latest Orders<span>2</span></a></li>
						<li><a href="pending_orders.html">Pending Orders<span>2</span></a></li>
						<li><a href="rejected_orders.html">Rejected Orders</a></li>
						<li><a href="shop_products.html?lang=en">Delivered Orders</a></li>
					</ul>
				</li>
				<li class="hasSubmenu order_alert">
					<a href="#" data-target="#item" data-toggle="collapse"><i class="icon-shopping-cart"></i>Add Items</a>
					<ul class="collapse " id="item">
						<li><a href="add_item.html">Add product</a></li>
						<li><a href="shop_products.html?lang=en">Products</a></li>
					</ul>
				</li>
				<li class="hasSubmenu order_alert">
					<a href="#" data-target="#categories" data-toggle="collapse"><i class="icon-shopping-cart"></i>Categories</a>
					<ul class="collapse " id="categories">
						<li><a href="add_category.html">Add Categories</a></li>
						<li><a href="view_category.html">View Categories</a></li>
						<li><a href="add_subcategory.html">Add Sub Categories</a></li>
						<li><a href="view_subcategory.html">View Sub Categories</a></li>
					</ul>
				</li>
				<li><a href="return_policy.html"><i class=" icon-flip-camera-fill"></i><span>Return Policy</span></a></li>
				<li><a href="dispute.html"><i class=" icon-flip-camera-fill"></i><span>Dispute Management</span></a></li>
				<li><a href="about.html"><i class=" icon-flip-camera-fill"></i><span>About Us</span></a></li>			
			</ul>
		</div>
	</div>
</div>