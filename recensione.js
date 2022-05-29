function onResponse(response){
    console.log(response);
    return response.json();
}

fetch("recensioniDB.php").then(onResponse).then(inserimento);

function inserimento(json){
    console.log(json);

    const bacheca = document.querySelector('#recensioni');
    for(const i of json){
        const conteiner = document.createElement('div');
        conteiner.classList.add('conteiner');

        const username = document.createElement('p');
        username.classList.add('username');
        username.textContent = '@'+i.username;

        const titolo = document.createElement('p');
        titolo.classList.add('title');
        titolo.textContent = 'Titolo: '+i.titolo;

        const autore = document.createElement('p');
        autore.classList.add('autore');
        autore.textContent = 'Autore: '+i.autore;

        const testo = document.createElement('p');
        testo.classList.add('text');
        testo.textContent = i.testo;

        const cestino = document.createElement('img');
        cestino.classList.add('icon1');
        cestino.src = 'immagini/cestino.jpeg';
        cestino.addEventListener('click', elimina);

        conteiner.appendChild(username);
        conteiner.appendChild(titolo);
        conteiner.appendChild(autore);
        conteiner.appendChild(testo);

        const user = document.querySelector('#nome').textContent;
        if(user == i.username){
            conteiner.appendChild(cestino);
        }

        bacheca.appendChild(conteiner);


    }
}

function elimina(event){
    const cestino = event.currentTarget;
    const recensione = cestino.closest('.conteiner');
    const testo = recensione.querySelector('.text').textContent;
    
    recensione.remove();
    fetch("rimuoviRecensione.php?q="+encodeURIComponent(testo));
}