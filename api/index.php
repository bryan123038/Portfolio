<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $profile_name ?> | Portfolio</title>
  <link rel="stylesheet" href="/css.css">
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav>
      <div class="logo">MyPortfolio</div>
      <ul class="nav-links">
        <li><a href="#hero">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero -->
  <section id="hero" class="hero">
    <h1><?= $profile_name ?></h1>
    <p><?= $profile_title ?></p>
    <a href="#projects" class="btn">See My Work</a>
  </section>

  <!-- About -->
  <section id="about">
    <img src="<?= $profile_image ?>" alt="Profile">
    <div>
      <h2>About Me</h2>
      <p><?= $profile_bio ?></p>
    </div>
  </section>

  <!-- Skills -->
  <section id="skills">
    <h2>Skills</h2>
    <ul>
      <?php foreach($skills as $skill): ?>
        <li><?= $skill ?></li>
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- Projects -->
  <section id="projects">
    <h2>Projects</h2>
    <div class="portfolio-grid">
      <?php foreach($projects as $p): ?>
        <div class="card">
          <img src="<?= $p['image'] ?>" alt="<?= $p['title'] ?>">
          <h3><?= $p['title'] ?></h3>
          <p><?= $p['description'] ?></p>
          <p><strong>Tech:</strong> <?= implode(', ', $p['technologies']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="contact">
    <h2>Contact Me</h2>
    <?php foreach($social_links as $platform => $url): ?>
      <a href="<?= $url ?>" target="_blank"><?= $platform ?></a>
    <?php endforeach; ?>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; <?= date("Y") ?> <?= $profile_name ?>. All rights reserved.</p>
  </footer>

  <script src="/script.js"></script>
</body>
</html>
