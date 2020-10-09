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
    </form>
  </body>
</html>
