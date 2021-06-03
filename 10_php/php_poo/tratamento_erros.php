<?php

    try {
        echo '<h3> Try </h3>';

        //$sql = 'select * from clientes';
        //mysql_query($sql);
        
        if (!file_exists('arquivo.php')) {
            throw new Exception('O arquivo não está disponível '.date('d/m/Y H:i:s'));
        }

    } catch (Error $e) {
        echo '<h3> Catch </h3>';
        echo '<p style="color:red">' . $e . '</p>';
    } catch (Exception $e) {
        echo '<h3> Exception </h3>';
        echo '<p style="color:red">' . $e . '</p>';
    } finally {
        echo '<h3> Finally </h3>';
    }

?>