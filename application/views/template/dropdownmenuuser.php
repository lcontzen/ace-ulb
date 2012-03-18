			<ul class="nav secondary-nav">
			  <li class="dropdown">
				<?php echo HTML::anchor('#', Auth::instance()->get_user()->username, array('class' => 'dropdown-toggle')); ?>
				<ul class="dropdown-menu">
                  <li><a href="user/index">Control Panel</a></li>
                  <li class="divider"></li>
				  <li><?php echo HTML::anchor('user/logout', 'Logout'); ?></li>
				</ul>
              </li>
			</ul>
