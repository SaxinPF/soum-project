﻿<?php
session_start();
session_destroy();
?>
<script>
localStorage.removeItem("mobile");
localStorage.removeItem("name");
window.location.href='index.php';
</script>