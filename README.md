# 遊戲系統介紹網站

簡潔寬版的系統說明文檔網站。

## 檔案結構

```
├── index.html      ← 純 HTML 版（直接開啟）
├── index.php       ← PHP 版（需伺服器）
├── css/style.css   ← 樣式
├── js/main.js      ← 互動效果
├── php/data.php    ← 資料配置（PHP 版用）
└── images/         ← 放 logo、背景圖
```

## 新增內容

### 方法一：直接編輯 HTML
開啟 `index.html`，複製現有的 `<article class="content-block">` 區塊並修改內容。

### 方法二：編輯 PHP 資料檔（推薦）
編輯 `php/data.php`，在對應分類的 `subsections` 陣列中新增：

```php
[
    'id' => 'new-system',
    'title' => '新系統名稱',
    'content' => '
        <h4>小標題</h4>
        <p>說明文字...</p>
    ',
],
```

## 自訂背景

將背景圖片命名為 `bg.jpg` 放入 `images/` 資料夾。
