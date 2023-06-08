
<div class="container">
    <section class="section px-0">
        <div class="columns is-multiline">
            <?php foreach($wishlist as $elem): ?>
                <?php if ($elem["tipo"] === "hotel"){
                    $id = $elem["id_hotel"];
                    $hotel_id = $elem["id_hotel"];
                    $package_id = NULL;

                }elseif ($elem["tipo"] === "paquete"){
                    $id = $elem["id_paquete"];
                    $package_id = $elem["id_paquete"];
                    $hotel_id = NULL;
                } ?>


                <div class="column is-4">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="https://picsum.photos/seed/<?= $id ?>/400/300" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">
                                        <a href="<?php echo $elem['tipo'] === 'hotel' ? 'hotel.php?id=' : 'paquete.php?productoId=' ?><?php echo $id; ?>">
                                            <?= $elem['nombre'] ?>
                                        </a>
                                    </p>
                                    <p class="subtitle is-6">
                                        <?= $elem['tipo'] == 'paquete' ? 'Paquete' : 'Hotel' ?>
                                        <span class="is-pulled-right">
                                            <span class="icon-text">
                                                <span class="icon is-small">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                            </span>
                                            <span class="is-size-6">
                                                <?= number_format($elem['rating'], 1) ?>
                                            </span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <style>
                                .link-button {
                                    background: none;
                                    border: none;
                                    padding: 0;
                                    font: inherit;
                                    cursor: pointer;
                                    text-decoration: underline;
                                    color: blue;
                                }
                            </style>

                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.</p>
                                <ul>
                                    <li>
                                        <b>Precio:</b> $
                                        <?= $elem['precio'] ?> 
                                        <i>(Por <?= $elem['tipo'] === 'hotel' ? 'por noche' : 'por persona' ?>)</i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <footer class="card-footer">
                            
                            <a class="card-footer-item" href="<?php echo $elem['tipo'] === 'hotel' ? 'hotel.php?id=' : 'paquete.php?productoId=' ?><?php echo $id; ?>">Ver Más</a>
                            <form action="wishlist.php" method="post">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="tipo" value="<?= $elem['tipo'] ?>">
                            <button type="submit" class="card-footer-item link-button">Eliminar de Wishlist</button>
                            </form>
                            
                        </footer>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</div>

