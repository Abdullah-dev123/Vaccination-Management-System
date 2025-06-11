<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Vaccination Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #121212;
      color: #ffffff;
    }

    header {
      background-color: #1f1f1f;
      padding: 20px;
      text-align: center;
      border-bottom: 1px solid #333;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    header h1 {
      font-size: 2.5rem;
      color: #00bcd4;
      text-shadow: 0 2px 4px rgba(0, 188, 212, 0.3);
    }

    nav {
      background-color: #1a1a1a;
      display: flex;
      justify-content: center;
      padding: 15px 0;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    nav a {
      color: #ccc;
      text-decoration: none;
      margin: 0 10px;
      padding: 8px 20px;
      transition: all 0.3s;
      border-radius: 5px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav a:hover {
      background-color: #00bcd4;
      color: #000;
      transform: translateY(-2px);
    }

    nav a i {
      font-size: 1rem;
    }

    .login-btn {
      background-color: #00bcd4;
      color: #000 !important;
      font-weight: 600 !important;
    }

    .hero {
      padding: 120px 20px;
      text-align: center;
      background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
      position: relative;
      overflow: hidden;
      min-height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2070&auto=format&fit=crop') center/cover;
      opacity: 0.1;
      z-index: 0;
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 800px;
      margin: 0 auto;
    }

    .hero h2 {
      font-size: 3rem;
      margin-bottom: 20px;
      color: #ffffff;
      line-height: 1.2;
    }

    .hero p {
      font-size: 1.3rem;
      color: #cccccc;
      margin: 20px 0 40px;
      line-height: 1.6;
    }

    .cta-buttons {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .hero button {
      background-color: #00bcd4;
      color: #000;
      padding: 15px 30px;
      border: none;
      border-radius: 6px;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(0, 188, 212, 0.3);
      min-width: 180px;
    }

    .hero button:hover {
      background-color: #0097a7;
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(0, 188, 212, 0.4);
    }

    .secondary-btn {
      background-color: transparent !important;
      color: #00bcd4 !important;
      border: 2px solid #00bcd4 !important;
    }

    .secondary-btn:hover {
      background-color: rgba(0, 188, 212, 0.1) !important;
    }

    /* Stats Section */
    .stats {
      padding: 80px 20px;
      background-color: #1f1f1f;
      text-align: center;
    }

    .stats-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 0 auto;
      gap: 30px;
    }

    .stat-item {
      flex: 1;
      min-width: 200px;
    }

    .stat-number {
      font-size: 3rem;
      color: #00bcd4;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .stat-label {
      font-size: 1.2rem;
      color: #ccc;
    }

    /* Features Section */
    .features {
      padding: 80px 20px;
      background-color: #121212;
    }

    .features h2 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 60px;
      color: #00bcd4;
    }

    .features-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 40px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .feature-card {
      background-color: #1f1f1f;
      padding: 30px;
      border-radius: 10px;
      transition: transform 0.3s;
      border-bottom: 3px solid #00bcd4;
    }

    .feature-card:hover {
      transform: translateY(-10px);
    }

    .feature-icon {
      font-size: 2.5rem;
      color: #00bcd4;
      margin-bottom: 20px;
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .feature-card p {
      color: #aaa;
      line-height: 1.6;
    }

    /* Testimonials */
    .testimonials {
      padding: 80px 20px;
      background-color: #1a1a1a;
    }

    .testimonials h2 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 60px;
      color: #00bcd4;
    }

    .testimonial-container {
      max-width: 1000px;
      margin: 0 auto;
    }

    .testimonial {
      background-color: #1f1f1f;
      padding: 30px;
      border-radius: 10px;
      margin-bottom: 30px;
      position: relative;
    }

    .testimonial::before {
      content: '"';
      font-size: 5rem;
      color: #00bcd4;
      opacity: 0.2;
      position: absolute;
      top: 10px;
      left: 20px;
    }

    .testimonial p {
      font-size: 1.1rem;
      line-height: 1.8;
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .author-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #00bcd4;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #000;
      font-weight: bold;
    }

    .author-info h4 {
      color: #fff;
      margin-bottom: 5px;
    }

    .author-info p {
      color: #aaa;
      margin: 0;
      font-size: 0.9rem;
    }

    footer {
      background-color: #1f1f1f;
      text-align: center;
      padding: 30px;
      color: #777;
      border-top: 1px solid #333;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      text-align: left;
    }

    .footer-column h3 {
      color: #00bcd4;
      margin-bottom: 20px;
      font-size: 1.2rem;
    }

    .footer-column ul {
      list-style: none;
    }

    .footer-column ul li {
      margin-bottom: 10px;
    }

    .footer-column ul li a {
      color: #aaa;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-column ul li a:hover {
      color: #00bcd4;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-links a {
      color: #aaa;
      font-size: 1.5rem;
      transition: color 0.3s;
    }

    .social-links a:hover {
      color: #00bcd4;
    }

    .copyright {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid #333;
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .hero h2 {
      animation: fadeIn 0.8s ease-out;
    }

    .hero p {
      animation: fadeIn 0.8s ease-out 0.2s forwards;
      opacity: 0;
    }

    .cta-buttons {
      animation: fadeIn 0.8s ease-out 0.4s forwards;
      opacity: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      header h1 {
        font-size: 2rem;
      }
      
      nav {
        flex-wrap: wrap;
      }
      
      nav a {
        margin: 5px;
        padding: 8px 15px;
        font-size: 0.9rem;
      }
      
      .hero h2 {
        font-size: 2.2rem;
      }
      
      .hero p {
        font-size: 1.1rem;
      }
      
      .cta-buttons {
        flex-direction: column;
        gap: 15px;
      }
      
      .hero button {
        width: 100%;
      }
    }
  </style>
</head>
<body>


  <nav>
    <a href="index.php" class="active"><i class="fas fa-home"></i> Home</a>
    <a href="vaccines.php"><i class="fas fa-syringe"></i> Vaccines</a>
    <a href="appointments.php"><i class="fas fa-calendar-check"></i> Appointments</a>
    <a href="track_appointment.php"><i class="fas fa-search"></i> Track</a>
    <a href="login.php" class="login-btn"><i class="fas fa-user"></i> Login</a>
    <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
  </nav>

  <section class="hero">
    <div class="hero-content">
      <h2>Track & Manage Vaccinations Efficiently</h2>
      <p>Comprehensive digital solution for hospitals and parents to ensure timely and safe vaccinations for children.</p>
      <div class="cta-buttons">
        <button onclick="window.location.href='login.php'" class="primary-btn">Login</button>
        <button onclick="window.location.href='signup.php'" class="secondary-btn">Register</button>
      </div>
    </div>
  </section>

  <section class="stats">
    <div class="stats-container">
      <div class="stat-item">
        <div class="stat-number">10,000+</div>
        <div class="stat-label">Vaccines Administered</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">500+</div>
        <div class="stat-label">Happy Parents</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">50+</div>
        <div class="stat-label">Partner Hospitals</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">24/7</div>
        <div class="stat-label">Support Available</div>
      </div>
    </div>
  </section>

  <section class="features">
    <h2>Our Key Features</h2>
    <div class="features-container">
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-bell"></i>
        </div>
        <h3>Vaccine Reminders</h3>
        <p>Never miss a vaccination with our smart reminder system that alerts you before due dates.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <h3>Progress Tracking</h3>
        <p>Visualize your child's vaccination progress with intuitive charts and timelines.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-file-medical"></i>
        </div>
        <h3>Digital Records</h3>
        <p>Access vaccination certificates and medical records anytime, anywhere.</p>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <h2>What Our Users Say</h2>
    <div class="testimonial-container">
      <div class="testimonial">
        <p>This system has made managing my child's vaccinations so much easier. The reminders are a lifesaver!</p>
        <div class="testimonial-author">
          <div class="author-avatar">SP</div>
          <div class="author-info">
            <h4>Sarah Ahmed</h4>
            <p>Mother of 2</p>
          </div>
        </div>
      </div>
      <div class="testimonial">
        <p>As a pediatrician, I recommend this system to all my patients. It saves time and reduces errors in vaccination scheduling.</p>
        <div class="testimonial-author">
          <div class="author-avatar">DR</div>
          <div class="author-info">
            <h4>Dr. Fayyaz Raza</h4>
            <p>Pediatrician</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-content">
      <div class="footer-column">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="vaccines.php">Vaccines</a></li>
          <li><a href="appointments.php">Appointments</a></li>
          <li><a href="track_appointment.php">Track Appointment</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Account</h3>
        <ul>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Register</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Contact Us</h3>
        <ul>
          <li><i class="fas fa-phone"></i> +92 9847284710</li>
          <li><i class="fas fa-envelope"></i> info@vaccinationms.com</li>
          <li><i class="fas fa-map-marker-alt"></i> 123 Health Street, Hyderabad</li>
        </ul>
        <!-- <div class="social-links">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
        </div> -->
      </div>
    </div>
    <div class="copyright">
      &copy; 2025 Vaccination Management System. All rights reserved.
    </div>
  </footer>

</body>
</html>