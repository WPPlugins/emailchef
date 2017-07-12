<form>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label
                    for="<?php echo htmlentities($driverName, ENT_QUOTES) ?>-<?php echo htmlentities($id, ENT_QUOTES) ?>-list"><?php echo __('eMailChef List:', 'wordpress') ?></label>
            </th>
            <td>
                <p class="warning-select-list"><?php echo __('Select the list and save.', 'wordpress') ?></p>
                <select name="listId" class="list-id"
                        id="<?php echo htmlentities($driverName, ENT_QUOTES) ?>-<?php echo htmlentities($id, ENT_QUOTES) ?>-list">
                    <option value="">-</option>
                    <?php foreach ($formData['lists'] as $list) {
                        ?>
                        <option value="<?php echo $list->id ?>" <?php if ($list->id == $formData['listId']) {
                            echo 'selected';
                        }
                        ?>><?php echo htmlentities($list->name, ENT_QUOTES) ?></option>
                        <?php

                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Map', 'wordpress') ?></th>
            <td>
                <div class="map-reload">
                    <p><?php echo __('Save to reload list fields', 'wordpress') ?></p>
                </div>
                <div class="content-map">
                    <p><?php echo __('Map form fields with eMailChef List fields. <br><em class="at-least-email">At least an email field needs to be mapped to enable the connection.</em>', 'wordpress') ?></p>
                    <p><?php echo __('Remember to save your changes.', 'wordpress') ?></p>
                    <div class="form-table-container">
                        <table class="form-table">
                            <thead>
                            <tr>
                                <th><?php echo __('Form field', 'wordpress') ?></th>
                                <th><?php echo __('eMailChef List field', 'wordpress') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($formData['formFields'] as $field) {
                                ?>
                                <tr data-id="<?php echo htmlentities($field['id'], ENT_QUOTES) ?>">
                                    <td class="nopadding">
                                        <?php echo htmlentities($field['title'], ENT_QUOTES) ?>
                                    </td>
                                    <td class="nopadding">
                                        <select name="field[<?php echo htmlentities($field['id'], ENT_QUOTES) ?>]">
                                            <option value="">-</option>
                                            <?php foreach ($formData['listFields'] as $field2) {
                                                ?>
                                                <option
                                                    value="<?php echo htmlentities($field2['id'], ENT_QUOTES) ?>" <?php if (isset($formData['savedFields'][$field['id']]) && $formData['savedFields'][$field['id']] == $field2['id']) {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo htmlentities($field2['title'], ENT_QUOTES) ?></option>
                                                <?php

                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php

                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <button
                        class="button right create"><?php echo __('Create and map unmapped fields automatically', 'wordpress') ?></button>

                </div>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" class="button button-primary right save"
                       value="<?php echo __('Save', 'wordpress') ?>"/>
                <button class="button right reset"><?php echo __('Reset', 'wordpress') ?></button>
            </td>
        </tr>
        </tbody>
    </table>
</form>
