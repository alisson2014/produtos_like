function excluir(table, id) {
  if (confirm("Deseja realmente excluir este registro?")) {
    location.href = `index.php?action=delete&table=${table}&id=${id}`;
  }
}
