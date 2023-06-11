<style>
  .menulateral {
    background-color: #468581;
    width: 200px;
    height: 100vh;
    float: left;
    color: #fff;
    padding: 24px 0;
  }

  .menu-lista {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  .menu-lista li {
    padding: 10px;
  }

  .menu-lista li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    text-align: center;
    display: flex;
    justify-content: center;
  }

  .menu-lista li a:hover {
    color: #ccc;
  }

  .menu-lista li.selected {
    background-color: #1F6460;
  }
</style>
<div class="menulateral">
  <ul class="menu-lista">
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/minhaArea.php') echo 'class="selected"'; ?>><a href="../screens/minhaArea.php" onclick="selectMenuItem(event)">Minha Área</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/documento.php') echo 'class="selected"'; ?>><a href="../screens/documento.php" onclick="selectMenuItem(event)">Documento</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/cliente.php') echo 'class="selected"'; ?>><a href="../screens/cliente.php" onclick="selectMenuItem(event)">Cliente</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/tipoDocumento.php') echo 'class="selected"'; ?>><a href="../screens/tipoDocumento.php" onclick="selectMenuItem(event)">Tipo de Documento</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/natureza.php') echo 'class="selected"'; ?>><a href="../screens/natureza.php" onclick="selectMenuItem(event)">Natureza</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/localDocumento.php') echo 'class="selected"'; ?>><a href="../screens/localDocumento.php" onclick="selectMenuItem(event)">Local do Documento</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/usuarios.php') echo 'class="selected"'; ?>><a href="../screens/usuarios.php" onclick="selectMenuItem(event)">Usuários</a></li>
    <li <?php if ($_SERVER['PHP_SELF'] == '/digitoscontabilidade/screens/relatorios.php') echo 'class="selected"'; ?>><a href="../screens/relatorios.php" onclick="selectMenuItem(event)">Relatórios</a></li>
  </ul>
</div>
<script>
  function selectMenuItem(event) {
    let menuItem = event.target

    menuItems.forEach(function(item) {
      item.classList.remove('selected')
    })

    menuItem.parentNode.classList.add('selected')
  }
</script>