<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hora de volar!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="views/scripts" method="POST">  
      <div class="modal-body">
        <label for="user">Email o nombre de usuario</label>
        <input placeholder="Ingresa tu Email o Nombre de usuario" type="text" class="form-control" name="user" id="user">
        <label for="password">Contraseña</label>
        <input placeholder="Ingresa tu contraseña" type="password" class="form-control" name="password" id="password">
         
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success w-100">Iniciar sesión</button>
      </div>
      </form>
    </div>
  </div>
</div>