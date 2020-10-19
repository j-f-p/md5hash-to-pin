<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Brute MD5 Inverter</title>
  </head>
  <body>
    <h1>MD5 Hash Inverter</h1>

    <h2>About</h2>
    <p>This web document provides a tool to invert an MD5 hash of a
    four-character string consisting of decimal digits, that is, a 4-digit PIN.
    The inverter employs a brute-force search to determine the PIN associated
    with the MD5 hash.</p>

    <h2>Inverter</h2>
    <form>
      <input type="text" name="md5hash"
        placeholder="Enter MD5 hash here."
        pattern="[0-9a-f]{32}" title="a 32 digit hexadecimal value"
        maxlength="32" size="48" required autofocus>
      <br><br>
      <input type="reset" value="clear field">
      <input type="submit" name="process" value="submit">
    </form>

    <?php
      if( isset($_GET["clear"]) )
        unset($_GET["process"]);
      else if( isset($_GET["process"]) ) {
        if( preg_match("/[0-9a-f]{32}/", $_GET["md5hash"]) ) {
          define("pinHash", $_GET["md5hash"]); # invariant: pinHash is constant
          $found = false;

          for( $i=0; $i<10; $i++ )
            if( pinHash===md5("000" . $i) ) {
              $result = "PIN is 000$i";
              $found = true;
              break;
            }
          if(!$found) {
            for( $i=10; $i<100; $i++ )
              if( pinHash===md5("00" . $i) ) {
                $result = "PIN is 00$i.";
                $found = true;
                break;
              }
            if(!$found) {
              for( $i=100; $i<1000; $i++ )
                if( pinHash===md5("0" . $i) ) {
                  $result = "PIN is 0$i.";
                  $found = true;
                  break;
                }
              if(!$found){
                for( $i=1000; $i<10000; $i++ )
                  if( pinHash===md5($i) ) {
                    $result = "PIN is $i.";
                    $found = true;
                    break;
                  }
                if(!$found) $result = "PIN was not found.";
              }
            }
          }
        }
        else # HTML form filter did not work (faulty browser?).
          $result = "Error: An invalid MD5 hash was entered.";

        echo "<h3>Result</h3>";
        echo "<p>" . $result . "</p>";
        echo "<form>";
        echo "  <input type=\"submit\" name=\"clear\" value=\"clear result\">";
        echo "</form>";
      }
    ?>
  </body>
</html>
