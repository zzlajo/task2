<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add user</title>
    </head>
    <body>
        <form method="POST" action="data.php">
            First Name : <input type="text" name="firstname" value="<?php isset($array['firstname']) ? print $array['firstname']  : NULL ?>" /> <br /> 
            Last Name : <input type="text" name="lastname" value="<?php isset($array['lastname']) ? print $array['lastname']  : NULL ?>" /> <br /> 
            Email : <input type="text" name="email" value="<?php isset($array['email']) ? print $array['email']  : NULL ?>" /> <br /> 
            <input type="hidden" name="userid" value="<?php isset($array['userid']) ? print $array['userid']  : NULL ?>" />
            <input type="submit" value="Submit" /> 
            <input type="hidden" name="form" value="user">
            <a href="index.php">Back</a>
        </form>
    </body>
</html>
