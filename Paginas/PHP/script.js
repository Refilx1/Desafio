function validarFormulario(event) {
    var email = document.getElementById('email').value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex para validar formato de email
    
    if (!emailRegex.test(email)) {
        alert('Por favor, insira um endereço de e-mail válido.');
        event.preventDefault(); // Impede o envio do formulário caso não esteja tudo certo 
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        var email = document.getElementById('email').value;

        if (!email) {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'O campo de email não pode estar vazio.'
            });
            return;
        }

        var form = event.target;
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes('Email já cadastrado!')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Email já cadastrado!'
                });
            } else if (data.includes('Erro ao cadastrar')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Erro ao cadastrar.'
                });
            } else {
                    window.location.href = 'confirmacao.php'; // Redireciona para a página de confirmação
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Erro ao enviar o formulário. Tente novamente.'
            });
        });
    });
});
