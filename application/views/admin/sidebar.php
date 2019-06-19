<div class="d-flex align-items-stretch">
		<div id="sidebar" class="sidebar py-3">
			<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">
				Menu
			</div>
			<ul class="sidebar-menu list-unstyled">
				<li class="sidebar-list-item">
					<a href="<?echo base_url('index.php/adminController/index')?>" class="sidebar-link text-muted <?if (strcmp($active, 'dashboard')==0) echo 'active'?>">
						<i class="fas fa-fw fa-home mr-3 text-gray"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="sidebar-list-item">
					<a href="<?echo base_url('index.php/adminController/viewPracticeSessions')?>" class="sidebar-link text-muted <?if (strcmp($active, 'practice_sessions')==0) echo 'active'?>">
						<i class="fas fa-fw fa-running mr-3 text-gray"></i>
						<span>Practice Sessions</span></a>
				</li>
				<li class="sidebar-list-item">
					<a href="<?echo base_url('index.php/adminController/viewMatches')?>" class="sidebar-link text-muted <?if (strcmp($active, 'matches')==0) echo 'active'?>">
						<i class="fas fa-fw fa-futbol mr-3 text-gray"></i>
						<span>Matches</span></a>
				</li>
				<li class="sidebar-list-item">
					<a href="<?echo base_url('index.php/adminController/viewTournaments')?>" class="sidebar-link text-muted <?if (strcmp($active, 'tournaments')==0) echo 'active'?>">
						<i class="fas fa-fw fa-trophy mr-3 text-gray"></i>
						<span>Tournaments</span></a>
				</li>
				<li class="sidebar-list-item">
					<a href="<?echo base_url('index.php/adminController/viewPlayers')?>" class="sidebar-link text-muted <?if (strcmp($active, 'players')==0) echo 'active'?>">
						<i class="fas fa-fw fa-users mr-3 text-gray"></i>
						<span>Players</span></a>
				</li>
				
				

				<li class="sidebar-list-item">
					<a href="<?echo base_url('index.php/adminController/viewTrainers')?>" class="sidebar-link text-muted <?if (strcmp($active, 'trainers')==0) echo 'active'?>">
						<i class="fas fa-fw fa-user-tie  mr-3 text-gray"></i>
						<span>Trainers</span></a>
				</li>
			</ul>
		</div>