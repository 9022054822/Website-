<?php
// ----------------------
// Database Connection
// ----------------------
$host = "localhost";
$user = "root";
$pass = "";
$db   = "roomlify.login";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ----------------------
// Fetch Rooms + Search Filter
// ----------------------
$search = "";
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $search = $conn->real_escape_string($_GET['q']);

    // SEARCH FILTER (Only address + location)
    $sql = "SELECT * FROM rooms 
            WHERE address LIKE '%$search%' 
            OR location LIKE '%$search%' 
            ORDER BY id DESC";
} else {
    // Normal
    $sql = "SELECT * FROM rooms ORDER BY id DESC";
}

$result = $conn->query($sql);
$rooms = [];
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rooms[] = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Rooms</title>

  <style>


 /* Hero section  */

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



 /* body  */


    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(120deg, #000000, #001f3f);
      margin: 0;
      padding: 0;
      color: #fff;
    }
    .container1 {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      border-radius: 10px;
    }
    .top-row1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }
    .top-row1 h2 {
      color: #f3d6d6;
    }
    .listings-grid1 {
      display: flex;
      flex-wrap: wrap;
      gap: 28px;
      justify-content: center;
    }
    .listing-card1 {
      background-color: rgba(43, 45, 45, 0.5);
      border-radius: 10px;
      outline: 2px solid #0a1dea;
      overflow: hidden;
      width: 270px;
      height:400px;
      box-shadow: 0 4px 15px rgba(123, 189, 207, 0.5);
      transition: transform 0.3s ease;
    }

    .listing-card1:hover {
      transform: scale(1.05);
    }
    .listing-card1 img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
      background: #ccc;
    }
    .listing-content1 {
      padding: 12px;
    }
    .listing-content1 h3 {
      margin: 4px 0;
      color: #fff;
      font-size: 18px;
    }
    .price {
      color: #8df0a0;
      font-weight: 700;
      margin: 6px 0;
    }
    .details {
      color: #e6eef7;
      margin: 4px 0;
      font-size: 14px;
    }
    .details a {
      color: #4da3ff;
      text-decoration: none;
      font-weight: bold;
    }
    .details a:hover {
      text-decoration: underline;
    }
    .card-actions {
      padding: 10px;
    }
    .view-btn {
      width: 100%;
      padding: 8px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-weight: 700;
      background: #667fd7;
      text-align: center;
      color: #fff;
      align-items: center;
      display: flex;
      justify-content: center;
      transition: background 0.3s ease;
    }
    .view-btn:hover {
      background: #4c68c4;
    }
    .no-list {
      padding: 24px;
      text-align: center;
      color: #fff;
      opacity: 0.9;
    }

    /* Modal */

    .modal {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      align-items: center;
      justify-content: center;
      z-index: 999;
    }
    .modal.open {
      display: flex;
    }
    .modal-body {
      background: #fff;
      color: #000;
      border-radius: 10px;
      max-width: 600px;
      width: 90%;
      padding: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
      position: relative;
    }
    .modal-body img {
      width: 100%;
      border-radius: 6px;
      margin-top: 8px;
    }
    .modal-close {
      position: absolute;
      top: 8px;
      right: 12px;
      cursor: pointer;
      font-size: 22px;
      font-weight: bold;
      color: #cc0000;
    }
    .meta {
      font-size: 15px;
      margin: 8px 0;
    }
  </style>
</head>
<body>

  <!-- SEARCH BAR-->
  
<section class="hero">
    <div class="container hero-content">
      <h2>Find Your Perfect Room, Now !</h2>
      <p>Browse affordable student room listings in your area. No middlemen, no hidden fees. Just comfortable living.</p>
      <form class="search-form" method="GET">
        <input type="text" name="q" placeholder="Search by area or city..." />
        <button type="submit">Search</button>
    </form>
    </div>
  </section>

  </div>
  <div class="avl">
   
  </div>

<div class="container1">
  <div class="top-row1">
    <h2></h2>
  </div>

  <div id="listingsContainer" class="listings-grid1">
    <?php if (!empty($rooms)): ?>
      <?php foreach ($rooms as $r): ?>
        <div class="listing-card1">

          <!-- IMAGE -->
          <img src="<?php echo !empty($r['image']) ? htmlspecialchars($r['image']) : 'noimage.png'; ?>" alt="Room Image">

          <div class="listing-content1">
            <h3><?php echo htmlspecialchars($r['title']); ?></h3>
            <div class="price">₹<?php echo htmlspecialchars($r['rent']); ?>/month</div>

            <div class="details">
              <strong>Address:</strong> <?php echo htmlspecialchars($r['address']); ?>
            </div>

            <div class="details">
              <strong>📍 Location:</strong>
              <a href="https://www.google.com/maps?q=<?php echo urlencode($r['location']); ?>" target="_blank">Open in Maps</a>
            </div>
          </div>

          <div class="card-actions">
            <button class="view-btn"
                    data-owner="<?php echo htmlspecialchars($r['owner_name']); ?>"
                    data-rent="<?php echo htmlspecialchars($r['rent']); ?>"
                    data-gender="<?php echo htmlspecialchars($r['gender']); ?>"
                    data-address="<?php echo htmlspecialchars($r['address']); ?>"
                    data-mobile="<?php echo htmlspecialchars($r['mobile']); ?>"
                    data-pincode="<?php echo htmlspecialchars($r['pincode']); ?>"
                    data-location="<?php echo htmlspecialchars($r['location']); ?>"
                    data-title="<?php echo htmlspecialchars($r['title']); ?>"
                    data-image="<?php echo htmlspecialchars($r['image']); ?>">
              View Details
            </button>
          </div>

        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="no-list">
        अभी कोई listing उपलब्ध नहीं है।
        <a href="addroom.php" style="color:#9fe1ff;">Add a room</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Modal -->
<div id="detailsModal" class="modal" aria-hidden="true">
  <div class="modal-body" role="dialog" aria-modal="true">
    <span id="closeModal" class="modal-close">✕</span>
    <div id="modalContent"></div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('detailsModal');
  const modalContent = document.getElementById('modalContent');
  const closeModal = document.getElementById('closeModal');

  document.body.addEventListener('click', (e) => {
    if (e.target.classList.contains('view-btn')) {
      const r = e.target.dataset;
      modalContent.innerHTML = `
        <h2 style="margin-top:0">${r.title}</h2>
        <div class="meta"><strong>Owner:</strong> ${r.owner}</div>
        <div class="meta"><strong>Rent:</strong> ₹${r.rent}</div>
        <div class="meta"><strong>Gender:</strong> ${r.gender}</div>
        <div class="meta"><strong>Address:</strong> ${r.address}</div>
        <div class="meta"><strong>Mobile:</strong> ${r.mobile}</div>
        <div class="meta"><strong>Pincode:</strong> ${r.pincode}</div>
        <div class="meta"><strong>📍 Location:</strong> <a href="https://www.google.com/maps?q=${encodeURIComponent(r.location)}" target="_blank">Open in Maps</a></div>
        <img src="${r.image.length ? r.image : 'noimage.png'}" alt="room-image">
      `;
      modal.classList.add('open');
      modal.setAttribute('aria-hidden', 'false');
    }
  });

  closeModal.addEventListener('click', () => {
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden', 'true');
  });

  window.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.classList.remove('open');
      modal.setAttribute('aria-hidden', 'true');
    }
  });
});
</script>

</body>
</html>
