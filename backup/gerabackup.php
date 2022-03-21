<?php
session_start();
$data = date("d/m/Y H:m", strtotime("-4hour"));
$nomeBackup = "Backup_$data.sql";

$criaBackup = shell_exec('C:\xampp\mysql\bin\mysqldump -u root apple > C:\xampp\htdocs\apple\backup\historico\backup.sql');

#C:\xampp\mysql\bin\mysqldump -u root apple -> É O CAMINHO ONDE SE GERA O BACKUP
#C:\xampp\htdocs\apple\backup\historico\backup.sql -> É O CAMINHO TEMPORÁRIO ONDE SERÁ SALVO O BACKUP

$download = header("location: historico/backup.sql");

if ($download) {
    $_SESSION['backup'] = "<div class='alert alert-success' role='alert'>
    Backup Gerado com sucesso.
</div>";
}
