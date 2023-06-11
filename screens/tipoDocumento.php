<?php
require_once '../config/config.php';
require_once '../config/actions.php';
require_once './valida_cadastroTipoDocumento.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="styles.css">

  <title>Tipo de Documento</title>
</head>

<body>
  <?php include_once '../components/menu.php'; ?>
  <div class="mainContainer">
    <div class="add-search-container">
      <button class="btn btn-primary btn-custom" id="openAddModal"><i class="bi bi-plus-circle"></i> Adicionar</button>

      <form class="input-group mb-1 searchContainer">
        <input type="text" name="search" id="searchBar" placeholder="Pesquisar..." class="searchBar">
        <label for="searchBar" type="submit" class="searchBarLabel"><i class="bi bi-search"></i></label>
      </form>
    </div>

    <div class="tipoDocListContainer">
      <ul class="tipoDocLista">
        <?php
        $registros = listaTipoDocumentoAction($conexao);
        if ($registros) {
          foreach ($registros as $registro) {
            echo '
              <li class="tipoDocItem">
                <span>' . $registro["tipo_doc"] . '</span>
                <span class="action-buttons">
                  <button id="openViewModal" class="btn btn-sm crud-buttons"><i class="bi bi-eye-fill"></i></button>
                  <button id="openEditModal" class="btn btn-sm crud-buttons"><i class="bi bi-pencil-square"></i></button>
                  <button class="btn btn-sm crud-buttons"><i class="bi bi-trash-fill"></i></button>
                </span>
              </li>';
          }
        }

        ?>
      </ul>
    </div>

    <div id="addModal" class="modal">
      <div class="modal-content">
        <span id="closeAddModal" class="close">&times;</span>
        <h2>Cadastrar documento</h2>
        <form class="w-100 custom-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="custom-form-group">
            <label for="tipoDocCadastro" class="col-md-3">Tipo do Documento:</label>
            <input type="text" name="tipoDocCadastro" id="tipoDocCadastro" class="form-control rounded-3 custom-modal-form-input">
          </div>
          <div class="custom-form-group">
            <label for="tempoArquivamentoCadastro" class="col-md-3">Tempo de armazenamento:</label>
            <input type="text" name="tempoArquivamentoCadastro" id="tempoArquivamentoCadastro" class="form-control rounded-3 custom-modal-form-input">
          </div>
          <button type="submit" class="btn btn-primary btn-modal" id="buttonCadastrar">Cadastrar</button>
        </form>
      </div>
    </div>

    <div id="viewModal" class="modal">
      <div class="modal-content">
        <span id="closeViewModal" class="close">&times;</span>
        <h2>Tipo de documento</h2>
        <form class="w-100 custom-form">
          <div class="custom-form-group">
            <label for="tipoDocVisualizar" class="col-md-3">Tipo do Documento:</label>
            <input type="text" name="tipoDocVisualizar" id="tipoDocVisualizar" class="form-control rounded-3 custom-modal-form-input" readonly>
          </div>
          <div class="custom-form-group">
            <label for="tempoArmazenamentoVisualizar" class="col-md-3">Tempo de armazenamento:</label>
            <input type="text" name="tempoArmazenamentoVisualizar" id="tempoArmazenamentoVisualizar" class="form-control rounded-3 custom-modal-form-input" readonly>
          </div>
        </form>
      </div>
    </div>

    <div id="editModal" class="modal">
      <div class="modal-content">
        <span id="closeEditModal" class="close">&times;</span>
        <h2>Editar documento</h2>
        <form class="w-100 ">
          <div class="custom-form-group">
            <label for="tipoDocEditar" class="col-md-3">Tipo do Documento:</label>
            <input type="text" name="tipoDocEditar" id="tipoDocEditar" class="form-control rounded-3 custom-modal-form-input">
          </div>
          <div class="custom-form-group">
            <label for="tempoArmazenamentoEditar" class="col-md-3">Tempo de armazenamento:</label>
            <input type="text" name="tempoArmazenamentoEditar" id="tempoArmazenamentoEditar" class="form-control rounded-3 custom-modal-form-input">
          </div>
          <button type="submit" class="btn btn-primary btn-modal">Salvar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="addModal.js"></script>

</body>

</html>