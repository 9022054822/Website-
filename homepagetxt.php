<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Roomlify - Find Rooms, Flats & PG</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- NAVBAR -->
  <div class="Navbar">
    <?php include("Navbar.php"); ?>
  </div>
  <!-- SPACER FOR ALL PAGES -->
<div style="height:50px;"></div>

  <style>


 body {
  font-family: 'Poppins', sans-serif;
  background-color:white;
  color: #ffffff;
  line-height: 1.6;

  }



.container {
  width: 90%;
  max-width: 1200px;
  margin: auto;
}


/* Hero */
.hero {
  background: linear-gradient(135deg, #000000 0%, #001f3f 100%);
  padding: 80px 0;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
}

.hero h2 {
  font-size: 36px;
  color: #f1edef;
  margin-bottom: 20px;
}

.search-form {
  display: flex;
  gap: 10px;
  margin-top: 20px;
}

.search-form input {
  padding: 10px 15px;
  font-size: 16px;
  width: 300px;
  border-radius: 7px;
  border: none;
}

.search-form button {
  padding: 10px 20px;
  background-color: #0e0833;
  outline: 2px solid rgb(78, 95, 240); 
  border: none;
  color: #fff;
  font-weight: bold;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.search-form button:hover {
  background-color: #009acd;
}

/* Listings Section */


.room-listings {
  padding: 60px 0;
  background: linear-gradient(135deg, #000000 0%, #001f3f 100%);
  
}

.section-title {
  font-size: 28px;
  margin-bottom: 40px;
  text-align: center;
  color: #00bfff;
}

.rooms {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

.room-card {
  background-color: #2b2d2d52;
  border-radius: 8px;
  outline: 2px solid rgb(10, 29, 234); 
  overflow: hidden;
  width: 320px;
  box-shadow: 0 4px 15px rgba(123, 189, 207, 0.5);
  transition: transform 0.5s ease;
}

.room-card:hover {
  transform: scale(1.03);
}

.room-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.room-info {
  padding: 20px;
}

.room-info h4 {
  color: #00bfff;
  margin-bottom: 10px;
}

.room-info p {
  color: #ccc;
  margin-bottom: 15px;
}

.view-btn {
  background-color:#4897d7da;
  color: hsl(0, 0%, 6%);
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.view-btn:hover {
  background-color: #36c1a7;
}

/* Footer */
.footer {
  background-color: #101820;
  text-align: center;
  padding: 20px 0;
  margin-top: 40px;
  color: #aaa;
}



/* footer.css */
                                                                                        
.footer {
  background: linear-gradient(135deg, #000000 0%, #001f3f 100%);   
  padding: 40px 20px;
  height:500px;
  font-family: Arial, sans-serif;
  font-size: 14px;
  margin-top: 0px;
  color: #79a6bebd; 
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 1200px;
  margin: auto;
}

.footer-section {
  flex: 1 1 200px;
  margin-bottom: 40px;
}

.footer-section h2,
.footer-section h3 {
  margin-bottom: 15px;
  margin-top: 50px;
  font-size: 20px;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section ul li {
  margin-bottom: 8px;
}

.footer-section a {
  text-decoration: none;
  color: #73a3a7d2;
}

.footer-section a:hover {
  color: #149bfbcb;
}

.footer-divider {
  margin: 30px 0;
  border: none;
  margin-bottom: 30px;
  border-top: 1px solid #609792;
}

.footer-bottom {
  text-align: center;
  color: #f2eff3c3;
}

.footer-bottom a {
  color: #f6f4f7ca;
  text-decoration: none;
  margin: 0 5px;
}

.footer-bottom a:hover {
  text-decoration: underline;
}



/* ---- Contact icon pack (paste in your style block) ---- */
.contact-icons {
  display: flex;
  gap: 12px;
  margin-left: 60px;
  align-items: center;
  margin-top: 8px;
  flex-wrap: wrap;
}

.contact-icon {
  width: 33px;
  height: 33px;
  border-radius: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02));
  border: 1px solid rgba(255,255,255,0.06);
  box-shadow: 0 6px 18px rgba(0,0,0,0.35);
  transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
  text-decoration: none;
  color: white;
  position: relative;
  overflow: hidden;
}

/* icon colors / gradients */
.contact-icon.youtube { background: linear-gradient(135deg,#ff4b4b,#ff0000); }
.contact-icon.ig      { background: linear-gradient(135deg,#feda75,#d62976); }
.contact-icon.email   { background: linear-gradient(135deg,#6dd5ed,#2193b0); }
.contact-icon.whatsapp{ background: linear-gradient(135deg,#25D366,#128C7E); }

/* hover */
.contact-icon:hover {
  transform: translateY(-4px) scale(1.05);
  box-shadow: 0 12px 30px rgba(0,0,0,0.5);
}

/* svg inside */
.contact-icon svg {
  width: 20px;
  height: 20px;
  display: block;
  filter: drop-shadow(0 1px 1px rgba(0,0,0,0.25));
}

/* label text next to icons for accessibility */
.contact-labels {
  display:flex;
  flex-direction:column;
  gap:6px;
  margin-left:8px;
  color:#e6f3ff;
  font-size:14px;
}

/* container layout */
.contact-row {
  display:flex;
  align-items:center;
  gap:18px;
  flex-wrap:wrap;
}

/* small tooltip on hover (optional) */
.contact-icon::after {
  content: attr(data-title);
  position: absolute;
  bottom: calc(100% + 8px);
  left: 50%;
  transform: translateX(-50%) translateY(6px);
  background: rgba(0,0,0,0.75);
  color: #fff;
  padding:6px 8px;
  border-radius:6px;
  font-size:12px;
  opacity:0;
  pointer-events:none;
  transition: opacity .15s ease, transform .15s ease;
  white-space:nowrap;
}
.contact-icon:hover::after {
  opacity:1;
  transform: translateX(-50%) translateY(0);
}

/* responsive */
@media (max-width:520px){
  .contact-row { gap:10px; }
  .contact-labels { font-size:13px; }
}





</style>

 

<!-- Rest of your homepage code same as before-->




  <div class="Avl">
    <?php include("Available.php"); ?>
  </div>


    
    
  <!-- footer Area of Website -->
  
<link rel="stylesheet" href="footer.css" />

<footer class="footer">
  <div class="footer-container">

   
    <div class="footer-section">
      <h2>Roomlify.in</h2>
      <p>Your trusted partner in finding affordable rooms and PGs for students across India.</p>
    </div>

    
    <div class="footer-section">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="About.php">About Us</a></li>
        <li><a href="listing.php">List Your Property</a></li>
        <li><a href="/faq">FAQs</a></li>
        <li><a href="Contactpage.php">Contact</a></li>
      </ul>
    </div>

    
    <div class="footer-section">
      <h3>For Small Cities</h3>
      <ul>
        <li><a href="">Nagpur</a></li>
        <li><a href="">Nashik</a></li>
        <li><a href="">Amravati</a></li>
        <li><a href="">Shegaon</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="footer-section">
  <h3>Contact Us</h3>

  <div class="contact-row">
    <!-- icons -->
    <div class="contact-icons" aria-hidden="false">

      <a class="contact-icon youtube" href="" target="_blank" rel="noopener" data-title="YouTube पर देखें">
        <!-- YouTube SVG -->
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false" xmlns="">
          <path d="M23.5 6.2a3 3 0 0 0-2.1-2.12C19.6 3.5 12 3.5 12 3.5s-7.6 0-9.4.58A3 3 0 0 0 .5 6.2 31.6 31.6 0 0 0 0 12a31.6 31.6 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.12C4.4 20.5 12 20.5 12 20.5s7.6 0 9.4-.58a3 3 0 0 0 2.1-2.12A31.6 31.6 0 0 0 24 12a31.6 31.6 0 0 0-.5-5.8z" fill="#fff" opacity="0.95"/>
          <path d="M10 15.5l6-3.5-6-3.5v7z" fill="#000" />
        </svg>
    
      </a>

      <a class="contact-icon ig" href="" target="_blank" rel="noopener" data-title="Instagram पर देखें">
        <!-- Instagram SVG -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="3" width="18" height="18" rx="5" ry="5" fill="#fff" opacity="0.08"/>
          <path d="M12 8.2a3.8 3.8 0 1 0 0 7.6 3.8 3.8 0 0 0 0-7.6z" fill="#fff"/>
          <circle cx="17.5" cy="6.5" r="1.2" fill="#fff"/>
        </svg>
      </a>

      <a class="contact-icon email" href="" data-title="Email भेजें">
        <!-- Email SVG -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="2" y="4" width="20" height="16" rx="2" ry="2" fill="#fff" opacity="0.06"/>
          <path d="M4 7.5l8 6 8-6" stroke="#fff" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
      </a>

      <a class="contact-icon whatsapp" href="" target="_blank" rel="noopener" data-title="WhatsApp पर चैट करें">
        <!-- WhatsApp SVG -->
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2a10 10 0 1 0 9.9 11.6L22 22l-3.5-.9A10 10 0 0 0 12 2z" fill="#fff" opacity="0.06"/>
          <path d="M17.2 14.2c-.3-.1-1.8-.9-2.1-1s-.6-.1-.9.1c-.3.2-1 .6-1.3.7-.3.1-.6.1-.9-.1-.3-.2-1.2-.4-2.2-1.4-.8-.7-1.3-1.6-1.4-1.8-.1-.2 0-.4.1-.5.1-.2.3-.6.4-.9.1-.3 0-.6-.1-.9-.1-.3-1-2.4-1.4-3.2-.3-.8-.7-.7-.9-.7-.2 0-.5 0-.8 0s-1 .3-1.5.7c-.5.4-1 1-1 2.6s1 3 1.1 3.2c.1.2 1.7 3 4.1 4.3 2.4 1.2 2.4 1.1 2.8 1.1.3 0 1-.4 1.2-.8.2-.4.2-.8.1-.9-.1-.1-.4-.2-.7-.3z" fill="#fff"/>
        </svg>
      </a>

    </div>

    
  </div>

</div>

</div>
  <hr class="footer-divider" />

  <div class="footer-bottom">
    <p>&copy; 2025 Roomlify.in — </p>
    <p>
      <a href="/privacy-policy">Privacy Policy</a> |
      <a href="/terms">Terms & Conditions</a>
    </p>
  </div>
</footer>

</body>
</html>
