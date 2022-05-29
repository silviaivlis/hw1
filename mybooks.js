function onJson(json){   
  console.log(json)

  const library = document.querySelector('#library-view');
  library.innerHTML = '';

  let i=0;
  for(i=0; i<lenght; i++)
  {
    const doc = json.items[i]
    // Costruiamo l'URL della copertina
    const cover = doc.volumeInfo.imageLinks;
    if(cover!==undefined){
      const cover_url = cover.thumbnail;
      const title = doc.volumeInfo.title;
      const author = doc.volumeInfo.authors;
      const id=doc.id;
      const descrizione=doc.volumeInfo.description;
      // Creiamo il div che conterrà immagine e didascalia
      const book = document.createElement('div');
      const sezione = document.createElement('article');
      book.classList.add('book');
      sezione.classList.add('contenuto');
      // Creiamo l'immagine
      const img = document.createElement('img');
      img.classList.add('copertina')
      img.src = cover_url;
      // Creiamo la didascalia
      const caption = document.createElement('span');
      caption.classList.add('titolo');
      caption.textContent = title;
      //creao autore
      const autore = document.createElement('span');
      autore.classList.add('autore');
      autore.textContent = author;
      //creo bottone
      const contenitore = document.createElement('div');
      contenitore.classList.add('flex-conteiner');
      const button = document.createElement('a');
      button.classList.add('bottone');
      button.href="https://books.google.com/ebooks?id="+id;
      button.textContent = 'e-book';
      const icon1 = document.createElement('img');
      icon1.classList.add('icon1');
      icon1.src = 'immagini/aggiungi.jpeg';
      icon1.addEventListener('click', aggiungi);
      const icon2 = document.createElement('img');
      icon2.classList.add('hidden');
      icon2.src = 'immagini/aggiunto.jpeg';

      //creo testo
      const paragrafo=document.createElement('div');
      paragrafo.classList.add('testo')
      paragrafo.textContent=descrizione;

      // Aggiungiamo immagine e didascalia al div
      book.appendChild(img);
      book.appendChild(sezione);
      sezione.appendChild(caption);
      sezione.appendChild(autore);
      sezione.appendChild(paragrafo);
      sezione.appendChild(contenitore);
      contenitore.appendChild(button);
      contenitore.appendChild(icon1);
      contenitore.appendChild(icon2);
      // Aggiungiamo il div alla libreria
      library.appendChild(book);
    }
  }
}

const lenght=20;

function onResponse(response){
  console.log('Risposta ricevuta');
  return response.json();
}

function search(event){
  event.preventDefault();
  const book_input = document.querySelector('#author');
  const book_value = encodeURIComponent(book_input.value);
  console.log('Eseguo ricerca: '+book_value);
  fetch("search.php?q="+book_value).then(onResponse).then(onJson);
}


const form = document.querySelector('form');
form.addEventListener('submit', search);

function aggiungi(event){
  const nonaggiunto = event.currentTarget;
  const span = nonaggiunto.parentNode;
  const aggiunto = span.querySelector('.hidden');

  nonaggiunto.classList.add('hidden');
  aggiunto.classList.remove('hidden');
  aggiunto.classList.add('icon2');

  const book = aggiunto.closest('.book');
  console.log (book);
  const copertina = book.querySelector('.copertina').src;
  console.log(copertina);
  const titolo = book.querySelector('.titolo').textContent;
  console.log(titolo);
  const autore = book.querySelector('.autore').textContent;
  console.log(autore);
  
  fetch("libreria.php?copertina=" + encodeURIComponent(copertina) + "&titolo=" + encodeURIComponent(titolo) + "&autore="+encodeURIComponent(autore)).then(onResponse).then(newfetch);
}

function newfetch(){
  fetch("caricamento.php").then(onResponse).then(inserimento);
}

fetch("caricamento.php").then(onResponse).then(inserimento);

function inserimento(json){
  console.log(json);

  const libreria = document.querySelector('#personal-library-view');
  libreria.innerHTML = '';
  for(const i of json){
    const book = document.createElement('div');
    const sezione = document.createElement('article');
    book.classList.add('book');
    sezione.classList.add('contenuto');
    // Creiamo l'immagine
    const img = document.createElement('img');
    img.classList.add('copertina')
    img.src = i.immagine;
    // Creiamo la didascalia
    const caption = document.createElement('span');
    caption.classList.add('titolo');
    caption.textContent = i.titolo;
    //creao autore
    const autore = document.createElement('span');
    autore.classList.add('autore');
    autore.textContent = i.autore;
    //creo bottone
    const cestino = document.createElement('img');
    cestino.classList.add('icon1');
    cestino.src = 'immagini/cestino.jpeg';
    cestino.addEventListener('click', elimina);

    book.appendChild(img);
    book.appendChild(sezione);
    sezione.appendChild(caption);
    sezione.appendChild(autore);
    sezione.appendChild(cestino);

    libreria.appendChild(book);
  }
}

function elimina(event){
  const cestino = event.currentTarget;
  const book = cestino.closest('.book');
  const titolo = book.querySelector('.titolo').textContent;
  
  book.remove();
  fetch("rimuoviLibro.php?q="+encodeURIComponent(titolo));
}