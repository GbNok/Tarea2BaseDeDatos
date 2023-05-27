<div class="columns">
    <div class="column is-4 is-offset-4">
        <form action="/login.php" method="POST" class="box">
            <h2 class="subtitle">Iniciar Sesión</h2>
            <?php if (!empty($success_message)): ?>
                <article class="message is-success">
                    <div class="message-header">
                        <p>Exito!</p>
                    </div>
                    <div class="message-body">
                        <?= $success_message ?>
                    </div>
                </article>
            <?php endif ?>
            <?php if (!empty($error_message)): ?>
                <article class="message is-warning">
                    <div class="message-header">
                        <p>Error</p>
                    </div>
                    <div class="message-body">
                        <?= $error_message ?>
                    </div>
                </article>
            <?php endif ?>
            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left">
                    <input class="input is-danger" type="email" name="email" placeholder="correo@mail.usm.cl" value="<?= $email ?? '' ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control has-icons-left">
                    <input name="password" class="input is-danger" type="password" placeholder="make it long">
                    <span class="icon is-small is-left">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
            </div>
            <button class="button is-primary">Entrar</button>
        </form>
    </div>
</div>
