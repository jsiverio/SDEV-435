<?php
require 'Scripts/Classes/User.php';
require 'Scripts/Include/DBSetup.php';
require 'Scripts/Include/functions.php';
?>

<select class="form-select" id="examiner" name="examiner">
                          <?php
                            $results = getExaminers($conn);
                            foreach ($results as $result) {
                              $name = ucfirst($result[1]) . " " . ucfirst($result[2]);
                                echo '<option value="'.$result[0].'">'.$name.'</option>';
                              }?>
                      </select>