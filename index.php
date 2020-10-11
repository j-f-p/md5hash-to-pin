<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Brute MD5 Inverter</title>
  </head>
  <body>
    <h1>MD5 Hash Inverter</h1>

    <h2>About</h2>
    <p>This web document provides a tool to invert an MD5 hash of a string
    consisting of a one-digit integer. The inverter employs a brute-force
    search to determine the string associated with the MD5 hash.</p>

    <h2>Inverter</h2>
    <form>
      <input type="text" name="md5hash"
        placeholder="Enter MD5 hash here."
        pattern="[0-9a-f]{32}" title="a 32 digit hexadecimal value"
        maxlength="32" size="48" required autofocus>
      <br><br>
      <input type="reset" value="clear field">
      <input type="submit" value="submit">
    </form>

    <?php
      if( isset($_GET["md5hash"]) ) {
        if( preg_match("/[0-9a-f]{32}/", $_GET["md5hash"]) ) {
          $pinHash = $_GET["md5hash"];

          for( $i=0; $i<10; $i++ ) $digits[] = (string)$i;

          $found = false;

          foreach( $digits as $val )
            if( $pinHash===md5($val) ) {
              $result = "Pin is $val.\n";
              $found = true;
              break;
            }

          if(!$found) $result = "Pin not found.\n";
        }
        else # HTML form filter did not work (faulty browser?).
          $result = 'Error: An invalid MD5 hash was entered.';

        echo "<h3>Result</h3>";
        echo "<p>" . $result . "</p>";
      }
    ?>
  </body>
</html>
