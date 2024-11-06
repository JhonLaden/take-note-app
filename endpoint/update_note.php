<?php
include('../conn/conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the note ID from the form
    $noteID = $_POST['note_id'];
    
    // Retrieve the note from the database based on the ID
    $stmt = $conn->prepare("SELECT * FROM `tbl_notes` WHERE tbl_notes_id = :note_id");
    $stmt->bindParam(':note_id', $noteID);
    $stmt->execute();
    $note = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // If not submitted, get note ID from URL parameter
    if(isset($_GET['edit'])){
        $noteID = $_GET['edit'];
        
        // Retrieve the note from the database based on the ID
        $stmt = $conn->prepare("SELECT * FROM `tbl_notes` WHERE tbl_notes_id = :note_id");
        $stmt->bindParam(':note_id', $noteID);
        $stmt->execute();
        $note = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take-Note App</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">

    
    <style>
        /* Custom CSS */
        .main-panel, .card {
            margin: auto;
            height: 90vh;
            overflow-y: auto;
        }
        
          .note-content {
            max-height: 20em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

    </style>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
        <a class="navbar-brand" href="#">Take-Note App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Vew Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log Out</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-panel mt-4 ml-5 col-11">
        <div class="row">

            <!-- Update Note -->
            <div class="col-md-4 border-right">
                <div class="card">
                    <div class="card-header">
                        Update Note
                    </div>
                    <div class="card-body " >
                        <form method="post" action="update_note_process.php">
                            <input type="hidden" name="note_id" value="<?php echo $note['tbl_notes_id']; ?>">
                            <div class="form-group">
                                <label for="noteTitle">Title</label>
                                <input type="text" class="form-control" id="noteTitle" name="note_title" value="<?php echo $note['note_title']; ?>">
                            </div>
                            <div class="form-group">
                            <label for="options">Color</label>
                                <?php 
                                    // Retrieve the colors from the database
                                    $query = $conn->prepare("SELECT * FROM color;");
                                    $query->execute();
                                    $colors = $query->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array
                                ?>
                                <select id="options" name="color">
                                        <?php foreach($colors as $color): ?>
                                            <option value="<?php echo htmlspecialchars($color['name']); ?>"
                                                <?php echo ($color['name'] === $note['bg_color']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($color['color_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note_content" rows="23"><?php echo $note['note']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary">Update</button>
                            <button href="../index.php" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            

            <!--  Update and Delete Notes -->
            <?php 
                include_once('view_notes.php');
            ?>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>