<?php
session_start();
$pageTitle = 'Amnon Sisay | Personal Portfolio';
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$status = $_GET['status'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The personal portfolio of Amnon Sisay, a Grade 12 student interested in technology, drawing, mathematics and aviation.">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header>
    <nav>
      <a class="brand" href="#home">Amnon Sisay</a>
      <ul>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#interests">Interests</a></li>
        <li><a href="#goal">My Goal</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  <div class="hero" id="home">
    <div class="hero-inner">
      <img class="avatar" src="img/profile-photo.jpg" alt="Amnon’s chosen profile picture">
      <div>
        <div class="eyebrow">Grade 12 Student · Gondar, Ethiopia</div>
        <h1>Hello, I'm Amnon Sisay.</h1>
        <p>I'm a student at Kings Academy who enjoys learning new things, building my skills and thinking about what I want to do in the future. Welcome to my personal portfolio!</p>
        <a class="button" href="#about">Get to know me</a>
      </div>
    </div>
  </div>

  <main>
    <section id="about">
      <h2>About Me</h2>
      <p>My name is Amnon Sisay. I'm 18 years old and currently in Grade 12 at Kings Academy in Gondar, Ethiopia. I am interested in technology and creative work, and I like improving step by step. I know that I still have a lot to learn, but I'm ready to keep practicing and take on new challenges.</p>
    </section>

    <section id="skills">
      <h2>My Skills</h2>
      <p class="muted">These are some skills I have started learning and developing.</p>
      <ul class="skills">
        <li>HTML</li><li>CSS</li><li>Drawing</li><li>Mathematics</li>
      </ul>
    </section>

    <section id="interests">
      <h2>My Interests</h2>
      <div class="two-col">
        <div class="card">
          <h3>Creative and technical interests</h3>
          <p class="muted">I enjoy drawing and learning how websites are made. I also like exploring ideas and finding out how things work.</p>
        </div>
        <div class="card">
          <h3>Learning and problem solving</h3>
          <p class="muted">Mathematics gives me a chance to think through problems. I'm also interested in learning more about airplanes and aviation.</p>
        </div>
      </div>
    </section>

    <section id="goal">
      <h2>My Future Goal</h2>
      <div class="card">
        <h3>I want to become a pilot.</h3>
        <p class="muted">One of my biggest goals is to become a pilot. I know it takes hard work, responsibility and a lot of learning. For now, I am focused on my education and building a strong foundation for my future.</p>
      </div>
    </section>

    <section id="projects">
      <h2>Projects and Achievements</h2>
      <p class="muted">I haven't added any projects or achievements here yet. I'll update this section as I complete work I'm proud of.</p>
    </section>

    <section id="contact" class="contact">
      <h2>Contact Me</h2>
      <p>If you would like to get in touch, you can email me or send a message using the form below.</p>
      <p><strong>Email:</strong> <a href="mailto:abBA888@gmail.com">abBA888@gmail.com</a></p>
      <p><strong>Location:</strong> Gondar, Ethiopia</p>
      <?php if ($status === 'success'): ?>
        <p class="notice success">Your message was sent successfully. Thank you!</p>
      <?php elseif ($status === 'error'): ?>
        <p class="notice error">Sorry, your message could not be sent. Please check the fields and try again.</p>
      <?php endif; ?>
      <form class="contact-form" action="message.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
        <p><label for="name">Your name</label><br><input id="name" name="name" type="text" maxlength="100" required></p>
        <p><label for="email">Your email</label><br><input id="email" name="email" type="email" maxlength="150" required></p>
        <p><label for="subject">Subject</label><br><input id="subject" name="subject" type="text" maxlength="150" required></p>
        <p><label for="message">Message</label><br><textarea id="message" name="message" rows="5" maxlength="3000" required></textarea></p>
        <button class="button" type="submit">Send message</button>
      </form>
    </section>
  </main>
  <footer>© <?= date('Y') ?> Amnon Sisay · Personal Portfolio</footer>
</body>
</html>
