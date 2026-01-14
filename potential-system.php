<?php
require_once 'php/potential-data.php';
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteConfig['site_name']; ?> | <?php echo $siteConfig['site_subtitle']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* 潛能系統專用樣式 */
        .potential-intro {
            background: linear-gradient(135deg, rgba(157, 78, 221, 0.15) 0%, rgba(18, 18, 22, 0.95) 100%);
            border: 2px solid #9d4edd;
            border-radius: 12px;
            padding: 40px 50px;
            margin-bottom: 40px;
            text-align: center;
        }

        .potential-intro h2 {
            font-size: 1.8rem;
            color: #9d4edd;
            margin-bottom: 15px;
            text-shadow: 0 0 30px rgba(157, 78, 221, 0.6);
        }

        .potential-intro p {
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--color-text);
        }

        /* 潛能方塊卡片 */
        .item-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .item-card {
            background: var(--color-section);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 25px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .item-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--color-primary), transparent);
            transition: left 0.6s;
        }

        .item-card:hover::before {
            left: 100%;
        }

        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 40px rgba(201, 162, 39, 0.2);
            border-color: var(--color-primary);
        }

        .item-id {
            font-size: 0.85rem;
            color: var(--color-text-muted);
            margin-bottom: 10px;
        }

        .item-name {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .item-desc {
            font-size: 0.95rem;
            color: var(--color-text);
            margin-bottom: 15px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            border-left: 3px solid;
        }

        .item-detail {
            font-size: 0.9rem;
            color: var(--color-text-muted);
            line-height: 1.6;
        }

        /* 稀有度卡片 */
        .rarity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 40px;
        }

        .rarity-card {
            background: var(--color-section);
            border: 2px solid;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }

        .rarity-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px;
        }

        .rarity-level {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .rarity-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .rarity-desc {
            font-size: 0.85rem;
            color: var(--color-text-muted);
        }

        /* 屬性表格 */
        .stats-category {
            background: var(--color-section);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .stats-category h3 {
            font-size: 1.2rem;
            color: var(--color-primary);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--color-border);
        }

        .stats-list {
            display: grid;
            gap: 12px;
        }

        .stat-item {
            background: rgba(0, 0, 0, 0.2);
            padding: 12px 15px;
            border-radius: 4px;
            border-left: 3px solid var(--color-primary);
        }

        .stat-name {
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 5px;
        }

        .stat-values {
            font-size: 0.9rem;
            color: var(--color-text-muted);
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .stat-value {
            background: rgba(201, 162, 39, 0.1);
            padding: 2px 8px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
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
                <a href="newbie-guide.php" class="header-nav-link">新手教學</a>
                <a href="potential-system.php" class="header-nav-link active">潛能系統</a>
            </nav>
        </div>
    </header>

    <!-- 浮動導航 -->
    <nav class="floating-nav">
        <div class="nav-title">目錄導覽</div>
        <div class="nav-section">
            <div class="nav-items">
                <a href="#intro" class="nav-item">系統介紹</a>
                <a href="#items" class="nav-item">潛能方塊</a>
                <a href="#rarity" class="nav-item">稀有度等級</a>
                <a href="#stats" class="nav-item">全部潛能詞</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <!-- 系統簡介 -->
            <section id="intro" class="potential-intro">
                <h2>🔮 潛能系統</h2>
                <p>潛能系統是武魂天堂2的終極角色強化機制，每位玩家可擁有<strong>4條潛能詞</strong>，每條潛能詞提供獨特的屬性加成。透過使用不同的<strong>潛能方塊</strong>，您可以重新洗鍊潛能詞，追求更強大的屬性組合，打造專屬於您的極致戰力配置！</p>
            </section>

            <!-- 系統介紹 -->
            <section class="main-section">
                <h2 class="section-title">系統介紹</h2>

                <article class="content-block">
                    <h3 class="content-block-title">潛能系統運作方式</h3>

                    <h4>潛能詞配置</h4>
                    <p>每位玩家的角色擁有<strong>4條潛能詞位</strong>，每條潛能詞都會從對應的技能池中隨機抽取一個屬性加成。潛能詞一旦生成，將持續為角色提供屬性加成，直到使用潛能方塊進行重新洗鍊。</p>

                    <h4>技能池配置</h4>
                    <p>
                        • 第一條潛能詞：技能ID 111000 - 111529<br>
                        • 第二條潛能詞：技能ID 112000 - 112529<br>
                        • 第三條潛能詞：技能ID 113000 - 113529<br>
                        • 第四條潛能詞：技能ID 114000 - 114529<br>
                    </p>
                    <p>每個技能池包含各種不同的屬性加成，從基礎的HP、MP增加，到進階的爆擊傷害、最終傷害等，應有盡有。</p>

                    <h4>稀有度與顏色</h4>
                    <p>潛能詞依據屬性強度分為5個稀有度等級，每個等級以不同顏色標示，方便玩家快速辨識潛能詞的價值。越稀有的潛能詞提供越強大的屬性加成，但出現機率也相對較低。</p>

                    <h4>潛能改變機制</h4>
                    <p>玩家可使用4種不同的潛能方塊來重新洗鍊潛能詞：</p>
                    <p>
                        <strong>1. 普通潛能方塊</strong> - 完全隨機重骰全部4條潛能詞<br>
                        <strong>2. 鎖定潛能方塊</strong> - 保留1條滿意的潛能詞，重骰其餘3條<br>
                        <strong>3. 結合潛能方塊</strong> - 重骰後可選擇保留新結果或舊結果<br>
                        <strong>4. 自由潛能方塊</strong> - 從8個選項中自由選擇4條潛能詞
                    </p>
                </article>
            </section>

            <!-- 潛能方塊介紹 -->
            <section class="main-section" id="items">
                <h2 class="section-title">潛能方塊道具</h2>

                <div class="item-grid">
                    <?php foreach ($potentialItems as $item): ?>
                    <div class="item-card">
                        <div class="item-id">物品 ID: <?php echo $item['id']; ?></div>
                        <div class="item-name" style="color: <?php echo $item['color']; ?>; text-shadow: 0 0 20px <?php echo $item['color']; ?>;">
                            <?php echo $item['name']; ?>
                        </div>
                        <div class="item-desc" style="border-left-color: <?php echo $item['color']; ?>;">
                            <?php echo $item['description']; ?>
                        </div>
                        <div class="item-detail">
                            <?php echo $item['detail']; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- 稀有度等級 -->
            <section class="main-section" id="rarity">
                <h2 class="section-title">稀有度等級</h2>

                <article class="content-block">
                    <p style="margin-bottom: 25px;">潛能詞依據屬性強度分為5個稀有度等級，每個等級在遊戲介面中會以不同顏色顯示，幫助玩家快速判斷潛能詞的價值。稀有度越高的潛能詞，屬性加成越強大，但獲得機率也越低。</p>

                    <div class="rarity-grid">
                        <?php foreach ($rarityLevels as $rarity): ?>
                        <div class="rarity-card" style="border-color: <?php echo $rarity['color']; ?>; box-shadow: 0 0 0 <?php echo $rarity['color']; ?>;">
                            <div class="rarity-level" style="color: <?php echo $rarity['color']; ?>; text-shadow: 0 0 20px <?php echo $rarity['color']; ?>;">
                                Lv.<?php echo $rarity['level']; ?>
                            </div>
                            <div class="rarity-name" style="color: <?php echo $rarity['color']; ?>;">
                                <?php echo $rarity['name']; ?>
                            </div>
                            <div class="rarity-desc">
                                <?php echo $rarity['description']; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </article>
            </section>

            <!-- 全部潛能詞列表 -->
            <section class="main-section" id="stats">
                <h2 class="section-title">全部潛能詞效果</h2>

                <article class="content-block">
                    <p style="margin-bottom: 25px;">以下列出潛能系統中所有可能出現的屬性加成類型。每個屬性都有10個不同的數值等級，等級越高提供的加成越強大。實際獲得的潛能詞將從對應的技能池中隨機抽取。</p>
                </article>

                <?php foreach ($potentialStats as $category): ?>
                <div class="stats-category">
                    <h3><?php echo $category['category']; ?></h3>
                    <div class="stats-list">
                        <?php foreach ($category['stats'] as $stat): ?>
                        <div class="stat-item">
                            <div class="stat-name"><?php echo $stat['name']; ?></div>
                            <div class="stat-values">
                                <?php foreach ($stat['values'] as $value): ?>
                                    <span class="stat-value"><?php echo $value; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>

            <!-- 使用建議 -->
            <section class="main-section">
                <h2 class="section-title">使用建議</h2>

                <article class="content-block">
                    <h3 class="content-block-title">潛能方塊選擇指南</h3>

                    <h4>初期階段</h4>
                    <p>角色初期建議使用<strong>普通潛能方塊</strong>進行洗鍊，快速刷新潛能詞直到獲得基本滿意的屬性組合。不需要追求完美，先以實用性為主。</p>

                    <h4>中期階段</h4>
                    <p>當已有1-2條不錯的潛能詞時，可使用<strong>鎖定潛能方塊</strong>保留滿意的詞條，重新洗鍊其他位置。如果擔心洗掉現有的好詞，可使用<strong>結合潛能方塊</strong>，失敗了還能保留原本的配置。</p>

                    <h4>後期階段</h4>
                    <p>追求極致配置時，<strong>自由潛能方塊</strong>是最佳選擇。8選4的機制大幅提升獲得理想潛能詞的機率，適合用於打造完美的屬性組合。</p>

                    <h4>屬性搭配建議</h4>
                    <p>
                        <strong>物理職業</strong>：優先選擇物理攻擊力、物理爆擊率、物理爆擊傷害、PVE/PVP物理傷害加成<br>
                        <strong>魔法職業</strong>：優先選擇魔法攻擊力、魔法爆擊率、魔法爆擊傷害、PVE/PVP魔法傷害加成<br>
                        <strong>坦克職業</strong>：優先選擇HP、防禦力、PVE/PVP傷害防禦加成<br>
                        <strong>通用推薦</strong>：最終傷害是所有職業都極為珍貴的屬性，優先保留
                    </p>

                    <h4>注意事項</h4>
                    <p>
                        • 潛能方塊為消耗品，使用後即消失，請謹慎使用<br>
                        • 洗鍊結果完全隨機，建議準備充足的潛能方塊再進行洗鍊<br>
                        • 稀有度高的潛能詞不一定適合您的職業，實用性優先於稀有度<br>
                        • 建議先確定自己的戰鬥風格與需求，再進行針對性的洗鍊
                    </p>
                </article>
            </section>
        </div>
    </main>

    <footer class="footer">
        <p>© <?php echo date('Y'); ?> <?php echo $siteConfig['site_name']; ?>. All Rights Reserved.</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>