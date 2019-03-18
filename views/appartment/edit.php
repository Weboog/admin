<div class="element" id="edit_appart">
    <div class="markup">
        <h2 class="head-1">Ajouter un nouvel appartement</h2>
        <form action="">
            <div class="data_primitif">
                <div class="group position">
                    <h4>Type et position</h4>
                    <label for="type">Type du bien :</label>
                    <select name="type" id="type">
                        <option value="1">Appartement</option>
                        <option value="2">Maison</option>
                    </select>
                    <label for="city">Ville :</label>
                    <select name="city" id="city">
                        <option value="1">Rabat</option>
                        <option value="2">Salé</option>
                        <option value="3">Témara</option>
                    </select>
                    <label for="zone">Zone :</label>
                    <select name="zone" id="zone">
                        <option value="1">Souissi</option>
                        <option value="2">Alirfane</option>
                        <option value="3">Hay Ryad</option>
                        <option value="3">Agdal</option>
                    </select>
                    <label for="address">Adresse complète :</label>
                    <textarea name="address" id="address"></textarea>
                </div>
                <div class="group details">
                    <h4>Détails</h4>
                    <label for="pieces">Nombre de pièces :</label>
                    <select name="pieces" id="pieces">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <label for="rooms">Nombre de chambres :</label>
                    <select name="rooms" id="rooms">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <label for="surface">Surface :</label>
                    <input type="text" name="surface" id="surface">
                    <label for="price">Prix :</label>
                    <input type="text" name="price" id="price">
                </div>
                <div class="group owner">
                    <h4>Information du propiétaire</h4>
                    <label for="owner">Propriétaire :</label>
                    <input type="text" name="owner" id="owner">
                    <label for="phone">Téléphone :</label>
                    <input type="tel" name="phone" id="phone">
                </div>
            </div>
            <div class="data_deep">
                <div class="group description">
                    <h4>Description et conditions</h4>
                    <label for="description">Description</label>
                    <textarea name="description" id="description"></textarea>
                    <label for="external">Grosso modo</label>
                    <textarea name="external" id="external"></textarea>
                    <label for="internal">à l'intérieur</label>
                    <textarea name="internal" id="internal"></textarea>
                    <label for="condition">Condition à remplir</label>
                    <textarea name="condition" id="condition"></textarea>
                </div>
            </div>
        </form>
        <div class="controls">
            <ul>
                <li><a href="#" class="button cancel">
                        <svg class="button__icon">
                            <use href="public/img/sprite.svg#cancel"></use>
                        </svg>
                        Annuler
                    </a></li>
                <li><a href="" class="button validate">
                        <svg class="button__icon">
                            <use href="public/img/sprite.svg#valid"></use>
                        </svg>
                        Enregistrer
                    </a></li>
            </ul>
        </div>
    </div>
</div>