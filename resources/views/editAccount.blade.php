<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Account</title>

</head>
<body>
<form method = "post" action = "">
    Old Email:  <input type="text" name = "oldE" value = "{{ $user->email }}"><br>
    New Email:  <input type="text" name = "newE"><br>
    Old Password:  <input type="password" name = "oldP"><br>
    New Password:  <input type="password" name = "newP"><br>
    Confirm Password:  <input type="password" name = "confirm"><br>

    <input type = "submit">

</form>
</body>
</html>