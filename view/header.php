<header>
    <div class="header">
        <div class="logoNmenu">
            <div class="logo"><a href="main.php">BBS SITE</a></div>
            <nav class="menu">
                <ul>
                    <li><a href="main.php">메인</a></li>
                    <li><a href="index.php">게시판</a></li>
                </ul>
            </nav>
        </div>
        <div class="form">
            <ul>
                <?php
                session_start();

                if (isset($_SESSION['userid'])) {
                    echo $_SESSION['userid']; ?>님 안녕하세요.
                <li><a href="logout.php">로그아웃</a></li>
            <?php } else { ?>
                <li><a href="login.php">로그인</a></li>
            <?php } ?>
            </ul>
        </div>
        <form action="search_result.php" class="search" method="post">
            <input type="text" id="search" name="skey">
            <button type="submit" class="searchIcon">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</header>