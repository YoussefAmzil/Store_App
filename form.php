<div class="modal fade" tabindex="-1" role="dialog" id="sign">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><center>
        <h4 class="modal-title"><i  class="glyphicon glyphicon-user prefix" aria-hidden="true"></i> CRÉEZ VOTRE COMPTE</h4></center>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" id="register">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nom:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom " style="width: 200px;height: 30px;" name="name" required="required">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Adresse:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputEmail3" placeholder="Adresse" style="width: 200px;height: 30px;" name="adresse" required="required">
      </textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"> téléphone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="N° téléphone" style="width: 200px;height: 30px;" name="tele" required="required">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Email" style="width: 200px;height: 30px;" name="email_sign" required="required">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mot-passe</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="Mot-passe" style="width: 200px;height: 30px;" name="pass_sign" required="required">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">conf Mot-passe</label>
    <div class="col-sm-10" required="required">
      <input type="password" class="form-control" id="inputEmail3" placeholder="confirmation mot passe" style="width: 200px;height: 30px;" name="pass_sign2">
    </div>
  </div>
<div id="register_response"></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Créez">
      </div>
      </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>