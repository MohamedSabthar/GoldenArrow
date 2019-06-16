<div class="d-flex align-items-stretch">
        <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">
                Menu
            </div>
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item">
                    <a href="#" class="sidebar-link text-muted <?if (strcmp($active, 'dashboard')==0) echo 'active'?>">
                        <i class="o-home-1 mr-3 text-gray"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="/accountantController/viewPlayers" class="sidebar-link text-muted <?if (strcmp($active, 'players')==0) echo 'active'?>">
                        <i class="fas fa-users mr-3 text-gray"></i>
                        <span>Players</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" class="sidebar-link text-muted <?if (strcmp($active, 'tournaments')==0) echo 'active'?>">
                        <i class="far fa-futbol mr-3 text-gray"></i>
                        <span>Tournaments</span></a>
                </li>
                <li class="sidebar-list-item">
                    <a href="#" class="sidebar-link text-muted <?if (strcmp($active, 'trainers')==0) echo 'active'?>">
                        <i class="fas fa-user-tie  mr-3 text-gray"></i>
                        <span>Trainers</span></a>
                </li>
            </ul>
        </div>