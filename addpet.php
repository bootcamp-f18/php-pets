<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Put Your Pet Up For Adoption</title>
  </head>
  <body class="container mt-3">




<?php

    include("util/utilities.php");
    $db = getDb();
    $petList = pg_query($db, "SELECT p.id, p.name, p.species, p.breed, p.adoption_fee, cl.level, cl.description
FROM pets AS p
JOIN care_levels AS cl ON p.care_level_id = cl.id
WHERE is_adopted = false
ORDER BY name");

?>

    <h1>Put Your Pet Up For Adoption</h1>


    <form>
      <div class="form-group">
        <label for="petName">Pet Name</label>
        <input type="text" class="form-control" id="petName">
      </div>
      <div class="form-group">
        <label for="species">Species</label>
        <input type="text" class="form-control" id="species">
      </div>
      <div class="form-group">
        <label for="breed">Breed</label>
        <input type="text" class="form-control" id="breed">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description">
      </div>
      <div class="form-group">
        <label for="age_in_years">Age (in Years)</label>
        <input type="number" class="form-control" id="ageInYears">
      </div>
      <div class="form-group">
        <label for="weight_in_pounds">Weight In Pounds</label>
        <input type="number" class="form-control" id="weightInPounds">
      </div>
      <div class="form-group">
        <label for="care_description">Description of Care</label>
        <input type="text" class="form-control" id="careDescription">
      </div>
      <p>Is Your Pet Good With Kids?</p>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="isBadWithKids1" name="isBadWithKids1" class="custom-control-input">
        <label class="custom-control-label" for="isBadWithKids1">No</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="isGoodWithKids2" name="isGoodWithKids2" class="custom-control-input">
        <label class="custom-control-label" for="isGoodWithKids2">Yes</label>
      </div>


      <!-- ^^ toggle isn't working -->
<!--    <h3 class="mb-4 mt-4">List of Pets</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Species/Breed</th>
                <th>Care Level</th>
                <th>Adoption Fee</th>
            </tr>
        </thead>
        <tbody>

<?php
    while ($row = pg_fetch_assoc($petList)) {
?>
            <tr>
                <td><a href="detail.php?id=<?=$row["id"]?>"><?=$row["name"]?></a></td>
                <td><?=$row["species"]?><?php if ($row["breed"]) { echo ", " . $row["breed"]; } ?></td>
                <td data-toggle="tooltip" data-placement="bottom" title="<?=$row["description"]?>"><?=$row["level"]?></td>
                <td class="text-right">$<?=sprintf("%01.2f", $row["adoption_fee"]);?></td>
            </tr>
<?php
    }
?>

        </tbody>
    </table> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
