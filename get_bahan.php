<?php
header('Content-Type: application/json');

try {
  $db = new PDO('sqlite:bahan.db');
  $stmt = $db->query("SELECT * FROM bahan");
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($data);
} catch (Exception $e) {
  echo json_encode(['error' => $e->getMessage()]);
}
?>
