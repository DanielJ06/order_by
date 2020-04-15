<?php
    require 'connection.php';
    if(isset($_GET['order_by']) && !empty($_GET['order_by'])) {
        $order = addslashes($_GET['order_by']);
        $sql = "SELECT * FROM users ORDER BY {$order}";
    } else {
        $order = '';
        $sql = "SELECT * FROM users";
    }
?>

<form method="get">
    <select name="order_by" onchange="this.form.submit()">
        <option 
            value="name" 
            <?php echo($order=='name')?'selected="selected"':'';?>
        >Order by name</option>
        <option 
            value="age"
            <?php echo($order=='age')?'selected="selected"':'';?>
        >Order by age</option>
    </select>
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
    </tr>

    <?php

    $sql = $db->query($sql);
    if($sql->rowCount() > 0) {
        foreach($sql->fetchAll() as $user) {
            echo "<tr>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['age']}</td>";
            echo "</tr>";
        }
    }
    ?>
</table>