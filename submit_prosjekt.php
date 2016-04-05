<?php
        // create unique token
        $form_token = uniqid();
 
        // commit token to session
        $_SESSION['user_token'] = $form_token;
        
        echo $_SESSION['user_token'];
        ?>

<table border="1">
  <tr>
    <td align="center">Send inn et prosjekt!</td>
  </tr>
  <tr>
  <td>
  <table>
    <form name="submitarticle" action="form_submit.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
	<input type="hidden" name="user_token" value="<?php echo  $_SESSION['user_token'];  ?>" />
	<input type="hidden" name="kategori" value="2">
    <tr>
      <td>Tittel</td>
      <td><input type="text" name="tittel" size="20">
      </td>
    </tr>
    <tr>
      <td>Dato:</td>
      <td><input type="date" name="dato">
      </td>
    </tr>
    <tr>
      <td>Bilde (url)</td>
      <td><input type="file" name="bilde" id="bilde">
      </td>
    </tr>
    <tr>
      <td>Avdeling</td>
      <td>
	    <select name="avdeling">
		 	<option value="1">Avdeling for kommunikasjon</option>
		 	<option value="2">Avdeling for Kunstfag</option>
		 	<option value="4">Avdeling for Teknologi</option>
		 	<option value="3">Hele Campus</option>
		</select> 
      </td>
    </tr>
    <tr>
      <td>Ingress</td>
      <td>
	     <textarea rows="2" cols="50" name="ingress">Skriv en kort ingress til artikkelen.</textarea> 
      </td>
    </tr>
    <tr>
      <td>Beskrivelse</td>
      <td>
	     <textarea id="artikkel" name="artikkel">Skriv din beskrivelse, html tillatt.</textarea> 
      </td>
    </tr>
    <tr>
      <td></td>
      <td align="right"><input type="submit" name="submit" value="Sent"></td>
    </tr>
    <script>
        CKEDITOR.replace( 'artikkel' );
    </script>
    </form>
    </table>
  </td>
</tr>
</table>