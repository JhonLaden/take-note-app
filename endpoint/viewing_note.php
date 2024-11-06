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
    if(isset($_GET['view'])){
        $noteID = $_GET['view'];
        // Retrieve the note from the database based on the ID
        $stmt = $conn->prepare("SELECT * FROM `tbl_notes` WHERE tbl_notes_id = :note_id");
        $stmt->bindParam(':note_id', $noteID);
        $stmt->execute();
        $note = $stmt->fetch(PDO::FETCH_ASSOC);

        $noteDateTime = $note['date_time'];
        $formattedDateTime = date('m/d/Y  |  H:i', strtotime($noteDateTime));
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
                <div class="card position-relative" >
                    <div class="card-body py-4 position-relative " style = "background-color: transparent; ">

                        <div class = "parent-custom-card">
                            
                            <div class="custom-card " style = "background-color: <?php echo $note['bg_color'];?>"></div>
                        </div>

                        <div class = "position-relative">
                            <input type="hidden" name="note_id" value="<?php echo $note['tbl_notes_id']; ?>">
                            <small class="block text-muted text-info " style =" z-index: 10;"> <?php echo $formattedDateTime ?></small>

                            <div class = "d-flex justify-content-between pb-4 my-4" style = "border-bottom: 1px solid black;">
                                <h2 ><?php echo $note['note_title']; ?></h2>
                                <a  href="update_note.php?edit=<?php echo $noteID ?>">
                                    <i class="fa-solid fa-pen-to-square" style = "font-size: 1.5rem;"></i>
                                </a>
                            </div>

                            <span class = "pb-5">
                                <p>
                                    <?php echo nl2br($note['note']); ?>
                                </p>
                            </span>


                        </div>
                        <div class = "position-absolute px-4 py-2" style = "bottom:0; right:0;">

                        <button onclick="delete_note('<?php echo $noteID ?>')" type="button" class=" d-flex align-items-center btn btn-dark danger-button ">
                            <i class="fa-solid fa-trash mr-1"></i>
                            <p class = "p-0 m-0">Delete</p>
                        </button>
                    </div>
                    </div>
                    
                    
                </div>
            </div>
            


            <!--  Update and Delete Notes -->
            <?php 
                include_once('view_notes.php');
            ?>

            <div class = "position-absolute " style = "bottom: 0; right: 0;" >
                <button onclick="add_note()"class = "btn btn-dark btn-lg" style = "border-radius: 50%;"   ><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        // Add 'add-height' class after the page loads
        $('.custom-card').addClass('add-height');
    });

    function delete_note(id) {

        if (confirm("Do you confirm to delete this note?")) {
            window.location = "delete_note.php?delete=" + id
        }
    }

    function add_note() {
        window.location = "../";
    }

</script>
</body>
</html>