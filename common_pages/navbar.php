<?php
echo '

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="src/css/nav_style.css" rel="stylesheet">
<script src="src/js/navbar.js"></script>

<div class="container-navbar" id="container-navbar">
    <div class="navbarh" id="navbarh"></div>
    <div class="navbar" id="navbar">
        <ul class="nav-links">
            <li class="nav-tab">...</li>
            <a href="index.php"><li class="nav-link">Home</li></a>
            <a href="games.php"><li class="nav-link">Games</li></a>
            <a href="about_us.php"><li class="nav-link">About Us</li></a>
           
            <li class="nav-tab space">
                <div class="search">
                    <form method="GET" action="search.php">
                        <input name="q" class="searchi" type="text" placeholder="Search"></input>
                        <button type="submit" class="searchbtn"><i style="font-size: 32px" class="material-icons">search</i></button>
                    </form>
                </div>
               
            </li>';

            if(isset($_SESSION['userid'])){
                echo '<button class="nav-logBtn" onclick="redirectLogout()"> LOGOUT</button>';
            }else{
                echo '<button class="nav-logBtn" onclick="redirectLogin()"> LOGIN</button>';
            }
            echo'
            <script>
            function redirectLogin(){
                window.location.href="login.php";
            }
            function redirectLogout(){
                window.location.href="logout.php";
            }
           
            </script>
            ';
			echo' <a href="profile.php">
				<li style="border:0px;margin:0px;padding:0px;" class="nav-tab f-right">
						<i style="font-size: 32px" class="material-icons dropbtn">account_circle</i>
                       
					</div>
                  
				</li>
               
			</a>
        </ul>
    </div>
</div>
'
;
?>