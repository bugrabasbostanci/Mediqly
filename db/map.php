<?php
echo "<div class='card'>
<!-- image -->
<div class='image-container'>
  <a href='null'>
    <img
      class='medicine-image'
      src='". $row["imageURL"]."'
      alt='". $row["name"]."'
    />
  </a>
</div>
<!-- labels, icons and rates -->
<div class='status-container'>
  <!-- labels -->
  <div class='label-container'>
    <span class='medicine-tag'>". $row["category"]."</span>
  </div>
  <!-- icons -->
  <div class='icon-container'>
    <i class='fa-solid fa-". $row["method"]."' title='". $row["methodText"]."'></i>
    <i class='fa-solid fa-". $row["ageA"]."' title='Yetişkinler içindir'></i>
    <i class='fa-solid fa-". $row["ageC"]."' title='Çocuklar içindir'></i> 
  </div>
  <!-- rates -->
  <div class='rate-container' title=". $row["powerText"].">

  " . str_repeat("<i class='fa-solid fa-star'></i>",$row["power"]) . "
  
  </div>
</div>
<!-- informations -->
<div class='information-container'>
  <h1 class='medicine-name'>". $row["name"]."</h1>
  <p class='medicine-purpose'>
    <b>Ne için kullanılır:</b> ". $row["purpose"]."
  </p>
  <p class='medicine-instruction'>
    <b>Nasıl kullanılır:</b> ". $row["instruction"]."
  </p>
  <p class='medicine-warning'>
    <i class='fa-solid fa-triangle-exclamation'></i>
    Kullanmadan önce prospektüse bakın
    <i class='fa-solid fa-triangle-exclamation'></i>
  </p>
  <a href='". $row["prescription"]."' class='medicine-prescription' target='_blank'>
    <button>Prospektüsü İncele</button>
  </a>
</div>
</div>"
?>