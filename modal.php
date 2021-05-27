<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="registerHeader">
                <h5 class="modal-title" id="exampleModalLabel">Registrazione</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='post' action='registered.php'>
                    <div class='form-group'>
                        <label>Nome</label>
                        <input type='text' class='form-control w-50' placeholder='Nome' required name='nome'>
                    </div>
                    <div class='form-group'>
                        <label>Cognome</label>
                        <input type='text' class='form-control w-50' placeholder='Cognome' required name='cognome'>
                    </div>
                    <div class='form-group'>
                        <label >Email</label>
                        <input type='email' class='form-control w-50' id='exampleInputEmail1' placeholder='E-mail' required name='email'>
                    </div>
                    <div class='form-group'>
                        <label >Password</label>
                        <input type='password' class='form-control w-50' id='exampleInputPassword1' placeholder='Password' required name='psw' minlength="8">
                    </div>
                    <div class='form-group'>
                        <label>Codice Fiscale</label>
                        <input type='text' class='form-control w-50' placeholder='Codice Fiscale' required name='codFisc' pattern="^[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]$">
                    </div>
                    <div class='form-group'>
                        <label>Via</label>
                        <input type='text' class='form-control w-50' placeholder='Via' required name='via'>
                    </div>
                    <div class='form-group'>
                        <label>Numero Civico</label>
                        <input type='number' class='form-control w-50' placeholder='Numero Civico' required name='numeroCivico'>
                    </div>
                    <div class='form-group'>
                        <label>Codice Postale</label>
                        <input type='number' class='form-control w-50' placeholder='Codice Postale' required name='CAP'>
                    </div>
                    <div class='form-group'>
                        <label>Città</label>
                        <input type='text' class='form-control w-50' placeholder='Città' required name='citta'>
                    </div>
                    <button type='submit' class='btn btn-primary'>Registrati</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header" id="loginHeader">
        <h5 class="modal-title" id="exampleModalLabel">Log-in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" action="checkLogin.php">
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control w-50" id="loginEmail" name="email" placeholder="example@example.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control w-50" id="loginPsw" name="psw" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Accedi</button>
        </form>
    </div>
    <div class="modal-footer">
    <!--    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        <button type="button" class="btn btn-primary">Invia</button>-->
    </div>
</div>
</div>
</div>