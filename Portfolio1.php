<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✧ Portfolio - อภิวิชญ์ สุลำนาจ ✧</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #00D4AA 0%, #39C5BB 25%, #00E5FF 50%, #4FC3F7 75%, #81D4FA 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(0, 229, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(57, 197, 187, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(129, 212, 250, 0.2) 0%, transparent 50%);
            z-index: -2;
            animation: gradientShift 10s ease-in-out infinite alternate;
        }

        @keyframes gradientShift {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-20px, -20px) scale(1.05); }
        }

        /* Floating design elements */
        .design-element {
            position: fixed;
            pointer-events: none;
            z-index: -1;
            opacity: 0.6;
            font-size: 30px;
        }

        .element-1 { top: 10%; left: 5%; animation: float1 15s ease-in-out infinite; }
        .element-2 { top: 20%; right: 10%; animation: float2 18s ease-in-out infinite; }
        .element-3 { top: 60%; left: 10%; animation: float3 20s ease-in-out infinite; }
        .element-4 { top: 70%; right: 5%; animation: float4 16s ease-in-out infinite; }
        .element-5 { top: 40%; left: 50%; animation: float5 22s ease-in-out infinite; }

        @keyframes float1 {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(15px) rotate(240deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translateX(0) rotate(0deg); }
            50% { transform: translateX(-40px) rotate(180deg); }
        }

        @keyframes float3 {
            0%, 100% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(1.2) rotate(90deg); }
            75% { transform: scale(0.8) rotate(270deg); }
        }

        @keyframes float4 {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-25px) translateX(25px); }
        }

        @keyframes float5 {
            0%, 100% { transform: rotate(0deg) scale(1); }
            33% { transform: rotate(120deg) scale(1.1); }
            66% { transform: rotate(240deg) scale(0.9); }
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 50px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 30px;
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            animation: slideDown 1.2s ease-out;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
            100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        }

        @keyframes slideDown {
            from { transform: translateY(-80px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .profile-pic {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            margin: 0 auto 25px;
            background: linear-gradient(45deg, #00E5FF, #39C5BB, #00D4AA);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            color: white;
            border: 6px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            animation: profilePulse 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes profilePulse {
            0%, 100% { transform: scale(1) rotate(0deg); box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); }
            25% { transform: scale(1.05) rotate(2deg); box-shadow: 0 20px 50px rgba(0, 229, 255, 0.3); }
            75% { transform: scale(0.98) rotate(-1deg); box-shadow: 0 10px 30px rgba(57, 197, 187, 0.3); }
        }

        .name {
            font-size: 3.2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #00695C, #004D40, #00BCD4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .title {
            font-size: 1.4rem;
            color: #006064;
            margin-bottom: 20px;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #00838F;
            font-weight: 400;
            position: relative;
            z-index: 1;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 30px;
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: fadeInUp 1s ease-out;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 229, 255, 0.1), rgba(57, 197, 187, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::before {
            opacity: 1;
        }

        @keyframes fadeInUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(0, 229, 255, 0.4);
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            background: linear-gradient(45deg, #00695C, #00BCD4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .card-content {
            color: #004D40;
            line-height: 1.8;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        /* Skills Section */
        .skill-category {
            margin-bottom: 25px;
        }

        .category-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #00695C;
            margin-bottom: 15px;
            text-align: left;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: flex-start;
        }

        .skill-tag {
            background: linear-gradient(45deg, #00E5FF, #39C5BB);
            color: white;
            padding: 10px 18px;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 500;
            box-shadow: 0 6px 20px rgba(0, 229, 255, 0.3);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .skill-tag::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .skill-tag:hover::before {
            left: 100%;
        }

        .skill-tag:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 229, 255, 0.4);
            background: linear-gradient(45deg, #39C5BB, #00D4AA);
        }

        /* Portfolio Gallery */
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .portfolio-item {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .portfolio-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 229, 255, 0.1), rgba(57, 197, 187, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-item:hover::before {
            opacity: 1;
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: rgba(0, 229, 255, 0.4);
        }

        .portfolio-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #00BCD4;
        }

        .portfolio-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #00695C;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .portfolio-desc {
            font-size: 0.95rem;
            color: #006064;
            position: relative;
            z-index: 1;
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            padding: 18px 25px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            text-decoration: none;
            color: #004D40;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .contact-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 229, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .contact-item:hover::before {
            left: 100%;
        }

        .contact-item:hover {
            background: rgba(0, 229, 255, 0.2);
            border-color: rgba(0, 229, 255, 0.4);
            transform: translateX(10px);
            color: #00695C;
        }

        /* About Section Enhancement */
        .about-highlights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .highlight-item {
            background: rgba(0, 229, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid rgba(0, 229, 255, 0.2);
        }

        .highlight-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #00BCD4;
        }

        .highlight-text {
            font-size: 0.9rem;
            color: #00695C;
            font-weight: 500;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 30px;
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: #006064;
            font-size: 1.1rem;
            animation: fadeIn 2s ease-out;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 229, 255, 0.05), rgba(57, 197, 187, 0.05));
        }

        .footer-content {
            position: relative;
            z-index: 1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .name { font-size: 2.5rem; }
            .content-grid { 
                grid-template-columns: 1fr;
                gap: 25px;
            }
            .profile-pic { width: 150px; height: 150px; font-size: 60px; }
            .container { padding: 15px; }
            .card { padding: 25px; }
            .header { padding: 30px; }
        }

        @media (max-width: 480px) {
            .name { font-size: 2rem; }
            .card { padding: 20px; }
            .header { padding: 25px; }
            .skill-list { justify-content: center; }
            .about-highlights { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <!-- Floating design elements -->
    <div class="design-element element-1">🎨</div>
    <div class="design-element element-2">✨</div>
    <div class="design-element element-3">🖌️</div>
    <div class="design-element element-4">💎</div>
    <div class="design-element element-5">🌟</div>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="profile-pic">👤</div>
            <h1 class="name">อภิวิชญ์ สุลำนาจ</h1>
            <p class="title">✧ Graphic Designer & Visual Creator ✧</p>
            <p class="subtitle">สมัครตำแหน่งนักศึกษาฝึกงาน Graphic Design</p>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- About Me -->
            <div class="card">
                <h2 class="card-title">
                    <span>🎨</span> เกี่ยวกับตัวฉัน <span>🎨</span>
                </h2>
                <div class="card-content">
                    <p>สวัสดีครับ! ผมเป็น Graphic Designer มือใหม่ที่มีความหลงใหลในการออกแบบและสร้างสรรค์ผลงานที่สวยงาม</p>
                    <br>
                    <p>มีประสบการณ์ในการพัฒนาเว็บไซต์ ชอบการออกแบบ UI/UX และสนใจเทคโนโลジีใหม่ๆ ที่เข้ามาช่วยในการสร้างสรรค์ผลงาน</p>
                    
                    <div class="about-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">🎯</div>
                            <div class="highlight-text">มุ่งมั่นเรียนรู้</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">💡</div>
                            <div class="highlight-text">คิดสร้างสรรค์</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">🤝</div>
                            <div class="highlight-text">ทำงานเป็นทีม</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Skills -->
            <div class="card">
                <h2 class="card-title">
                    <span>⚡</span> ทักษะและความสามารถ <span>⚡</span>
                </h2>
                <div class="card-content">
                    <div class="skill-category">
                        <div class="category-title">🎨 Design Software</div>
                        <div class="skill-list">
                            <span class="skill-tag">Photoshop</span>
                            <span class="skill-tag">Illustrator</span>
                            <span class="skill-tag">Figma</span>
                            <span class="skill-tag">Canva</span>
                        </div>
                    </div>
                    
                    <div class="skill-category">
                        <div class="category-title">💻 Web Development</div>
                        <div class="skill-list">
                            <span class="skill-tag">HTML5</span>
                            <span class="skill-tag">CSS3</span>
                            <span class="skill-tag">JavaScript</span>
                            <span class="skill-tag">React</span>
                        </div>
                    </div>
                    
                    <div class="skill-category">
                        <div class="category-title">🎯 Design Skills</div>
                        <div class="skill-list">
                            <span class="skill-tag">UI/UX Design</span>
                            <span class="skill-tag">Branding</span>
                            <span class="skill-tag">Typography</span>
                            <span class="skill-tag">Color Theory</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio -->
            <div class="card">
                <h2 class="card-title">
                    <span>🌟</span> ผลงานที่ผ่านมา <span>🌟</span>
                </h2>
                <div class="card-content">
                    <div class="portfolio-grid">
                        
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div class="card">
                <h2 class="card-title">
                    <span>🎓</span> ประวัติการศึกษา <span>🎓</span>
                </h2>
                <div class="card-content">
                    <div class="about-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">🏫</div>
                            <div class="highlight-text">มหาวิทยาลัยกาฬสินธุ์</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">📚</div>
                            <div class="highlight-text">คณะวิทยาศาสตร์และเทคโนโลยีสุขภาพ</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">🎓</div>
                            <div class="highlight-text">สาขาเทคโนโลยีสารสนเทศและดิจิทัล</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">📊</div>
                            <div class="highlight-text">เกรดเฉลี่ย 3.32</div>
                        </div>
                    </div>
                    <br>
                    <p><strong>รหัสนักศึกษา:</strong> 6514200020005-9</p>
                    <p><strong>สถานะ:</strong> กำลังศึกษาอยู่ ปีการศึกษา 2567</p>
                    <br>
                    <p><strong>เป้าหมาย:</strong> ต้องการเรียนรู้และพัฒนาทักษะด้าน Graphic Design ในสภาพแวดล้อมการทำงานจริง เพื่อนำประสบการณ์ไปต่อยอดในอนาคต</p>
                </div>
            </div>

            <!-- Hobbies & Interests -->
            <div class="card">
                <h2 class="card-title">
                    <span>💫</span> งานอดิเรกและความสนใจ <span>💫</span>
                </h2>
                <div class="card-content">
                    <div class="about-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">🎵</div>
                            <div class="highlight-text">ฟังเพลง<br>& Audio Design</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">✨</div>
                            <div class="highlight-text">Anime<br>& Visual Arts</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">📸</div>
                            <div class="highlight-text">Photography<br>& Aesthetics</div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">🎨</div>
                            <div class="highlight-text">Digital Art<br>& Illustration</div>
                        </div>
                    </div>
                    <br>
                    <p>ความสนใจเหล่านี้ช่วยสร้างแรงบันดาลใจและเสริมสร้างความคิดสร้างสรรค์ในการออกแบบ</p>
                </div>
            </div>

            <!-- Contact -->
            <div class="card">
                <h2 class="card-title">
                    <span>📧</span> ช่องทางการติดต่อ <span>📧</span>
                </h2>
                <div class="card-content">
                    <div class="contact-grid">
                        <a href="mailto:aphiwit@example.com" class="contact-item">
                            <span>📧</span>
                            <span>aphiwit@example.com</span>
                        </a>
                        <a href="https://github.com/aphiwit" class="contact-item" target="_blank">
                            <span>🔗</span>
                            <span>GitHub Portfolio</span>
                        </a>
                        <a href="https://linkedin.com/in/aphiwit" class="contact-item" target="_blank">
                            <span>💼</span>
                            <span>LinkedIn Profile</span>
                        </a>
                        <a href="tel:+66123456789" class="contact-item">
                            <span>📱</span>
                            <span>+66 12 345 6789</span>
                        </a>
                        <a href="#" class="contact-item">
                            <span>🎨</span>
                            <span>Design Portfolio</span>
                        </a>
                        <a href="#" class="contact-item">
                            <span>📄</span>
                            <span>Download Resume</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <p><strong>✧ พร้อมเริ่มต้นการเรียนรู้และสร้างสรรค์ผลงานใหม่ๆ ✧</strong></p>
                <br>
                <p>🎨 หากท่านสนใจผลงานของผม หรือต้องการพูดคุยเพิ่มเติม</p>
                <p>ยินดีรับการติดต่อทุกเวลา เพื่อโอกาสในการเรียนรู้และพัฒนาร่วมกัน 🎨</p>
            </div>
        </div>
    </div>
</body>
</html
