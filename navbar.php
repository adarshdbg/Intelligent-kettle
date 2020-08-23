<div class="navbar">

			<ul class="list">
				<b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Cooper Black;">
				Intelligent Kettle</b>
			<?php
				if(isset($_SESSION["AID"]))
				{
					echo'

				<li><a href="logout.php">Logout</a></li>
					';
				}
				
			?>
				
			</ul>
		</div>
		