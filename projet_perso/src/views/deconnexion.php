<?php
if (isset($_SESSION['login'])) {
    session_destroy();
}

// methode trouvée suite au header("Location: /"); ne fonctionne pas 
echo '<meta http-equiv="refresh" content="0; url=/" />';

