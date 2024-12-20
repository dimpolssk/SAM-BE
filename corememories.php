<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-purple.css">
  <style>
    body,
    h1,
    h2 {
      font-family: "Verdana"
    }

    body,
    html {
      height: 100%;
      background-color: #fef7ff; 
    }

    p {
      line-height: 2;
    }

    .bgimg,
    .bgimg2 {
      min-height: 100%;
      background-position: center;
      background-size: cover;
    }

    .bgimg, .bgimg2 {
      min-height: 100%;
      background-position: center;
      background-size: cover;
    }
    .bgimg {
      background-image: url('<?php echo $bg_image_url; ?>');
    }

    .island-btn {
      width: 100%;
    }
    @media screen and (max-width: 600px) {
  .custom-img {
    width: 100%; /* Full width on smaller screens */
    height: auto; /* Maintain aspect ratio */
  }
}
.my-portfolio-button {
  margin-top: 45%; 
}

  </style>
</head>

<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corememories";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>


  <?php
  // Include the database connection
  include('db_connection.php');

  // Query the islandsOfPersonality table
  $sql = "SELECT * FROM `islandsOfPersonality`;";
  $result = $conn->query($sql);

  // Check if the query returns rows
  if ($result->num_rows > 0) {
    $islands = [];
    while ($row = $result->fetch_assoc()) {
      $islands[] = $row;
    }
  }
  ?>

  <!-- Team Container -->
  <?php
  $islands = [
    [
      'name' => 'Technology Island',
      'image' => 'technology_island.jpg',
    ],
    [
      'name' => 'Family Island',
      'image' => 'family_island.jpg',
    ],
    [
      'name' => 'Hobby Island',
      'image' => 'hobbies_island.jpg',
    ],
    [
      'name' => 'Friendship Island',
      'image' => 'friendship_island.jpg',
    ],
  ];
  ?>
<body id="myPage" class="w3-theme-l5;">

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="header.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">
  </div>
</div>

  <!-- HTML Section -->
  <div class="w3-container w3-padding-64 w3-center" id="team">
    <h2><b>Island of Personality</b></h2>
    <p>Flowing Through the Shores of my Identity</p>

    <div class="w3-row"><br>
      <?php foreach ($islands as $island): ?>
        <div class="w3-quarter">
          <img src="<?php echo $island['image']; ?>" alt="Island" style="width:45%" class="w3-circle w3-hover-opacity">
          <h3><?php echo $island['name']; ?></h3>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

<!-- ISLAND CONTENT -->
<?php
$sql = "SELECT * FROM islandContents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($island = $result->fetch_assoc()) {
    echo "<div class='w3-row w3-padding-64'>";

    if ($island['image'] == 'technology_island.jpg' || $island['image'] == 'hobbies_island.jpg') {
      echo "<div class='w3-col l6 m12 s12 w3-padding-large'>";
      echo "<img src='" . htmlspecialchars($island['image']) . "' alt='Island' class='w3-image w3-hover-opacity w3-round'>";
      echo "</div>";
      echo "<div class='w3-col l6 m12 s12 w3-padding-large' id='" . htmlspecialchars($island['id']) . "'>";
    } else {
      echo "<div class='w3-col l6 m12 s12 w3-padding-large' id='" . htmlspecialchars($island['id']) . "'>";
    }

    $color = '';
    switch ($island['image']) {
      case 'technology_island.jpg':
        $color = 'green';
        $title = 'Technology Island';
        break;
      case 'family_island.jpg':
        $color = 'gold';
        $title = 'Family Island';
        break;
      case 'hobbies_island.jpg':
        $color = 'deeppink';
        $title = 'Hobbies Island';
        break;
      case 'friendship_island.jpg':
        $color = 'blue';
        $title = 'Friendship Island';
        break;
    }

    echo "<h1 class='w3-center'><span style='color:" . $color . "'><b>" . $title . "</b></span></h1><br>";
    echo "<h3 class='w3-center w3-col l12 m12 s12 '>" . htmlspecialchars($island['content']) . "</h3>";

    if ($island['image'] == 'technology_island.jpg') {
      echo "<p class='w3-center'><a href='/portfolio/index.html' class='w3-button w3-black w3-round w3-padding-large w3-large my-portfolio-button'>My Portfolio</a></p>";
    }

    echo "</div>";

    if ($island['image'] == 'family_island.jpg' || $island['image'] == 'friendship_island.jpg') {
      echo "<div class='w3-col l6 m12 s12 w3-padding-large'>";
      echo "<img src='" . htmlspecialchars($island['image']) . "' alt='Island' class='w3-image w3-hover-opacity w3-round'>";
      echo "</div>";
    }

    echo "</div>";
  }
} else {
  echo "<p class='w3-center'>No island content available.</p>";
}
?>

  <footer class="w3-container w3-padding-32 w3-theme-d4 w3-center">
    <h4>My Contact Details</h4>
    <a class="w3-button w3-large w3-purple" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
    <a class="w3-button w3-large  w3-purple" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
    <a class="w3-button w3-large  w3-purple" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
    <a class="w3-button w3-large  w3-purple" href="javascript:void(0)" title="Instagram"><i class="fa fa-instagram"></i></a>
  </footer>
  </div>
  
</body>

</html>


</body>

</html>