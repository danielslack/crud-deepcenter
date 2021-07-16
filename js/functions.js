// Função para salvar o usuário no banco de dados
// Create Update
function save(e) {
  e.preventDefault();

  input_id = document.getElementById("id_user");
  input_nome = document.getElementById("nome");
  input_email = document.getElementById("email");
  input_telefone = document.getElementById("telefone");
  input_cep = document.getElementById("cep");
  input_endereco = document.getElementById("endereco");
  input_numero = document.getElementById("numero");
  input_bairro = document.getElementById("bairro");

  if (input_id.value.length > 0) {
    url = "update_user.php";
  } else {
    url = "save_user.php";
  }

  if (input_nome.value.length < 3 || input_email.value.length <= 5) {
    Swal.fire({
      title: "Por favor preencher todos os campos!",
      text: "Verifique se o tamanho mínimo é maior que 5 :)",
      icon: "warning",
      confirmButtonColor: '"#DD6B55"',
    });
  } else {
    var data = new FormData();

    data.append("id", input_id.value);
    data.append("nome", input_nome.value);
    data.append("email", input_email.value);
    data.append("telefone", input_telefone.value);
    data.append("cep", input_cep.value);
    data.append("endereco", input_endereco.value);
    data.append("numero", input_numero.value);
    data.append("bairro", input_bairro.value);

    $.ajax({
      url: url,
      type: "POST",
      data: data,
      processData: false,
      cache: false,
      contentType: false,
      success: function () {
        location.reload();
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
}

// Função para confirmação de exclusão do usuário 
function showAlertDialog(id, nome, email) {
  Swal.fire({
    title: "Deseja remover?",
    text: ` ${nome} banco de dados.`,
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim",
    cancelButtonText: "Não",
  }).then(function (isconfirm) {
    if (isconfirm["isConfirmed"]) {
      $.ajax({
        url: `delete_user.php?id=${id}`,
        method: "GET",
        success: function () {
          location.reload();
        },
        error: function (error) {
          console.log(error);
        },
      });
    }
  });
}


function updateUser(id) {

  $.ajax({
    dataType: "json",
    url: `get_user.php?id=${id}`,
    success: function(data) {
      document.getElementById("id_user").value = data['id'];
      document.getElementById("nome").value = data['nome'];
      document.getElementById("email").value = data['email'];
      document.getElementById("nome").value = data['nome'];
      document.getElementById("email").value = data['email'];
      document.getElementById("telefone").value = data['telefone'];
      document.getElementById("cep").value = data['cep'];
      document.getElementById("endereco").value = data['endereco'];
      document.getElementById("numero").value = data['numero'];
      document.getElementById("bairro").value = data['bairro'];
      console.log(data)
    }
  });

}
