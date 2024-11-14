<?php
include('../conn/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take-Note App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <base href="endpoint/">  --> <!-- ERROR IMG PATH WAS HERE -->
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
        
        

    </style>

</head>
<body>
    

        <div class = "" style = "width: 95%; margin: auto; margin-top: 1em;">
            <div style = "height: 50px; width: 100px; ">
                <img class ="img-fluid w-100 h-100" src="../notepuff.jpg" alt="Logo">
            </div>
        </div>


    <div class="main-panel mt-4 ml-5 col-11">
        <div class="row">

            <!-- Add Note -->
            <div class="col-md-4 border-right">
                <div class="card">
                    <div class="card-header">
                        Add Note
                    </div>
                    <div class="card-body">
                        <form method="post" action="add_note.php">
                            <div class="form-group">
                                <label for="noteTitle">Title</label>
                                <input type="text" class="form-control" id="noteTitle" name="note_title" placeholder="Title">
                                <small id="emailHelp" class="form-text text-muted">Title of your note</small>
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
                                            <option value="<?php echo htmlspecialchars($color['name']); ?>">
                                                <?php echo htmlspecialchars($color['color_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note_content" rows="23" placeholder = "Content"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">

                                <button onclick ="add_note()" type="submit" class="btn btn-secondary">Add Entry</button>
                            </div>
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