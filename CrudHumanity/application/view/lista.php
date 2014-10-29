<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
    </head>
    <body>	
        <p>
            <a href="index.php?page=insert">Add User</a>
	    <a href="index.php?page=json">Upload json file</a>
        </p>
        <table border="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th colspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($array['lista'])) :
                    print '<tr>
                               <td>' . $row['firstname'] . '</td>
                               <td>' . $row['lastname'] . '</td>
                               <td>' . $row['email'] . '</td>
                               <td><a href="index.php?page=edit&id=' . $row['userid'] . '"/>Update</a></td>
                               <td><a href="index.php?page=delete&id=' . $row['userid'] . '"/>Delete</a></td>
                           </tr>';
                endwhile;
                ?>
            </tbody>
        </table>
    </body>
</html>
