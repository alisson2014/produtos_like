function registrar(table, id) {
  //linkTo -> UPDATE
  if (id !== undefined)
    location.href = `index.php?action=register&table=${table}&id=${id}`;
  //linkTo -> CREATE
  else location.href = `index.php?action=register&table=${table}`;
}
