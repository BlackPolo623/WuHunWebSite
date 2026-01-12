/**
 * 遊戲介紹網站 - 加強版 JS
 * 粒子系統 + 動態光效
 */

document.addEventListener('DOMContentLoaded', function() {
    initParticles();
    initCornerGlow();
    initScrollAnimation();
    initNavHighlight();
    initSmoothScroll();
});

/**
 * 粒子系統
 */
function initParticles() {
    const container = document.querySelector('.particles');
    if (!container) return;
    
    const particleCount = 40;
    
    for (let i = 0; i < particleCount; i++) {
        createParticle(container);
    }
}

function createParticle(container) {
    const particle = document.createElement('div');
    particle.className = 'particle ' + (Math.random() > 0.3 ? 'gold' : 'white');
    
    // 隨機位置
    particle.style.left = Math.random() * 100 + '%';
    
    // 隨機大小
    const size = Math.random() * 6 + 3;
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';
    
    // 隨機動畫延遲和時間
    particle.style.animationDelay = Math.random() * 20 + 's';
    particle.style.animationDuration = (Math.random() * 15 + 15) + 's';
    
    container.appendChild(particle);
}

/**
 * 角落光暈
 */
function initCornerGlow() {
    const body = document.body;
    
    const topLeft = document.createElement('div');
    topLeft.className = 'corner-glow top-left';
    body.appendChild(topLeft);
    
    const bottomRight = document.createElement('div');
    bottomRight.className = 'corner-glow bottom-right';
    body.appendChild(bottomRight);
}

/**
 * 滾動進場動畫
 */
function initScrollAnimation() {
    const blocks = document.querySelectorAll('.content-block');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { 
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    blocks.forEach(block => observer.observe(block));
}

/**
 * 導航高亮
 */
function initNavHighlight() {
    const navItems = document.querySelectorAll('.nav-item');
    const sections = document.querySelectorAll('.content-block');
    
    window.addEventListener('scroll', () => {
        let current = '';
        
        sections.forEach(section => {
            const top = section.offsetTop - 150;
            if (window.pageYOffset >= top) {
                current = section.getAttribute('id');
            }
        });
        
        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href') === '#' + current) {
                item.classList.add('active');
            }
        });
    });
}

/**
 * 平滑滾動
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * 滑鼠追蹤光效（可選）
 */
function initMouseGlow() {
    const glow = document.createElement('div');
    glow.style.cssText = `
        position: fixed;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(201, 162, 39, 0.08) 0%, transparent 70%);
        pointer-events: none;
        z-index: -1;
        transform: translate(-50%, -50%);
        transition: opacity 0.3s;
    `;
    document.body.appendChild(glow);
    
    document.addEventListener('mousemove', (e) => {
        glow.style.left = e.clientX + 'px';
        glow.style.top = e.clientY + 'px';
    });
}
