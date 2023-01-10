<form class="form-horizontal" action="./php/inscription.php" method="get">
<fieldset>

<!-- Form Name -->
<legend>Inscription</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nom">Nom</label>  
  <div class="col-md-4">
  <input id="nom" name="nom" type="text" placeholder="Nom" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prenom">Prenom</label>  
  <div class="col-md-4">
  <input id="prenom" name="prenom" type="text" placeholder="Prenom" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="date">Date de naissance</label>  
  <div class="col-md-4">
  <input id="date" name="date" type="text" placeholder="JJ/MM/AAAA" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="idcard">N°Carte d'Immatriculation</label>  
  <div class="col-md-4">
  <input id="idcard" name="idcard" type="text" placeholder="XXXXXXXXXXXXXXXXXXXXX" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="conducteur"></label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="conducteur">
      <input type="checkbox" name="conducteur" id="conducteur" value="1">
      Conducteur
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="immat">Plaque d'immatriculation</label>  
  <div class="col-md-4">
  <input id="immat" name="immat" type="text" placeholder="XXXXXXXXXX" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="modele">Modèle</label>  
  <div class="col-md-4">
  <input id="modele" name="modele" type="text" placeholder="Renault Clio 2015" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="id_permis">ID Permis de conduire</label>  
  <div class="col-md-4">
  <input id="id_permis" name="id_permis" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="assurance">Assurance</label>  
  <div class="col-md-4">
  <input id="assurance" name="assurance" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>
</br>
<div class="form-group">
	<button type="submit">Valide</button>
</div>

</fieldset>
</form>
