let connexionBtn = document.querySelector('.connexion-btn');
let main = document.querySelector('#main');

if(connexionBtn) {
  connexionBtn.addEventListener('click', (e) => {
    e.target.classList.add('connexion-clicked');

    setTimeout(() => {
      e.target.parentNode.classList.add('connexion-hidden');
    }, 500);

    main.classList.add('main-slide')
  });
}
