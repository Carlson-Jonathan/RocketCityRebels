<?php 
    $skaterPortraits = $db->prepare("SELECT * FROM skaters");
    $skaterPortraits->execute();
    $x = 1;

    while ($row = $skaterPortraits->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $number = $row['number'];
        $dob = $row['dob'];
        $start = $row['start'];
        $description = $row['description'];
        $image = $row['image'];

        $btnID = "myBtn" . $x;
        $modelID = "myModel" . $x;

        echo "
            <div class='gallery' id='$btnID'>
                <img src='../images/portraits/$image
                ' alt='Image file not found'>
            </div>

            <div id='$modelID' class='modal'>
                <div class='modal-content'>
                    <img src='../images/portraits/$image
                    ' alt='Image file not found' class='innerpic'>
                    <div class='textblock'>
                        <span class='popuptext'>Player name:
                        </span><br><p> $name</p><br>
                        <span class='popuptext'>Jersy number:
                        </span><br> $number</p><br>
                        <span class='popuptext'>Age:</span><br> 
                        $dob</p><br>
                        <p>Rebel Since $start</p>
                    </div>
                    <div class='line'></div>
                    <p style='margin-top: 15px; text-align: left'>
                    $description</p>
                </div>
            </div>

            <script>
            // Get the modal
            var modal" . $x . " = document.getElementById('$modelID');

            // Get the button that opens the modal
            var btn" . $x . " = document.getElementById('$btnID');

            // When the user clicks the button, open the modal 
            btn" . $x . ".onclick = function() {
              modal" . $x . ".style.display = 'block';
            }

            window.onclick = function(event) {
                switch (event.target) {
                    case modal1:
                        modal1.style.display = 'none';
                        break;
                    case modal2:
                        modal2.style.display = 'none';
                        break;
                    case modal3:
                        modal3.style.display = 'none';
                        break;
                    case modal4:
                        modal4.style.display = 'none';
                        break;
                    case modal5:
                        modal5.style.display = 'none';
                        break;
                    case modal6:
                        modal6.style.display = 'none';
                        break;
                    case modal7:
                        modal7.style.display = 'none';
                        break;
                    case modal8:
                        modal8.style.display = 'none';
                        break;
                    case modal9:
                        modal9.style.display = 'none';
                        break;
                    case modal10:
                        modal10.style.display = 'none';
                        break;
                    case modal11:
                        modal11.style.display = 'none';
                        break;
                    case modal12:
                        modal12.style.display = 'none';
                        break;
                    case modal13:
                        modal13.style.display = 'none';
                        break;
                    case modal14:
                        modal14.style.display = 'none';
                        break;
                    case modal15:
                        modal15.style.display = 'none';
                        break;
                    case modal16:
                        modal16.style.display = 'none';
                        break;
                    case modal17:
                        modal17.style.display = 'none';
                        break;
                    case modal18:
                        modal18.style.display = 'none';
                        break;
                    case modal19:
                        modal19.style.display = 'none';
                        break;
                    case modal20:
                        modal20.style.display = 'none';
                        break;
                    case modal21:
                        modal21.style.display = 'none';
                        break;
                    case modal22:
                        modal22.style.display = 'none';
                        break;
                    case modal23:
                        modal23.style.display = 'none';
                        break;
                    case modal24:
                        modal24.style.display = 'none';
                        break;
                    case modal25:
                        modal25.style.display = 'none';
                        break;
                    case modal26:
                        modal26.style.display = 'none';
                        break;
                    case modal27:
                        modal27.style.display = 'none';
                        break;
                    case modal28:
                        modal28.style.display = 'none';
                        break;
                    case modal29:
                        modal29.style.display = 'none';
                        break;
                    case modal30:
                        modal30.style.display = 'none';
                        break;
                    case modal31:
                        modal31.style.display = 'none';
                        break;
                    case modal32:
                        modal32.style.display = 'none';
                        break;
                    case modal33:
                        modal33.style.display = 'none';
                        break;
                    case modal34:
                        modal34.style.display = 'none';
                        break;
                    case modal35:
                        modal35.style.display = 'none';
                        break;
                    case modal36:
                        modal36.style.display = 'none';
                        break;
                    case modal37:
                        modal37.style.display = 'none';
                        break;
                    case modal38:
                        modal38.style.display = 'none';
                        break;
                    case modal39:
                        modal39.style.display = 'none';
                        break;
                    case modal40:
                        modal40.style.display = 'none';
                        break;
                    case modal41:
                        modal41.style.display = 'none';
                        break;
                    case modal42:
                        modal42.style.display = 'none';
                        break;
                    case modal43:
                        modal43.style.display = 'none';
                        break;
                    case modal44:
                        modal44.style.display = 'none';
                        break;
                    case modal45:
                        modal45.style.display = 'none';
                        break;
                    case modal46:
                        modal46.style.display = 'none';
                        break;
                    case modal47:
                        modal47.style.display = 'none';
                        break;
                    case modal48:
                        modal48.style.display = 'none';
                        break;
                    case modal49:
                        modal49.style.display = 'none';
                        break;
                    case modal50:
                        modal50.style.display = 'none';
                        break;
                    case modal51:
                        modal51.style.display = 'none';
                        break;
                    case modal52:
                        modal52.style.display = 'none';
                        break;
                    case modal53:
                        modal53.style.display = 'none';
                        break;
                    case modal54:
                        modal54.style.display = 'none';
                        break;
                    case modal55:
                        modal55.style.display = 'none';
                        break;
                    case modal56:
                        modal56.style.display = 'none';
                        break;
                    case modal57:
                        modal57.style.display = 'none';
                        break;
                    case modal58:
                        modal58.style.display = 'none';
                        break;
                    case modal59:
                        modal59.style.display = 'none';
                        break;
                    case modal60:
                        modal60.style.display = 'none';
                        break;
                }
            }
            </script>
        ";
        $x++;
    }
?>