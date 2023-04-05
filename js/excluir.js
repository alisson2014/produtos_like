function excluir(id) {
  if (confirm("Deseja realmente excluir este registro")) {
    location.href = `index.php?action=delete&table=subcategories&id=${id}`;
  }
}
