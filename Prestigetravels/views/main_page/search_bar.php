<form action="index.php" method="GET" class="mt-6 mb-6">
  <h3 class="title is-3">Buscar</h3>
  <div class="columns">
    <div class="column">
      <div class="field">
        <label class="label">Fecha Inicio</label>
        <div class="control">
          <input name="start_date" type="date" min="<?= date("Y-m-d") ?>" class="input"
            value="<?= $start_date ?? '' ?>" />
        </div>
      </div>
    </div>
    <div class="column">
      <div class="field">
        <label class="label">Fecha Término</label>
        <div class="control">
          <input name="end_date" type="date" min="<?= date("Y-m-d") ?>" class="input" value="<?= $end_date ?? '' ?>" />
        </div>
      </div>
    </div>
    <div class="column">
      <div class="field">
        <label class="label">Ciudad</label>
        <div class="control">
          <div class="select">
            <select name="city">
              <!-- TODO get these from DB and iterate -->
              <option value="all" <?= $city === 'all' ? 'selected' : '' ?>>Todas</option>
              <option value="1" <?= $city === '1' ? 'selected' : '' ?>>El Cajon del Maipo</option>
              <option value="2" <?= $city === '2' ? 'selected' : '' ?>>Viña del Mar</option>
              <option value="3" <?= $city === '3' ? 'selected' : '' ?>>Valparaiso</option>
              <option value="4" <?= $city === '4' ? 'selected' : '' ?>>Torres del Paine</option>
              <option value="5" <?= $city === '5' ? 'selected' : '' ?>>Atacama</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="field">
        <label class="label">Tipo Producto</label>
        <div class="control">
          <div class="select">
            <select name="product_type">
              <option value="hotels_and_packages" <?= $product_type === 'hotels_and_packages' ? 'selected' : '' ?>>
                Ambos
              </option>
              <option value="hotels" <?= $product_type === 'hotels' ? 'selected' : '' ?>>Hoteles</option>
              <option value="packages" <?= $product_type === 'packages' ? 'selected' : '' ?>>Paquetes</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="column is-3">
      <div class="field has-addons" style="padding-top: 32px">
        <div class="control is-expanded">
          <input name="search_term" class="input" type="text" placeholder="Término de busqueda..."
            value="<?= $search_term ?? '' ?>">
        </div>
        <div class="control">
          <button class="button is-info">Buscar</button>
        </div>
      </div>
    </div>
  </div>
</form>