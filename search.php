<?php

include 'koneksi.php';

// $param = "%{$_POST['txt']}%";
// $stmt = $conn->prepare("SELECT * FROM konser WHERE nama LIKE ?");
// $stmt->bind_param("s", $param);
// $stmt->execute();
// $result = $stmt->get_result();

// var_dump($result);

// $stmt->execute(array('nama' => $param));

// while ($names = $getName->fetch(PDO:: FETCH_ASSOC)){
//     echo '<div>' .$names["nama"]. '</div>';
// };


$text = strip_tags(htmlspecialchars($_POST['txt']));

// $getName = $conn->prepare("SELECT * FROM konser WHERE nama LIKE concat('%', :nama, '%') ");
$getName = $pdo->prepare("select * from konser where nama like '%$text%' or nama like '%$text%'");
// $getName->execute(array('nama' => $text));
$getName->execute();

while ($names = $getName->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="sheila">';
    echo '<a href="sheila.html"> <img src="sheila.png"></a>';
    echo '<p>'.$names["nama"].'</p>';
    echo '</div>';
};
