<?php
if(isset($row)){
echo "
<div class='card'>
        <!-- image -->
        <div class='image-wrapper'>
          <a href='http://localhost:3000/pages/medicine-page-template.php?slug=".$row["slug"]." ' class='card__image-link'>
            <img
              class='card__image'
              src='". $row["imageURL"]."'
              alt='". $row["name"]."'
            />
          </a>
        </div>

        <!-- status -->
        <div class='status-wrapper'>
          <!-- labels -->
          <div class='label-wrapper'>
            <span class='card__tag'>". $row["category"]."</span>
          </div>
          <!-- icons -->
          <div class='icon-wrapper'>
            <i class='fa-solid fa-". $row["method"]."' title='". $row["methodText"]."'></i>
            <i class='fa-solid fa-". $row["ageC"]."' title='Çocuklar içindir'></i>
            <i class='fa-solid fa-". $row["ageA"]."' title='Yetişkinler içindir'></i>
          </div>
        </div>

        <!-- informations -->
        <div class='information-wrapper'>
          <div class='information-top-wrapper'>
            <h1 class='card__name'>". $row["name"]."</h1>
            <!-- rates -->
            <div class='rate-wrapper' title='". $row["powerText"]."'>
              (" . str_repeat("<i class='fa-solid fa-star'></i>",$row["power"]) . ")
            </div>
          </div>
          <!-- descriptions -->
          <p class='description-text'>
            <span class='card__purpose'>
            ". $row["purpose"]."
              <span class='card__instruction'>
              ". $row["instruction"]."
              </span>
            </span>
          </p>

          <!-- prescription alert -->
          <div class='card__prescription-container'>
          <p class='card__prescription-warning'>
            <a href='".$row["prescription"]."' class='card__prescription-link' title='&rx;' target='_blank'>prescription</a>
          </p>
          <a href='http://localhost:3000/pages/medicine-page-template.php?slug=".$row["slug"]." 'class='card__page-link'>
            <button class='card__page-btn'>More Info</button>
            </a>
          </div>
        </div>
      </div>
";
}
else{
  echo "Undefined variable error: \$row is not set.";
}
?>