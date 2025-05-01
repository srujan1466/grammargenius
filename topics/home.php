<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammar Genius - Master English Grammar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fd;
            color: #333;
        }
        
        .header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            padding: 2rem;
            color: white;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .tagline {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }
        
        .buttons {
            margin-top: 1.5rem;
        }
        
        .btn {
            background-color: #fff;
            color: #6a11cb;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: bold;
            margin: 0 0.5rem;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            background-color: #FF9A3C;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #ff8921;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .intro {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #6a11cb;
        }
        
        .intro p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .topics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .topic-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        
        .topic-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }
        
        .topic-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .topic-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        .topic-desc {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.5;
        }
        
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1rem;
            color: #777;
            font-size: 0.9rem;
        }
        
        /* Simple floating animation for decoration */
        .decoration {
            position: absolute;
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.2);
            user-select: none;
            pointer-events: none;
        }
        
        #comma1 { top: 20%; left: 10%; }
        #question1 { top: 15%; left: 30%; }
        #exclamation1 { top: 25%; left: 70%; }
        #comma2 { top: 60%; left: 15%; }
        #question2 { top: 70%; left: 80%; }
        
        @media (max-width: 768px) {
            .topics-grid {
                grid-template-columns: 1fr;
            }
            
            .logo {
                font-size: 2rem;
            }
            
            .tagline {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="decoration" id="comma1">,</div>
        <div class="decoration" id="question1">?</div>
        <div class="decoration" id="exclamation1">!</div>
        <div class="decoration" id="comma2">,</div>
        <div class="decoration" id="question2">?</div>
        
        <div class="logo">Grammar Genius</div>
        <p class="tagline">Where Language Rules Come to Life!</p>
        
        <div class="buttons">
            <?php
            if (isset($_SESSION["username"])) {
                echo "<p style='font-size: 1.2rem;'>Hello, <strong>" . htmlspecialchars($_SESSION["username"]) . "</strong>!</p>";
                echo "<br>";
                echo "<button class='btn btn-primary' onclick=\"window.location.href='../php/logout.php'\">Logout</button>";

            } else {
                echo "<button class='btn' onclick=\"window.location.href='login.html'\">Login</button>";
                echo "<button class='btn btn-primary' onclick=\"window.location.href='register.html'\">Get Started</button>";
            }
            ?>
        </div>
        
    </header>
    
    <div class="container">
        <div class="intro">
            <h2>Master English Grammar the Fun Way</h2>
            <p>Welcome to Grammar Genius, your ultimate resource for mastering English grammar! Whether you're a student, professional, educator, or language enthusiast, our interactive lessons and exercises will help you strengthen your grammar skills. Join our community today and transform the way you understand and use language!</p>
        </div>
        
        <div class="topics-grid">
            <div class="topic-card" onclick="window.location.href='parts_of_speech.html'">
                <div class="topic-icon">📝</div>
                <h3 class="topic-title">Parts of Speech</h3>
                <p class="topic-desc">Nouns, verbs, adjectives, adverbs, pronouns, prepositions, conjunctions, and interjections - the building blocks of language.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='tenses.html'">
                <div class="topic-icon">⏱️</div>
                <h3 class="topic-title">Tenses</h3>
                <p class="topic-desc">Past, present, future, and their perfect and continuous forms - master when things happen in time.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='subject_verb_agreement.html'">
                <div class="topic-icon">🤝</div>
                <h3 class="topic-title">Subject-Verb Agreement</h3>
                <p class="topic-desc">Learn the art of making subjects and verbs work together harmoniously in your sentences.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='active_passive_voice.html'">
                <div class="topic-icon">🔄</div>
                <h3 class="topic-title">Active and Passive Voice</h3>
                <p class="topic-desc">Discover when to put the actor front and center, and when to shine the spotlight on the action itself.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='direct_indirect_speech.html'">
                <div class="topic-icon">💬</div>
                <h3 class="topic-title">Direct and Indirect Speech</h3>
                <p class="topic-desc">Master the art of reporting what others say, both directly and indirectly.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='articles.html'">
                <div class="topic-icon">🔤</div>
                <h3 class="topic-title">Articles (a, an, the)</h3>
                <p class="topic-desc">Those tiny words that make a huge difference - learn when and how to use them correctly.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='prepositions.html'">
                <div class="topic-icon">🔍</div>
                <h3 class="topic-title">Prepositions</h3>
                <p class="topic-desc">Above, below, through, and beyond - navigate the world of relationship words with confidence.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='punctuation.html'">
                <div class="topic-icon">❗</div>
                <h3 class="topic-title">Punctuation</h3>
                <p class="topic-desc">Commas, periods, question marks, and more - give your writing the right rhythm and clarity.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='sentence_structure.html'">
                <div class="topic-icon">🏗️</div>
                <h3 class="topic-title">Sentence Structure</h3>
                <p class="topic-desc">From simple to compound-complex - build sentences that are both powerful and precise.</p>
            </div>
            
            <div class="topic-card" onclick="window.location.href='common_errors.html'">
                <div class="topic-icon">⚠️</div>
                <h3 class="topic-title">Common Errors in English</h3>
                <p class="topic-desc">Spot and fix the most frequent mistakes that even native speakers make.</p>
            </div>
        </div>
        
        <div class="footer">
            © 2025 Grammar Genius. All grammar rules respectfully followed.
        </div>
    </div>
</body>
</html>