<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nineties Videogames</title>
    <!-- Retro pixel font -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html,
        body {
            height: 100%
        }

        /* Page background - CRT / starfield + scanline */
        body {
            font-family: 'Press Start 2P', monospace, system-ui, -apple-system;
            background: radial-gradient(ellipse at 20% 10%, rgba(255, 80, 120, 0.06) 0%, transparent 10%),
                radial-gradient(ellipse at 80% 90%, rgba(0, 160, 255, 0.04) 0%, transparent 12%),
                #081018;
            color: #e6f7ff;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            overflow: auto;
        }

        /* Container */
        .card {
            width: 100%;
            max-width: 1000px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.35));
            border: 4px solid #14f195;
            border-radius: 18px;
            padding: 1.25rem;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.7), inset 0 0 40px rgba(20, 241, 149, 0.03);
            position: relative;
            overflow: hidden;
        }

        /* Top glow bar */
        .topbar {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .logo .badge {
            width: 68px;
            height: 68px;
            border-radius: 6px;
            background: repeating-linear-gradient(45deg, #ff0077 0 4px, #ff9b00 4px 8px);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 18px rgba(255, 155, 0, 0.12), inset 0 -6px 18px rgba(0, 0, 0, 0.25);
        }

        .logo .badge span {
            font-size: 12px;
            line-height: 1;
            color: #081018
        }

        .logo h1 {
            font-size: 16px;
            color: #fff;
            letter-spacing: 1px
        }

        .logo p {
            font-size: 9px;
            color: #bfeefc;
            margin-top: 6px
        }

        /* Nav */
        nav {
            margin-left: auto;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 8px;
            border: 2px solid rgba(255, 255, 255, 0.06);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), transparent);
            color: #bff7ff;
            font-size: 11px;
            transition: all .18s ease;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        nav a:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(20, 241, 149, 0.14);
            border-color: #14f195;
            color: #fff
        }

        /* Main hero */
        .hero {
            display: grid;
            /*width: 75%;
            padding-left: 10%;
            padding-right: 10%;*/
            /*grid-template-columns: 1fr 380px;*/
            gap: 1rem;
            align-items: center;
            padding: 1rem;
        }

        .hero-left {
            padding: 1rem 1.25rem;
        }

        .eyebrow {
            font-size: 10px;
            color: #7ef1d1;
            margin-bottom: 10px
        }

        h2 {
            font-size: 28px;
            color: #fff;
            line-height: 1.05;
            margin-bottom: 12px
        }

        p.lead {
            font-size: 11px;
            color: #d7f9ff;
            max-width: 60%;
        }

        .cta-row {
            margin-top: 16px;
            display: flex;
            gap: 10px;
            align-items: center
        }

        .btn {
            display: inline-block;
            padding: 14px 16px;
            border-radius: 10px;
            background: linear-gradient(90deg, #ff6b6b, #ffb86b);
            color: #081018;
            text-decoration: none;
            font-size: 11px;
            border: 3px solid rgba(0, 0, 0, 0.2);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
            transition: transform .12s ease;
        }

        .btn:active {
            transform: translateY(2px)
        }

        .secondary {
            padding: 10px 12px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.03);
            border: 2px dashed rgba(255, 255, 255, 0.04);
            font-size: 10px;
            color: #bff7ff;
            text-decoration: none
        }

        /* Right panel - cartridge / game preview */
        .cartridge {
            background: linear-gradient(180deg, #121212 0, #0b1730 100%);
            border-radius: 10px;
            padding: 14px;
            border: 3px solid rgba(255, 255, 255, 0.03);
            box-shadow: inset 0 6px 20px rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
        }

        .cart-art {
            width: 100%;
            height: 220px;
            border-radius: 6px;
            background: repeating-linear-gradient(90deg, #0d2340 0 2px, #0b1730 2px 6px);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .cart-art .title {
            position: absolute;
            top: 8px;
            left: 8px;
            font-size: 9px;
            color: #ffdf7a
        }

        .cart-art .game-sprite {
            width: 120px;
            height: 120px;
            background: linear-gradient(180deg, #ff9b00, #ff2d77);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(255, 45, 119, 0.12)
        }

        .cart-meta {
            font-size: 9px;
            color: #bfeefc
        }

        /* Grid of featured games */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            margin-top: 16px
        }

        .game {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(0, 0, 0, 0.08));
            padding: 10px;
            border-radius: 8px;
            border: 2px solid rgba(255, 255, 255, 0.03);
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .game .thumb {
            width: 72px;
            height: 54px;
            border-radius: 6px;
            background: linear-gradient(180deg, #243b6a, #071228);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px
        }

        .game .meta {
            font-size: 10px;
            color: #dff8ff
        }

        .game small {
            display: block;
            color: #9fe6ee;
            margin-top: 6px;
            font-size: 9px
        }

        /* Footer */
        .footer {
            margin-top: 14px;
            border-top: 1px dashed rgba(255, 255, 255, 0.03);
            padding-top: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 9px;
            color: #9fe6ee
        }

        /* CRT scanline animation */
        .scanlines:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background-image: linear-gradient(rgba(255, 255, 255, 0.012) 50%, rgba(0, 0, 0, 0.06) 50%);
            background-size: 100% 4px;
            mix-blend-mode: overlay;
            pointer-events: none;
            opacity: 0.7;
            animation: scan 8s linear infinite;
        }

        @keyframes scan {
            from {
                transform: translateY(-2px)
            }

            to {
                transform: translateY(2px)
            }
        }

        /* small screens */
        @media (max-width:860px) {
            .hero {
                grid-template-columns: 1fr;
            }

            p.lead {
                max-width: 100%
            }

            .card {
                padding: .75rem
            }

            .logo h1 {
                font-size: 13px
            }
        }
        /* My own css format */
        form{
            display: flex;
            flex-direction: column;
            gap: 1rem;

        }
        .form-card{
            justify-self: center;
            width: 50%;
        }
        .form-card h1{
            margin-bottom: 1rem;
        }
        label{
            font-size: 10px;
            color: #bff7ff;
            margin-bottom: 0.4rem;
            display: block; /*Label is an inline element*/
        }
        input{/*cssgenerator.org*/ 
            width: 100%;
            padding: 12px;
            font-family: 'Press Start 2P', monospace;
            font-size: 10px;
            border-radius: 8px;
            border: 2px, solid rgb(255, 255, 255, 0.1);
            background-color: rgb(255, 255, 255, 0.05);
            color: white;
            transition: border-color .2s;
            outline: none;
        }
        input:focus{/*focus: you clicked in the field*/ 
            border-color: #14f195;
        }
    </style>
</head>

<body>
    <div class="card scanlines">
        <div class="topbar">
            <div class="logo">
                <div class="badge"><span>8‑BIT</span></div>
                <div>
                    <h1>Nineties Videogames</h1>
                    <p>Retro inspired landing — press start</p>
                </div>
            </div>

            <nav>
                <!-- Required link to views/f_register.php -->
                <a href="f_register.php" title="Register">REGISTER</a>
                <a href="f_login.php" >LOGIN</a>
                <a href="#collection">COLLECTION</a>
            </nav>
        </div>

        <section class="hero">
            <div class="form-card">
                <h1>Register New Account</h1>
                <form action="../controllers/RegistrationController.php" method="POST">
                    <div class="form-group">
                        <label for="f_username">Username</label>
                        <input type="text" name="f_username" id="usernameId">
                    </div>
                    <div class="form-group">
                        <label for="f_password">Password</label>
                        <input type="text" name="f_password" id="passwordId">
                    </div>
                    <div class="form-group">
                        <label for="f_password_confirm">Password confirm</label>
                        <input type="text" name="f_password_confirm" id="passwordConfirmId">
                    </div>
                    <div class="form-group">
                        <label for="f_email">E-mail</label>
                        <input type="text" name="f_email" id="emailId">
                    </div>
                    <button type="submit" class="btn" name="submit">REGISTER</button>
                </form>
            </div>
        </section>

        <div class="footer">
            <div>© <span id="year"></span> Nineties Videogames — built with pure HTML & CSS</div>
            <div>— press START to continue —</div>
        </div>
    </div>

    <script>
        // small nicety: set the year
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>