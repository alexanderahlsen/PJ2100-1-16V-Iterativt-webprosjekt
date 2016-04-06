<?php
        // create unique token
        $form_token = uniqid();
 
        // commit token to session
        $_SESSION['user_token'] = $form_token;
        ?>
<div class="page-header">
  <h1>Send inn en nyhet <small>Fyll ut skjema under</small></h1>
</div>

<form name="submitarticle" action="form_submit.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
	<div class="form-group">
		
		<input type="hidden" name="user_token" value="<?php echo  $_SESSION['user_token'];  ?>" />
		<input type="hidden" name="kategori" value="1">
	
		<label for="tittel">Tittel</label>
		<input type="text" name="tittel" class="form-control" placeholder="Tittel på nyheten">
		
		<label for="tittel">Dato</label>
		<input type="date" name="dato" class="form-control">
		
		<div class="form-group">
			<label for="tittel">Bilde</label>
			<input type="file" name="bilde" class="form-control" placeholder="Tittel på nyheten">
			 <p class="help-block">Filtyper: JPG, JPEG, PNG & GIF - Maks størrelse: 10MB</p>
		</div>
		
		<label for="tittel">Avdeling</label>
		<select class="form-control" name="avdeling">
			<option value="1">Avdeling for kommunikasjon</option>
			<option value="2">Avdeling for Kunstfag</option>
			<option value="4">Avdeling for Teknologi</option>
			<option value="3">Hele Campus</option>
		</select>
		
		<label for="tittel">Ingress</label>
		<textarea class="form-control" rows="2" name="ingress" placeholder="Skriv inn en kort ingress til artikkelen"></textarea>
		
		<label for="tittel">Artikkelen</label>
		<textarea class="form-control" id="artikkel" name="artikkel" placeholder="Skriv din artikkel, html tillatt.">&nbsp;</textarea>
		
		<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <input type="submit" name="submit" class="btn btn-default" value="Send inn">
	    </div>
	  </div>
    <script>
        CKEDITOR.replace( 'artikkel' );
    </script>
    </form>
    </table>
  </td>
</tr>
</table>