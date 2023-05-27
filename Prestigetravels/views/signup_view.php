
<div class="columns">
    <div class="column is-4 is-offset-4">
        <form action="/signup.php" method="POST" class="box">
            <h2 class="subtitle">Registrarse</h2>
            <div class="field">
                <label class="label">Usuario</label>
                <div class="control has-icons-left">
                    <input class="input<?= !empty($errors['name']) ? ' is-danger' : ''?>" type="text" name="name" placeholder="pepito" value="<?= $name ?? '' ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <?php if (!empty($errors['name'])): ?>
                <p class="help is-danger"><?= $errors['name'] ?></p>
                <?php endif ?>
            </div>
            
            <div class="field">
                <label class="label">Correo</label>
                <div class="control has-icons-left">
                    <input class="input<?= !empty($errors['email']) ? ' is-danger' : ''?>" type="text" name="email" placeholder="example@gmail.com" value="<?= $email ?? '' ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-email"></i>
                    </span>
                </div>
                <?php if (!empty($errors['email'])): ?>
                <p class="help is-danger"><?= $errors['email'] ?></p>
                <?php endif ?>
            </div>
            <div class="field">
                <label class="label">Correo</label>
                <div class="control has-icons-left">
                    <input class="input<?= !empty($errors['birth_date']) ? ' is-danger' : ''?>" type="date" name="birth_date" value="<?= $birth_date ?? '' ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-email"></i>
                    </span>
                </div>
                <?php if (!empty($errors['birth_date'])): ?>
                <p class="help is-danger"><?= $errors['birth_date'] ?></p>
            <?php endif ?>
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control has-icons-left">
                    <input class="input<?= !empty($errors['password']) ? ' is-danger' : ''?>" type="password" name="password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
                <?php if (!empty($errors['password'])): ?>
                <p class="help is-danger"><?= $errors['password'] ?></p>
                <?php endif ?>
            </div>
            <button class="button is-primary">Registrarse</button>
        </form>
    </div>
</div>