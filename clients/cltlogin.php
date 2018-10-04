<html>
    <center>
        <h1>Welcome to Band Manager!</h1></br>
        <h2>Please register as a client</h2>
        <div class="title" style="width: 400px; border: 25px solid green; padding: 25px; margin: 18px; text-align: left;">
        <form action="svraddclient.php" method="post">
            First Name: <input name="fName" type="text"></br>
            Last Name: <input name="lName" type="text"></br>
            Phone: <input name="phone" type="text"></br>
            Email: <input name="email" type="text"></br>
            How did you hear about us?  <input name="relation" type="text"></br>
            </div>
            </br>
            <input type="submit" name="submit" value="Register">
        </form>
        <br><br><h2>Log in for Existing CLients</h2>
        <form action="https://band-manager-okidailthief.c9users.io/events/clientviewevents.php" method="post">
            Enter Email: <input name="email" type="text"><br><br>
            <input type="submit" name="submit" value="Log In">
            </form>
    </center>
</html>
