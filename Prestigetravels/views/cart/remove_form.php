<form action="/cart/" method="POST">
  <input type="hidden" name="_method" value="DELETE" />
  <input type="hidden" name="hotel_id" value="<?= $hotel_id ?>" />
  <button class="button is-light is-danger is-<?= $size ?? "normal" ?>" title="Quitar del carrito">
    <span class="icon is-small">
      <i class="fas fa-trash-alt"></i>
    </span>
    <?php if (!(isset($hide_title) && $hide_title)): ?><span>Quitar del carrito</span>
    <?php endif ?>
  </button>
</form>