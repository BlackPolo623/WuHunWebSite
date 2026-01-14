<?php
require_once 'php/data.php';
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteConfig['site_name']; ?> | <?php echo $siteConfig['site_subtitle']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- 背景系統 -->
    <div class="bg-fixed"></div>
    <div class="bg-overlay"></div>
    
    <!-- 動態光暈 -->
    <div class="bg-glow">
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
    </div>
    
    <!-- 粒子效果 -->
    <div class="particles"></div>
    
    <!-- Header -->
    <header class="header">
        <div class="header-inner">
            <div class="header-left">
                <img src="<?php echo $siteConfig['logo']; ?>" alt="" class="logo" onerror="this.style.display='none'">
                <span class="logo-text"><?php echo $siteConfig['site_name']; ?></span>
            </div>
            <nav class="header-nav">
                <a href="index.php" class="header-nav-link active">遊戲系統</a>
                <a href="newbie-guide.php" class="header-nav-link">新手教學</a>
            </nav>
        </div>
    </header>
    
    <!-- 浮動導航 -->
    <nav class="floating-nav">
        <div class="nav-title">目錄導覽</div>
        <?php foreach ($allSections as $section): ?>
        <div class="nav-section">
            <div class="nav-section-title"><?php echo $section['title']; ?></div>
            <div class="nav-items">
                <?php foreach ($section['subsections'] as $sub): ?>
                <a href="#<?php echo $sub['id']; ?>" class="nav-item"><?php echo $sub['title']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </nav>
    
    <main>
        <div class="container">
            <?php foreach ($allSections as $section): ?>
            <section class="main-section" id="<?php echo $section['id']; ?>">
                <h2 class="section-title"><?php echo $section['title']; ?></h2>
                
                <?php foreach ($section['subsections'] as $sub): ?>
                <article class="content-block" id="<?php echo $sub['id']; ?>">
                    <h3 class="content-block-title"><?php echo $sub['title']; ?></h3>
                    <?php echo $sub['content']; ?>
                </article>
                <?php endforeach; ?>
            </section>
            <?php endforeach; ?>
        </div>
    </main>
    
    <footer class="footer">
        <p>© <?php echo date('Y'); ?> <?php echo $siteConfig['site_name']; ?>. All Rights Reserved.</p>
    </footer>
    
    <script src="js/main.js"></script>
</body>
</html>
