<?php if (isset($error)): ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($action ?? 'index.php'); ?>" method="<?php echo htmlspecialchars($method ?? 'post'); ?>">
    <?php
    if (isset($fields) && is_array($fields)) {
        foreach ($fields as $field) {
            $label       = $field['label']       ?? '';
            $name        = $field['name']        ?? '';
            $type        = $field['type']        ?? 'text';
            $value       = $field['value']       ?? '';
            $placeholder = $field['placeholder'] ?? '';
            $required    = (!empty($field['required']) && $field['required'] === true) ? 'required' : '';

            echo '<div>';
            if (!empty($label)) {
                echo '<label for="' . htmlspecialchars($name) . '">' . htmlspecialchars($label) . '</label>';
            }
            
            if ($type === 'select') {
                echo '<select name="' . htmlspecialchars($name) . '" id="' . htmlspecialchars($name) . '" ' . $required . '>';
                if (isset($field['options']) && is_array($field['options']) && count($field['options']) > 0) {
                    foreach ($field['options'] as $optValue => $optLabel) {
                        if (is_int($optValue)) {
                            $optValue = $optLabel;
                        }
                        $selected = ($optValue == $value) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($optValue) . '" ' . $selected . '>' . htmlspecialchars($optLabel) . '</option>';
                    }
                } else {
                    echo '<option value="">Aucune option disponible</option>';
                }
                echo '</select>';
            } else {
                echo '<input type="' . htmlspecialchars($type) . '" name="' . htmlspecialchars($name) . '" id="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" placeholder="' . htmlspecialchars($placeholder) . '" ' . $required . ' />';
            }
            echo '</div>';
        }
    } else {
        // Fallback en cas d'absence du tableau $fields
        ?>
        <div>
            <label for="texte">Entrez votre texte :</label>
            <input type="text" name="texte" id="texte" placeholder="Votre texte ici..." required>
        </div>
        <?php
    }
    ?>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>
