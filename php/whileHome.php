<?php
while ($user_data = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($user_data['ddescription']) . "</td>";
    echo "<td>" . htmlspecialchars($user_data['assetNumber']) . "</td>";
    echo "<td>" . htmlspecialchars($user_data['location_description']) . "</td>";
    echo "<td>" . htmlspecialchars($user_data['responsible']) . "</td>";
    echo "<td>" . htmlspecialchars($user_data['dateCreation']) . "</td>";
    echo "<td id='status' hidden>" . htmlspecialchars($user_data['sstatus']) . "</td>";
    echo "<td id='icone'></td>";
    echo "</tr>";
}
