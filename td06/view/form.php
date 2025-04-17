<form action="<?php echo htmlspecialchars($action ?? 'index.php'); ?>" method="<?php echo htmlspecialchars($method ?? 'post'); ?>">
    <?php
    if (isset($fields) && is_array($fields)) {
        foreach ($fields as $field) {
            $label       = $field['label']       ?? '';
            $name        = $field['name']        ?? '';
            $type        = $field['type']        ?? 'number';
            $value       = $field['value']       ?? '';
            $placeholder = $field['placeholder'] ?? '';
            $required    = (!empty($field['required']) && $field['required'] === true) ? 'required' : '';

            echo '<div>';
            if (!empty($label)) {
                echo '<label for="' . htmlspecialchars($name) . '">' . htmlspecialchars($label) . '</label>';
            }

        
            echo '<input type="' . htmlspecialchars($type) . '" name="' . htmlspecialchars($name) . '" id="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" placeholder="' . htmlspecialchars($placeholder) . '" ' . $required . ' />';
            
            echo '</div>';
        }
    } else {
        // Fallback en cas d'absence du tableau $fields
    }
    ?>
    <div>
        <input type="submit" value="Envoyer">
    </div>
</form>
