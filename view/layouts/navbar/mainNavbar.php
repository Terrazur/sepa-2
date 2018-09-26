<div>
	<ul class="navbar navbar-transparent uncollapse">
		<li class="nav-item nav-item-left "><a href="#home" class="item">Home</a></li>
		<li class="nav-item nav-item-left "><a href="#promo" class="item">Our Promo</a></li>
		<li class="nav-item nav-item-left "><a href="#categories" class="item">Our Categories</a></li>
		<li class="nav-item nav-item-left "><a href="#about" class="item">About Us</a></li>
		<li class="nav-item nav-item-left "><a href="store" class="item">Go To Store</a></li>
		<?php 
		if (!empty($_SESSION['user'])) { ?>
			<li class="nav-item nav-item-right" style="background-color: red;"><a id="user" class="item" href="logout">Logout</a></li>
			<li class="nav-item nav-item-right"><a id="user" class="item" href="profile">See Profile</a></li>
			<li class="nav-item nav-item-right">
				<a id="user" class="item" href="cart">
					Your Cart
					<sup>
						<?php if (isset($_SESSION['cart'])) { 
							echo count($_SESSION['cart']);
						} else{ echo "0";} ?>
					</sup>
				</a>
			</li>
		<?php } else{ ?>
		<li class="nav-item nav-item-right"><a href="login" class="item">Login</a></li>
		<li class="nav-item nav-item-right "><a href="register" class="item">Register</a></li>
		<?php } ?>
	</ul>
</div>

<div>
	<ul class="navbar navbar-transparent collapse" style="text-align: left;">
		<li class="nav-item ">
			<a href="javascript:void(0);" class="item">
				<div class="arrow">
					&#10507;
				</div>	
			</a>
		</li>
		<div class="show">
			<li class="nav-item"><a href="#home" class="item">Home</a></li>
			<li class="nav-item"><a href="#promo" class="item">Our Promo</a></li>
			<li class="nav-item"><a href="#categories" class="item">Our Categories</a></li>
			<li class="nav-item"><a href="#about" class="item">About Us</a></li>
			<li class="nav-item"><a href="store" class="item">See All</a></li>
			<?php 
			if (!empty($_SESSION['user'])) { ?>
				<li class="nav-item nav-item-right"><a id="user" class="item" href="">See Profile</a></li>
				<li class="nav-item nav-item-right" style="background-color: red;"><a id="user" class="item" href="">Logout as <?php echo $_SESSION['user']; ?></a></li>
			<?php } else{ ?>
			<li class="nav-item"><a href="login" class="item">Login</a></li>
			<li class="nav-item"><a href="register" class="item">Register</a></li>
			<?php } ?>
		</div>
	</ul>
</div>