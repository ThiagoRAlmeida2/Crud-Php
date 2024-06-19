function MostrarSenha() {
    var campoSenha = document.querySelector('input[name="senha"]');
    var senhaVisivel = document.querySelector('.iconeMostrarSenha');

    if (campoSenha.type === 'password') {
        campoSenha.type = 'text';
        senhaVisivel.textContent = '👁️';
    } else {
        campoSenha.type = 'password';
        senhaVisivel.textContent = '👁️';
    }
}