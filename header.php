<link rel="stylesheet" href="./styles/header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./styles/images/favicon.ico" type="image/x-icon">
<?php
require (__DIR__ . '/ADMIN/functions.php');

$currentPage = basename($_SERVER['PHP_SELF']);
?>
<div class="top">
    <header>
        <div class="head-container">
            <!-- <a href="#" id="menu">
                <i class="fa-solid fa-bars"></i>
            </a> -->
            <script>
                function toggleSidebar() {
                    var sidebar = document.getElementById("sidebar");
                    sidebar.classList.toggle("open-sidebar");
                }
                function closeSidebar() {
                    var sidebar = document.getElementById("sidebar");
                    sidebar.classList.remove("open-sidebar");
                }
            </script>
            <a id="menu" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></a>
            <div id="sidebar" class="sidebar">
                <a href="#" class="closebtn" onclick="closeSidebar()">&times;</a>
                <a href="./index.php">HOME</a>
                <a href="./k12.php">K-12</a>
                <a href="./facilities.php">FACILITIES</a>
                <a href="./policies.php">POLICIES</a>
                <a href="./about.php">ABOUT</a>
                <a href="./news.php">NEWS</a>
                <a href="./contact.php">CONTACT US</a>
            </div>
            <h2>PHILIPPINE MALABON CULTURAL INSTITUTE</h2>
            <img class="header-logo" src="./styles/images/PMCI-LOGO.png" alt="" draggable="false">
            <a href="./ADMIN/index.php"></a>
        </div>
    </header>
    <nav>
        <div class="nav-container">
            <div class="img-logo">
                <img src="./styles/images/PMCI-LOGO.png" alt="">
                <span>&nbsp菲律賓馬拉邦文化學院</span>
            </div>
            <div class="navi">
                <a class="hover <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>"
                    href="./index.php">Home</a>
                <ul
                    class="hover name <?php echo ($currentPage == 'k12.php' || $currentPage == 'facilities.php' || $currentPage == 'policies.php' || $currentPage == 'enrollment.php') ? 'active' : ''; ?>">
                    <li class="menu-item">
                        <a href="#" class="menu-link">Academics</a>
                        <ul class="drop-menu">
                            <li class="drop-menu-item">
                                <a href="k12.php">K12</a>
                            </li>
                            
                            <li class="drop-menu-item">
                                <a href="facilities.php">FACILITIES</a>
                            </li>
                            <li class="drop-menu-item">
                                <a href="policies.php">POLICIES</a>
                            </li>
                            <li class="drop-menu-item">
                                <a href="enrollment.php">ENROLLMENT</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a class="hover <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>"
                    href="./about.php">About</a>
                <a class="hover <?php echo ($currentPage == 'news.php') ? 'active' : ''; ?>" href="./news.php">News</a>
                <a class="hover <?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>"
                    href="./contact.php">Contact Us</a>
            </div>
        </div>
    </nav>
</div>
<main>