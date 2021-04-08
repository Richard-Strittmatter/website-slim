<?php

use Psr\Container\ContainerInterface;

$filename = __DIR__ . '/../resources/migrations/schema.sql';

/** @var ContainerInterface $container */
$container = (require __DIR__ . '/../config/bootstrap.php')->getContainer();

$pdo = $container->get(PDO::class);

echo sprintf("Dump database: %s\n", (string)$pdo->query('select database()')->fetchColumn());

$statement = $pdo->query('SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = database()');

$sql = [];

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $statement2 = $pdo->query(sprintf('SHOW CREATE TABLE `%s`;', (string)$row['TABLE_NAME']));
    $createTableSql = $statement2->fetch()['Create Table'];
    $sql[] = preg_replace('/AUTO_INCREMENT=\d+/', '', $createTableSql) . ';';
}

$sql = implode("\n\n", $sql);

file_put_contents($filename, $sql);

echo sprintf("Schema dumped to: %s\n", realpath($filename));