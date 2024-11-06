<div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Notes Details
                        <a href="../all_notes.php" class="float-right">View All Notes</a>
                    </div>

                    <div class="card-body dirty-white">
                        <div class="container my-4">
                            <ul class="row list-unstyled">
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM `tbl_notes`");
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach ($result as $row) {
                                    $noteID = $row['tbl_notes_id'];
                                    $noteTitle = $row['note_title'];
                                    $noteContent = $row['note'];
                                    $noteDateTime = $row['date_time'];
                                    $formattedDateTime = date('m/d/Y  |  H:i', strtotime($noteDateTime));

                                ?>
                                    <a href="viewing_note.php?view=<?php echo $noteID ?>" class=" p-2 col-12 col-md-4 col-lg-3 g-4">
                                        <div class="note-card border position-relative " style = "background-color: <?php echo $row['bg_color'] ?>">
                                       

                                            <div class = "note-header position-relative">
                                                <span class = " position-absolute w-100 " style = "margin-top: -1.5em;">
                                                     <h2 class = "text-center"><i class=" fa-brands fa-pinterest-p"></i></h2> 
                                                </span>
                                               

                                                <p class = "break-line mt-2 mb-2">  <span class = "invi">blank</span></p>
                                            </div>

                                            
                                            <h3 class = "note-content note dancing-script mt-5"  style=""><?php echo $noteTitle ?></h3>
                                            <small class="block text-muted text-info position-absolute bottom-right p-2"> <?php echo $formattedDateTime ?></small>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>