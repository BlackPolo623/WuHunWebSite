<?php
$siteConfig = [
    'site_name' => '武魂天堂2介紹站',
    'site_subtitle' => '新手教學指南',
    'logo' => 'images/logo.png',
];
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
                <a href="index.php" class="header-nav-link">遊戲系統</a>
                <a href="newbie-guide.php" class="header-nav-link active">新手教學</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <!-- 歡迎區塊 -->
            <div class="welcome-banner">
                <h1>歡迎來到武魂天堂2</h1>
                <p>這裡將引導您快速上手遊戲，踏上成為最強武者的道路！</p>
            </div>

            <!-- PDF 標題與按鈕 -->
            <div class="pdf-header">
                <h2 class="pdf-title">📖 新手教學手冊</h2>
                <div class="pdf-actions">
                    <a href="pdf/newbie-guide.pdf" download class="btn btn-primary">💾 下載 PDF</a>
                    <a href="pdf/newbie-guide.pdf" target="_blank" class="btn btn-secondary">🔗 新視窗開啟</a>
                </div>
            </div>

            <!-- PDF 顯示區 -->
            <div class="pdf-container">
                <iframe src="pdf/newbie-guide.pdf" class="pdf-viewer"></iframe>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>© <?php echo date('Y'); ?> <?php echo $siteConfig['site_name']; ?>. All Rights Reserved.</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>